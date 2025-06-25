<template>
  <AppLayout title="Candidatos Personero 2025">
    <div class="min-h-screen bg-gradient-to-br from-emerald-100 to-emerald-200 py-16 px-4">
      <h1 class="text-4xl font-bold text-center text-blue-800 mb-12 animate-fade-in">
        📋 Lista de Candidatos
      </h1>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 max-w-7xl mx-auto">
        <div
          v-for="postulacion in postulaciones"
          :key="postulacion.id"
          class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-shadow duration-300 animate-fade-in"
        >
          <div class="h-48 w-full rounded-t-3xl overflow-hidden">
            <img
              :src="`/storage/${postulacion.foto}`"
              alt="Foto del candidato"
              class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
            />
          </div>
          <div class="p-6">
            <h2 class="text-xl font-semibold text-blue-700 mb-2">
              {{ postulacion.nombre }}
            </h2>
            <p class="text-gray-700 text-sm leading-relaxed">
              {{ postulacion.descripcion }}
            </p>
          </div>
          <div class="px-6 pb-6 flex justify-center">
            <button
              @click="votar(postulacion.id)"
              class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-full shadow-md hover:shadow-lg transition-all duration-300"
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
import AppLayout from '@/Layouts/AppLayout.vue'

defineProps({
  postulaciones: Array
})

function votar(id) {
  Inertia.post('/votar3', {
    postulacion_id: id
  })
}
</script>

<style scoped>
.animate-fade-in {
  animation: fadeIn 0.6s ease-out;
}
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(15px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
