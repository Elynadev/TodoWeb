<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                MySECRET
            </h2>
        </template>

    <div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg">
      <h1 class="text-2xl font-semibold mb-4">Ajouter une Tâche</h1>
      <form @submit.prevent="submit">
        <div class="mb-4">
          <input
            v-model="titre"
            placeholder="Titre"
            required
            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <div class="mb-4">
          <textarea
            v-model="description"
            placeholder="Description"
            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          ></textarea>
        </div>
        <div class="mb-4">
          <select
            v-model="statut"
            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="en cours">En cours</option>
            <option value="terminé">Terminé</option>
          </select>
        </div>
        <div class="mb-4">
          <input
            type="date"
            v-model="date_limite"
            required
            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <button
          type="submit"
          class="w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
          Créer Tâche
        </button>
      </form>
    </div>
</AuthenticatedLayout>
  </template>

  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';

  const titre = ref('');
  const description = ref('');
  const statut = ref('en cours');
  const date_limite = ref('');

  const submit = () => {
    Inertia.post('/taches', { titre: titre.value, description: description.value, statut: statut.value, date_limite: date_limite.value });
  };
  </script>
