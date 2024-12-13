<template>
    <div class="mb-4 p-4 border-b border-gray-200">
        <h3 class="text-lg font-bold">{{ task.title }}</h3>
        <p class="text-gray-700">{{ task.description }}</p>
        <p class="text-gray-700">Statut: {{ task.status }}</p>
        <p class="text-gray-700">Date Limite: {{ task.deadline }}</p>
        <div class="flex space-x-2 mt-2">
            <button class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</button>
            <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        task: Object,
    },
};
</script>
