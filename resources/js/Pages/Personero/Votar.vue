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
            <p class="text-gray-700 text-sm leading-relaxed">
              {{ postulacion.grado }}
            </p>
          </div>
          <div class="px-6 pb-6 flex justify-center">
            <button
                @click="votar(postulacion.id)"
                :disabled="yaVoto"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-full shadow-md hover:shadow-lg transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                Votar
                </button>

          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<!-- <script setup>
import AppLayout from '@/Layouts/AppLayout.vue'

defineProps({
  postulaciones: Array
})

function votar(id) {
  console.log('Votando por:', id)
  Inertia.post('/votar3', {
    postulacion_id: id
  })
}
</script> -->
<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

defineProps({
  postulaciones: Array
})

const yaVoto = ref(false)

function votar(id) {
  if (yaVoto.value) return

  router.post('/votar3', {
    postulacion_id: id
  }, {
    onSuccess: () => {
      yaVoto.value = true
      alert('✅ Voto registrado correctamente.')
    },
    onError: () => {
      alert('❌ Hubo un error al registrar el voto. Intenta de nuevo.')
    }
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
