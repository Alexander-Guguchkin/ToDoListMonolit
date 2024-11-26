<template>
    <div>
        <DangerButton @click="deleteTask">Удалить задачу</DangerButton>
    </div>
</template>
<script lang="ts" setup>
import { router } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';

const props = defineProps({
    id:String
})

function deleteTask(){
    router.delete(`/tasks/${props.id}`)
}

</script>
