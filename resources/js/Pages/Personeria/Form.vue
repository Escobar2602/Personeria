<template>
  <form @submit.prevent="submit" class="space-y-4 max-w-md mx-auto mt-10">
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

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
      Guardar
    </button>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
})

function submit() {
  form.post(route('personeria.store'))
}
</script>
