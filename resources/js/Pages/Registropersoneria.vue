<template>
    <AppLayout>
        <Head title="Registro de Personería" />
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Registro de Personería</h1>

        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Nuevo Registro</h2>

            <form @submit.prevent="submitForm" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">
                            Nombre
                        </label>
                        <input
                            id="nombre"
                            v-model="form.nombre"
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            :class="{ 'border-red-500': errors.nombre }"
                            required
                        >
                        <span v-if="errors.nombre" class="text-red-500 text-sm">{{ errors.nombre }}</span>
                    </div>

                    <div>
                        <label for="apellido" class="block text-sm font-medium text-gray-700 mb-1">
                            Apellido
                        </label>
                        <input
                            id="apellido"
                            v-model="form.apellido"
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            :class="{ 'border-red-500': errors.apellido }"
                            required
                        >
                        <span v-if="errors.apellido" class="text-red-500 text-sm">{{ errors.apellido }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="cargo" class="block text-sm font-medium text-gray-700 mb-1">
                            Cargo
                        </label>
                        <select
                            id="cargo"
                            v-model="form.cargo"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            :class="{ 'border-red-500': errors.cargo }"
                            required
                        >
                            <option value="">Seleccionar cargo</option>
                            <option value="estudiante">Estudiante</option>
                            <option value="profesor">Profesor</option>
                        </select>
                        <span v-if="errors.cargo" class="text-red-500 text-sm">{{ errors.cargo }}</span>
                    </div>

                    <div>
                        <label for="semestre" class="block text-sm font-medium text-gray-700 mb-1">
                            Semestre
                        </label>
                        <input
                            id="semestre"
                            v-model="form.semestre"
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ej: 2024-1"
                        >
                    </div>
                </div>

                <div class="flex justify-end">
                    <button
                        type="submit"
                        :disabled="processing"
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50"
                    >
                        {{ processing ? 'Guardando...' : 'Guardar Registro' }}
                    </button>
                </div>
            </form>
        </div>


    </div>
    </AppLayout>
</template>

<script setup>
import { useForm, router } from '@inertiajs/vue3'
import { defineProps } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'



// Formulario
const form = useForm({
  nombre: '',
  apellido: '',
  cargo: '',
  semestre: ''
})

// Enviar formulario
const submitForm = () => {
  form.post('/registro-personeria', {
    onSuccess: () => {
      form.reset()
      console.log('Registro guardado exitosamente')
    },
    onError: (errors) => {
      console.log('Errores:', errors)
    }
  })
}

// Eliminar personería
const deletePersoneria = (id) => {
  if (confirm('¿Estás seguro de que quieres eliminar este registro?')) {
    router.delete(`/registro-personeria/${id}`)
  }
}
</script>

