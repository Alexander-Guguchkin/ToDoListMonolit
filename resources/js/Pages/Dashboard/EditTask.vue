<template>
    <div>
        <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click = confrimedTaskModal
                >
                    Редактирование
        </PrimaryButton>
        <Modal @show="confrimingTaskModal" @close="closeModal">
            <div class="p-6">
                <form @submit.prevent="form.post('/tasks')">
            <div>
                <InputLabel for="title" value="title" />

                <TextInput
                    id="title"
                    type="title"
                    class="mt-1 block w-full border"
                    v-model="form.title"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>
            <div class="mt-2">
                <InputLabel for="description" value="description" />

                <TextInput
                    id="description"
                    type="description"
                    class="mt-1 block w-full border"
                    v-model="form.description"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>
            <div class="mt-4">
                <InputLabel for="status" value="status" />

                <TextInput
                    id="status"
                    type="number"
                    class="mt-1 block w-full border"
                    v-model="form.status"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.status" />
            </div>
            <div class="mt-4">
                <InputLabel for="priority" value="priority" />

                <TextInput
                    id="priority"
                    type="boolean"
                    class="mt-1 block w-full border"
                    v-model="form.priority"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.priority" />
            </div>
            <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Отправить задачу
            </PrimaryButton>
        </form>
            </div>
        </Modal>
    </div>
</template>
<script lang="ts" setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Modal from '@/Components/Modal.vue';

const props = defineProps({
    title:String,
    description:String,
    status:Number,
    priority:Boolean
});
const form = useForm({
    title:props.title,
    description:props.description,
    status:props.status,
    priority:props.priority
});

const confrimingTaskModal = ref(false);
const titleInput = ref<HTMLInputElement | null>(null);
const descriptionInput = ref<HTMLInputElement | null>(null);
const statusInput = ref<HTMLInputElement | null>(null);
const priorityInput = ref<HTMLInputElement | null>(null);

function confrimedTaskModal(){
    confrimingTaskModal.value = !confrimingTaskModal.value;
}
function closeModal(){
    confrimingTaskModal.value = false;
    form.clearErrors();
    form.reset();
}
const editUser = () => {
    form.post(route('tasks.update'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => titleInput.value?.focus(),
        onFinish: () => {
            form.reset();
        },
    });
};
</script>
