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
        <Modal :show="confrimingTaskModal" @close="closeModal">
            <div class="p-6">
            <div>
                <div>
                <InputLabel for="title" value="title" />

                <TextInput
                    id="title"
                    type="text"
                    class="block w-full mt-1 border"
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
                    type="text"
                    class="block w-full mt-1 border"
                    v-model="form.description"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.description" />
            </div>
            <div class="mt-4">
                <InputLabel for="status" value="status" />

                <InputError class="mt-2" :message="form.errors.status" />
            </div>
            <div class="mt-4">
                <InputLabel for="priority" value="priority" />

                <TextInput
                    id="priority"
                    type="number"
                    class="block w-full mt-1 border"
                    v-model="form.priority"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.priority" />
            </div>

            </div>

        <div class="flex justify-end mt-6">
                    <SecondaryButton @click="closeModal">
                        Отмена
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="editUser"
                    >
                        Отредактировать
                    </DangerButton>
            </div>
</div>
        </Modal>
    </div>
</template>
<script lang="ts" setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Modal from '@/Components/Modal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';

const props = defineProps({
    id:Number,
    title:String,
    description:String,
    status:Boolean,
    priority:Number
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
    form.put(`/tasks/${props.id}`, {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => {
            form.reset();
        },
    });
};
</script>
