<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Ajouter une Tâche
            </h2>
        </template>
        <div class="container mx-auto my-8 bg-gray-100 p-6 rounded-lg shadow-lg">
            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label class="block text-gray-700" for="titre">Titre</label>
                    <input v-model="titre" type="text" id="titre" class="mt-1 p-2 border border-gray-300 rounded w-full" required />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="description">Description</label>
                    <textarea v-model="description" id="description" class="mt-1 p-2 border border-gray-300 rounded w-full"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="statut">Statut</label>
                    <select v-model="statut" id="statut" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                        <option value="en cours">En cours</option>
                        <option value="terminé">Terminé</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="date_limite">Date Limite</label>
                    <input v-model="date_limite" type="date" id="date_limite" class="mt-1 p-2 border border-gray-300 rounded w-full" required />
                </div>
                <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Créer Tâche</button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';
import { useToast } from 'vue-toastification';

export default {
    components: { AuthenticatedLayout },
    setup() {
        const titre = ref('');
        const description = ref('');
        const statut = ref('en cours');
        const date_limite = ref('');
        const toast = useToast();

        const submit = () => {
            Inertia.post('/taches', {
                titre: titre.value,
                description: description.value,
                statut: statut.value,
                date_limite: date_limite.value,
            }, {
                onSuccess: () => {
                    // Afficher le toast après la création réussie
                    toast.success('Tâche créée avec succès !');
                    // Rediriger vers la page d'index des tâches
                    Inertia.visit('/taches'); // Vous pouvez aussi utiliser '/taches' directement si vous avez un nom de route pour l'index
                },
                onError: () => {
                    // Afficher un toast en cas d'erreur
                    toast.error('Erreur lors de la création de la tâche.');
                },
            });
        };

        return { titre, description, statut, date_limite, submit };
    },
};
</script>
