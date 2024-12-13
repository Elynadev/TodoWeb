<template>
    <div>
        <h1>Liste des Tâches</h1>
        <TaskForm @task-added="fetchTasks" />
        <div v-for="task in tasks" :key="task.id" class="task">
            <h2>{{ task.title }}</h2>
            <p>{{ task.description }}</p>
            <p>Status: {{ task.status }}</p>
            <p>Deadline: {{ task.deadline }}</p>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import TaskForm from '@/Components/TaskForm.vue';

const tasks = ref([]);

const fetchTasks = async () => {
    const response = await fetch('/api/tasks');
    tasks.value = await response.json();
};

onMounted(fetchTasks);
</script>
