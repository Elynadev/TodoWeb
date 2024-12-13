<template>
    <section>
        <h2 class="text-xl font-bold mb-4">Liste des Tâches</h2>
        <div class="bg-white p-4 rounded shadow-md">
            <TaskItem v-for="task in tasks" :key="task.id" :task="task" />
        </div>
    </section>
</template>

<script>
import TaskItem from '@/Components/TaskItem.vue';

export default {
    props: {
        tasks: Array,
    },
    components: {
        TaskItem,
    },
};
</script>
