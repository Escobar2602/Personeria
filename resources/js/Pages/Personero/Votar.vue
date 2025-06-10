<template>
  <AppLayout>
    <div class="p-8 bg-gray-100 min-h-screen ">
      <h1 class="text-2xl font-bold mb-6">Postulaciones</h1>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-11 ga ">
        <div
          v-for="postulacion in postulaciones"
          :key="postulacion.id"
          class=" flex w-80 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md"
        >
          <div
            class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600"
          >
            <img
              :src="`/storage/${postulacion.foto}`"
              alt="Foto"
              class="w-full h-full object-cover"
            />
          </div>
          <div class="p-6">
            <h5
              class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased"
            >
              {{ postulacion.nombre }}
            </h5>
            <p
              class="block font-sans text-base font-light leading-relaxed text-inherit antialiased"
            >
              {{ postulacion.descripcion }}
            </p>
          </div>
          <div class="p-6 pt-0">
            <button
              @click="votar(postulacion.id)"
              class="select-none rounded-lg bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            >
              Votar
            </button>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>


<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';



defineProps({
  postulaciones: Array
});

function votar(id) {
  Inertia.post('/votar', {
    postulacion_id: id
  });
}
</script>
