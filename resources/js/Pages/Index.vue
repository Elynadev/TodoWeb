<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                MySECRET
            </h2>
        </template>
>
    <div class="container mx-auto my-8 bg-gray-100 p-6 rounded-lg shadow-lg">
      <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Mes Tâches</h1>
      <div class="flex justify-between mb-4">
        <Link
          href="/taches/create"
          class="py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
        >
          Ajouter une Tâche
        </Link>
        <input
          v-model="search"
          placeholder="Rechercher une tâche"
          class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <ul class="space-y-6">
        <li
          v-for="tache in filteredTaches"
          :key="tache.id"
          class="bg-white p-4 rounded-lg shadow-md hover:bg-gray-50"
        >
          <h2 class="text-xl font-semibold text-blue-600">{{ tache.titre }}</h2>
          <p class="text-gray-600">{{ tache.description }}</p>
          <p class="text-sm text-gray-500">Status: <span class="font-semibold">{{ tache.statut }}</span></p>
          <p class="text-sm text-gray-500">Date limite: <span class="font-semibold">{{ tache.date_limite }}</span></p>

          <div class="flex justify-between items-center mt-4">
            <Link
              :href="`/taches/${tache.id}/edit`"
              class="text-blue-500 hover:text-blue-600"
            >
              Modifier
            </Link>
            <button
              @click="deleteTache(tache.id)"
              class="text-red-500 hover:text-red-600"
            >
              Supprimer
            </button>
          </div>
        </li>
      </ul>
    </div>
</AuthenticatedLayout>
  </template>

  <script>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import Swal from 'sweetalert2';
import { computed, ref } from 'vue';

  export default {
    props: {
      taches: Array,
    },
    setup(props) {
      const search = ref('');

      const filteredTaches = computed(() => {
        return props.taches.filter(tache =>
          tache.titre.toLowerCase().includes(search.value.toLowerCase())
        );
      });

      const deleteTache = (id) => {
        Swal.fire({
          title: 'Êtes-vous sûr ?',
          text: "Vous ne pourrez pas revenir en arrière !",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Oui, supprimer !',
        }).then((result) => {
          if (result.isConfirmed) {
            Inertia.delete(`/taches/${id}`, {
              onFinish: () => {
                Swal.fire(
                  'Supprimé!',
                  'La tâche a été supprimée.',
                  'success'
                );
              }
            });
          }
        });
      };

      return { search, filteredTaches, deleteTache };
    },
  };
  </script>
