<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                MySECRET
            </h2>
        </template>
        <div class="container mx-auto my-8 bg-gray-100 p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Mes Tâches</h1>
            <div class="flex justify-between mb-4">
                <Link href="/taches/create" class="py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Ajouter une Tâche
                </Link>
                <input v-model="search" placeholder="Rechercher une tâche"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <select v-model="selectedCategory"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Toutes les catégories</option>
                    <option v-for="category in categories" :key="category.id" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
                <select v-model="selectedStatus"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Tous les statuts</option>
                    <option value="En cours">En cours</option>
                    <option value="Terminé">Terminé</option>
                    <option value="À faire">À faire</option>
                </select>
                <a href="/" class="py-2 px-4 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    Retour
                </a>
            </div>

            <ul class="space-y-6">
                <li v-for="tache in filteredTaches" :key="tache.id"
                    class="bg-white p-4 rounded-lg shadow-md hover:bg-gray-50">
                    <h2 class="text-xl font-semibold text-blue-600">
                        {{ tache.titre }}
                    </h2>
                    <p class="text-gray-600">{{ tache.description }}</p>
                    <p class="text-sm text-gray-500">
                        Statut: <span class="font-semibold">{{ tache.statut }}</span>
                    </p>
                    <p class="text-sm text-gray-500">
                        Date limite: <span class="font-semibold">{{ tache.date_limite }}</span>
                    </p>
                    <p class="text-sm text-gray-500">
                        Date de création: <span class="font-semibold">{{ tache.created_at }}</span>
                    </p>

                    <div class="flex justify-between items-center mt-4">
                        <a :href="`/taches/${tache.id}/edit`"
                            class="py-2 px-4 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                            Modifier
                        </a>
                        <!-- <button @click="sendReminder(tache)"
                            class="py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600">
                            Rappel
                        </button> -->

<!--
                        <button
                        @click="sendEmail"
                        class="py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600">
                        Envoyer Email
                    </button> -->

                        <button @click="deleteTache(tache.id)" class="text-red-500 hover:text-red-600">
                            Supprimer
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";
import Swal from "sweetalert2";
import { computed, ref } from "vue";

export default {
    props: {
        taches: Array,
        categories: Array,
    },
    setup(props) {
        const search = ref("");
        const selectedCategory = ref("");
        const selectedStatus = ref("");

        const filteredTaches = computed(() => {
            return props.taches
                .filter((tache) => {
                    const matchesSearch = tache.titre
                        .toLowerCase()
                        .includes(search.value.toLowerCase());
                    const matchesCategory = selectedCategory.value
                        ? tache.categorie_id === parseInt(selectedCategory.value)
                        : true;
                    const matchesStatus = selectedStatus.value
                        ? tache.statut === selectedStatus.value
                        : true;
                    return matchesSearch && matchesCategory && matchesStatus;
                })
                .sort(
                    (a, b) =>
                        new Date(b.created_at).getTime() - new Date(a.created_at).getTime()
                );
        });

        const deleteTache = (id) => {
            Swal.fire({
                title: "Êtes-vous sûr ?",
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, supprimer !",
            }).then((result) => {
                if (result.isConfirmed) {
                    Inertia.delete(`/taches/${id}`, {
                        onSuccess: () => {
                            Swal.fire({
                                title: "Supprimé!",
                                text: "La tâche a été supprimée.",
                                icon: "success",
                                timer: 2000,
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                    });
                }
            });
        };

        const sendReminder = (tache) => {
            axios.post("/api/send-reminder", tache)
                .then(() => {
                    Swal.fire({
                        title: "Succès!",
                        text: "Email de rappel envoyé avec succès.",
                        icon: "success",
                        timer: 2000,
                    });
                })
                .catch(() => {
                    Swal.fire({
                        title: "Erreur!",
                        text: "Une erreur s'est produite lors de l'envoi de l'email.",
                        icon: "error",
                        timer: 2000,
                    });
                });
        };

        return {
            search,
            selectedCategory,
            selectedStatus,
            filteredTaches,
            deleteTache,
            sendReminder,
        };
    },
};
</script>
