<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                MySECRET
            </h2>
        </template>


        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-center">
                        Bienvenue dans la Gestion des Tâches
                    </div>
                </div>
            </div>
        </div>

        <div class="flex space-x-4  justify-center">
            <a href="/taches/create" class="bg-red-500 hover:bg-blue-700 text-white px-8 py-6 rounded-lg m-8 shadow-lg flex items-center w-52">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Créer une note
            </a>

            <a href="/taches" class="bg-red-500 hover:bg-blue-700 text-white px-8 py-6 rounded-lg m-8 shadow-lg flex items-center w-52">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Voir toutes mes notes
            </a>

            <a href="/taches/status" class="bg-red-500 hover:bg-blue-700 text-white px-8 py-6 rounded-lg m-8 shadow-lg flex items-center w-52">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Voir mes  tâches par catégorie
            </a>
        </div>
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

</script>
