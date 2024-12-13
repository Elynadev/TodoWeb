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

        <form class="max-w-lg mx-auto m-12">
            <div class="flex">
                <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                <button id="dropdown-button" type="button"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                    All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <li><button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button></li>
                        <li><button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button></li>
                        <li><button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button></li>
                        <li><button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button></li>
                    </ul>
                </div>
                <div class="relative w-full">
                    <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required />
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-center">
                        Bienvenue dans la Gestion des Tâches
                    </div>
                </div>
            </div>
        </div>

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
            <!-- À réviser
            <div class="bg-white rounded-lg shadow-lg p-4">
                <h3 class="text-xl font-bold text-red-600 mb-4">Notes à réviser</h3>
                <ul class="space-y-4">
                    <li class="bg-red-100 p-3 rounded-lg">
                        <h4 class="font-semibold">Titre 5</h4>
                        <p class="text-gray-600 text-sm">Note nécessitant une révision urgente.</p>
                        <span class="text-red-500 text-xs">Échéance: 2023-12-05</span>
                    </li>
                    <li class="bg-red-100 p-3 rounded-lg">
                        <h4 class="font-semibold">Titre 6</h4>
                        <p class="text-gray-600 text-sm">Autre note à corriger.</p>
                        <span class="text-red-500 text-xs">Échéance: 2023-12-10</span>
                    </li>
                </ul>
            </div>
        </div> -->
    </AuthenticatedLayout>
</template>
