<template>
    <form @submit.prevent="addTask">
        <input v-model="title" placeholder="Titre" required />
        <textarea v-model="description" placeholder="Description" required></textarea>
        <select v-model="status">
            <option value="en_cours">En cours</option>
            <option value="termine">Terminé</option>
        </select>
        <input type="date" v-model="deadline" required />
        <button type="submit">Ajouter Tâche</button>
    </form>
</template>

<script setup>
import { defineEmits, ref } from 'vue';

const emit = defineEmits();

const title = ref('');
const description = ref('');
const status = ref('en_cours');
const deadline = ref('');

const addTask = async () => {
    await fetch('/api/tasks', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            title: title.value,
            description: description.value,
            status: status.value,
            deadline: deadline.value,
        }),
    });
    title.value = '';
    description.value = '';
    status.value = 'en_cours';
    deadline.value = '';
    emit('task-added');
};
</script>
