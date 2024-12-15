<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import Modal from '@/Components/Modal.vue';
import {ref} from 'vue';

const form = useForm({
    title:'',
    description:'',
    status:false,
    priority:''
});
const confrimingTaskModal = ref(false);
function confrimedTaskModal(){
    confrimingTaskModal.value = !confrimingTaskModal.value;
}
function closeModal(){
    confrimingTaskModal.value = false;
    form.clearErrors();
    form.reset();
}
const createTask = () => {
    form.post(`/tasks`, {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <div>
        <PrimaryButton class="my-10" @click="confrimedTaskModal">+</PrimaryButton>
        <Modal :show="confrimingTaskModal" @close="closeModal">
            <div class="p-6">
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

                />

                <InputError class="mt-2" :message="form.errors.priority" />
            </div>

            <div class="flex justify-end mt-6">
                    <SecondaryButton @click="closeModal">
                        Отмена
                    </SecondaryButton>

                    <PrimaryButton
                        class="ms-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="createTask"
                    >
                    Отправить задачу
                    </PrimaryButton>
            </div>
            </div>
        </Modal>
    </div>
</template>
