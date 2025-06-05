<template>
  <div class="max-w-md mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Registrar Datos</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block mb-1">Nombre</label>
        <input v-model="form.name" type="text" class="w-full border rounded p-2" />
        <div v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name }}</div>
      </div>

      <div>
        <label class="block mb-1">Correo</label>
        <input v-model="form.email" type="email" class="w-full border rounded p-2" />
        <div v-if="form.errors.email" class="text-red-500 text-sm">{{ form.errors.email }}</div>
      </div>
        <div>
            <label class="block mb-1">Apellido</label>
            <input v-model="form.apellido" type="text" class="w-full border rounded p-2" />
            <div v-if="form.errors.apellido" class="text-red-500 text-sm">{{ form.errors.apellido }}</div>
        </div>
        <div>
            <label class="block mb-1">Teléfono</label>
            <input v-model="form.telefono" type="text" class="w-full border rounded p-2" />
            <div v-if="form.errors.telefono" class="text-red-500 text-sm">{{ form.errors.telefono }}</div>

        </div>
        <div>
            <label class="block mb-1">Curso</label>
            <input v-model="form.curso" type="text" class="w-full border rounded p-2" />
            <div v-if="form.errors.direccion" class="text-red-500 text-sm">{{ form.errors.curso }}</div>
        </div>
        <div>
            <label class="block mb-1">Dirección</label>
            <input v-model="form.direccion" type="text" class="w-full border rounded p-2" />
            <div v-if="form.errors.direccion" class="text-red-500 text-sm">{{ form.errors.direccion }}</div>
        </div>
        <div>
            <label class="block mb-1">Profesión</label>
            <input v-model="form.profesion" type="text" class="w-full border rounded p-2" />
            <div v-if="form.errors.profesion" class="text-red-500 text-sm">{{ form.errors.profesion }}</div>
        </div>

        <div>
            <label class="block mb-1">Sexo</label>
            <select v-model="form.sexo" class="w-full border rounded p-2">
                <option value="">Seleccione una opción</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>
            <div v-if="form.errors.sexo" class="text-red-500 text-sm">{{ form.errors.sexo }}</div>
        </div>


      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Guardar
      </button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
  apellido: '',
  curso: null,
  profesion: '',
  sexo: '',
  telefono: null,
})

function submit() {
  form.post(route('personeria.store'), {
    onSuccess: () => {
      form.reset()
      form.clearErrors()
    },
    onError: (errors) => {
        console.error(errors)
      form.errors = errors
    }
  })
}
</script>
