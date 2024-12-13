<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                MySECRET
            </h2>
        </template>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- En cours -->
        <div class="bg-white rounded-lg shadow-lg p-4">
            <h3 class="text-xl font-bold text-blue-600 mb-4">Notes en cours</h3>
            <ul class="space-y-4">

                <li v-for="tache in tachesEnCours" :key="tache.id" class="bg-blue-100 p-3 rounded-lg">
                    <h4 class="font-semibold">{{ tache.titre }}</h4>
                    <p class="text-gray-600 text-sm">{{ tache.description }}</p>
                    <span class="text-blue-500 text-xs">Échéance: {{ tache.date_limite }}</span>
                </li>
            </ul>
        </div>

        <!-- Terminées -->
        <div class="bg-white rounded-lg shadow-lg p-4">
            <h3 class="text-xl font-bold text-green-600 mb-4">Notes terminées</h3>
            <ul class="space-y-4">
                <li v-for="tache in tachesTerminees" :key="tache.id" class="bg-green-100 p-3 rounded-lg">
                    <h4 class="font-semibold">{{ tache.titre }}</h4>
                    <p class="text-gray-600 text-sm">{{ tache.description }}</p>
                    <span class="text-green-500 text-xs">Échéance: {{ tache.date_limite }}</span>
                </li>
            </ul>
        </div>

        <!-- À réviser -->
        <div class="bg-white rounded-lg shadow-lg p-4">
            <h3 class="text-xl font-bold text-red-600 mb-4">Notes à réviser</h3>
            <ul class="space-y-4">
                <li v-for="tache in tachesAReviser" :key="tache.id" class="bg-red-100 p-3 rounded-lg">
                    <h4 class="font-semibold">{{ tache.titre }}</h4>
                    <p class="text-gray-600 text-sm">{{ tache.description }}</p>
                    <span class="text-red-500 text-xs">Échéance: {{ tache.date_limite }}</span>
                </li>
            </ul>
        </div>
    </div>
</AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps } from 'vue';

// Définir les props pour recevoir les données
const props = defineProps({
    tachesEnCours: Array,
    tachesTerminees: Array,
    tachesAReviser: Array,
});
</script>

<style scoped>
/* Ajoutez vos styles ici si nécessaire */
</style>
