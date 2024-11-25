<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    data:Object
});
const form = useForm({
    title:'',
    description:'',
    status:1,
    priority:false
});

</script>

<template>
    <div>
        <h2>Tasks</h2>
        <ul>
            <li v-for="task in props.data" :key="task.id">
                {{ task.title }} - {{ task.description }} - Status: {{ task.status }} - Priority: {{ task.priority ? 'Yes' : 'No' }}
            </li>
        </ul>
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
</template>
