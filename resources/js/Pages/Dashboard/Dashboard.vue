<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreateTask from '@/Pages/Dashboard/CreateTask.vue';
import DeleteTask from '@/Pages/Dashboard/DeleteTask.vue';
import EditTask from '@/Pages/Dashboard/EditTask.vue';
import Modal from '@/Components/Modal.vue';
import { ref } from 'vue';
let props =defineProps({
    data:Object
})
const confrimingTaskModal = ref(false);


function confrimedTaskModal(){
    confrimingTaskModal.value = true;
    console.log(confrimingTaskModal.value);

}
function closeModal(){
    confrimingTaskModal.value = false;
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <h2>Tasks</h2>
                        <ul>
                            <li v-for="task in props.data" :key="task.id">
                                <div class="flex">
                                    <div class="flex-auto task " >
                                        {{ task.title }} - {{ task.description }} - Priority: {{ task.priority }} - Status: {{ task.status? 'Yes' : 'No' }}
                                    </div>
                                    <DeleteTask :id="String(task.id)" class="flex-auto " />
                                    <EditTask
                                        :id="task.id"
                                        :title="task.title"
                                        :description="task.description"
                                        :status="task.status"
                                        :priority="task.priority"
                                        class="flex-auto "
                                    />

                                </div>
                            </li>
                        </ul>
                        <CreateTask :data="props.data"/>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
