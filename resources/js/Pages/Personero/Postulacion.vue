<template>
  <AppLayout title="Postulación Personero 2025">
    <div class="min-h-screen bg-gradient-to-br from-emerald-100 via-white to-emerald-200 py-16 px-4 flex items-center justify-center">
      <div class="w-full max-w-2xl bg-white rounded-3xl shadow-2xl p-10 animate-fade-in">

        <h2 class="text-3xl font-bold text-emerald-700 text-center mb-8">📋 Postulación como Candidato</h2>

        <form @submit.prevent="submit" class="space-y-6">

          <div class="flex flex-col items-center justify-center">
            <div v-if="!previewImage" class="w-full">
              <label class="block text-gray-700 font-semibold mb-2">Foto del candidato:</label>
              <input
                type="file"
                @change="onFileChange"
                accept="image/*"
                class="w-full border border-gray-300 rounded-lg p-2"
                required
              />
            </div>
            <div v-else class="relative w-40 h-40 mb-4">
              <img
                :src="previewImage"
                class="w-full h-full object-cover rounded-full border-4 border-emerald-400 shadow-lg cursor-pointer"
                @click="removeImage"
                title="Haz clic para eliminar la imagen"
              />
              <p class="text-xs text-center text-gray-600 mt-2">(Haz clic en la imagen para cambiarla)</p>
            </div>
          </div>

          <div>
            <label class="block text-gray-700 font-semibold mb-2">Nombre completo:</label>
            <input
              v-model="form.nombre"
              type="text"
              placeholder="Ej. Juan Pérez"
              required
              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-emerald-400"
            />
          </div>

          <div>
            <label class="block text-gray-700 font-semibold mb-2">Descripción / Propuestas:</label>
            <textarea
              v-model="form.descripcion"
              placeholder="Cuéntanos por qué deseas ser personero"
              rows="4"
              required
              class="w-full border border-gray-300 rounded-lg p-3 resize-none focus:outline-none focus:ring-2 focus:ring-emerald-400"
            ></textarea>
          </div>

          <div class="text-center">
            <button
              type="submit"
              class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition-all duration-300"
            >
              Enviar Postulación
            </button>
          </div>
        </form>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

const form = useForm({
  nombre: '',
  descripcion: '',
  foto: null
})

const previewImage = ref(null)

function onFileChange(event) {
  const file = event.target.files[0]
  if (file && file.type.startsWith('image/')) {
    form.foto = file
    previewImage.value = URL.createObjectURL(file)
  } else {
    form.foto = null
    previewImage.value = null
  }
}

function removeImage() {
  form.foto = null
  previewImage.value = null
}

function submit() {
  form.post(route('votar.store'), {
    onSuccess: () => form.reset(),
    onError: (errors) => console.error(errors)
  })
}
</script>

<style scoped>
.animate-fade-in {
  animation: fadeIn 0.8s ease-out;
}
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
