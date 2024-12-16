<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-red-50 text-black/50 dark:bg-black dark:text-red/50">
        <div class="relative flex min-h-screen flex-col items-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class= "py-2 bg-red-500 text-white text-center gap-2  lg:grid-cols-3">
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <h2 class="text-xl  text-white-500 font-semibold">MySECRET</h2>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-6 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>


                <main>
                    <div class="flex flex-col items-center justify-center p-4 lg:p-6">

                        <H1>MySECRET est une application de gestion des tâches conçue
                            pour vous aider à organiser, suivre et gérer vos notes et tâches quotidiennes de manière efficace. Que vous soyez un étudiant, un professionnel ou simplement quelqu'un qui aime garder ses idées bien ordonnées,
                             MySECRET est l'outil idéal pour vous.</H1>
                    </div>


                    <main class="py-12 max-w-7xl mx-auto px-4">
                        <div class="flex justify-center mt-10">
                            <a href="/taches/create" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-4 rounded-lg shadow-lg text-xl transition duration-300">
                                Commencer
                            </a>
                        </div>

                        <div class="flex flex-col items-center mt-10">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                                <a href="/taches/create" class="bg-red-500 hover:bg-blue-700 text-white px-8 py-6 rounded-lg shadow-lg flex items-center justify-center">
                                    Créer une note
                                </a>

                                <a href="/taches" class="bg-red-500 hover:bg-blue-700 text-white px-8 py-6 rounded-lg shadow-lg flex items-center justify-center">
                                    Voir mes notes
                                </a>

                                <a href="/taches/status" class="bg-red-500 hover:bg-blue-700 text-white px-8 py-6 rounded-lg shadow-lg flex items-center justify-center">
                                    Tâches par catégorie
                                </a>

                                <a href="/tache" class="bg-red-500 hover:bg-blue-700 text-white px-8 py-6 rounded-lg shadow-lg flex items-center justify-center">
                                    Mes tâches
                                </a>
                            </div>
                        </div>
                    </main>

                </main>
            </div>

        </div>



            </div>


</template>
