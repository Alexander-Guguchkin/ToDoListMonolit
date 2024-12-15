<script setup>
import EditTask from './EditTask.vue';
import DeleteTask from './DeleteTask.vue';
import CreateTask from './CreateTask.vue';
import Paginate from '@/Components/Paginate.vue';

const props = defineProps({
    data:Object
});
</script>

<template>
<h2 class="">Tasks</h2>
<table class="table-auto w-full">
    <thead>
        <tr class="bg-gray-800 text-white">
            <th class="w-32">Title</th>
            <th class="w-64">Description</th>
            <th class="w-24">Priority</th>
            <th class="w-24">Status</th>
            <th class="w-64">Edit</th>
            <th class="w-64">Delete</th>
        </tr>
    </thead>
    <tbody class="bg-gray-600 text-white">
        <tr v-for="task in props.data" :key="task.id">
            <td class=" px-2">{{ task.title }}</td>
            <td class=" px-2">{{ task.description }}</td>
            <td class="text-center">{{ task.priority }}</td>
            <td class="text-center">{{ task.status?'Выполнено':'Не выполнено' }}</td>
            <td class="text-center">
                <EditTask :id="task.id" />
            </td>
            <td class="text-center">
                <DeleteTask :id="String(task.id)" />
            </td>
        </tr>
    </tbody>
</table>
<CreateTask/>
<!-- <Paginate/> -->
</template>
