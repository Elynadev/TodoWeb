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


            <a href="/tache" class="bg-red-500 hover:bg-blue-700 text-white px-8 py-6 rounded-lg m-8 shadow-lg flex items-center w-52">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
              Mes notes
            </a>

        </div>



    </AuthenticatedLayout>
</template>

<script setup>

</script>
