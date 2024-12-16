<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Modifier la Tâche
            </h2>
        </template>

        <div class="container mx-auto my-8 bg-gray-100 p-6 rounded-lg shadow-lg">
            <form @submit.prevent="updateTache">
                <div class="mb-4">
                    <label for="titre" class="block">Titre</label>
                    <input v-model="tache.titre" type="text" id="titre" class="form-input mt-1 block w-full" required />
                </div>

                <div class="mb-4">
                    <label for="description" class="block">Description</label>
                    <textarea v-model="tache.description" id="description" class="form-textarea mt-1 block w-full"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700" for="statut">Statut</label>
                    <select v-model="tache.statut" id="statut" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                        <option value="en cours">En cours</option>
                        <option value="terminé">Terminé</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="date_limite" class="block">Date Limite</label>
                    <input v-model="tache.date_limite" type="date" id="date_limite" class="form-input mt-1 block w-full" />
                </div>

                <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Mettre à jour</button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';

export default {
    props: {
        tache: Object,
    },
    setup(props) {
        // Utilisation de `ref` pour rendre `tache` réactif
        const tache = ref(props.tache);

        // Méthode pour mettre à jour la tâche
        const updateTache = () => {
            // Envoi de la requête PUT pour mettre à jour la tâche avec le statut
            Inertia.put(`/taches/${tache.value.id}`, {
                ...tache.value,  // Les données de la tâche (titre, description, etc.)
                statut: tache.value.statut,  // Assurez-vous que le statut est inclus dans les données envoyées
            });
        };

        return { tache, updateTache };
    },
};
</script>
