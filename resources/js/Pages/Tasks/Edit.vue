<template>
    <div>
      <h1>Modifier la Tâche</h1>
      <form @submit.prevent="submit">
        <input v-model="titre" placeholder="Titre" required />
        <textarea v-model="description" placeholder="Description"></textarea>
        <select v-model="statut">
          <option value="en cours">En cours</option>
          <option value="terminé">Terminé</option>
        </select>
        <input type="date" v-model="date_limite" required />
        <button type="submit">Mettre à jour Tâche</button>
      </form>
    </div>
  </template>

  <script>
  import { ref, onMounted } from 'vue';
  import { Inertia } from '@inertiajs/inertia';

  export default {
    props: {
      tache: Object,
    },
    setup(props) {
      const titre = ref(props.tache.titre);
      const description = ref(props.tache.description);
      const statut = ref(props.tache.statut);
      const date_limite = ref(props.tache.date_limite);

      const submit = () => {
        Inertia.put(`/taches/${props.tache.id}`, { titre, description, statut, date_limite });
      };

      return { titre, description, statut, date_limite, submit };
    },
  };
  </script>
