<template>
    <AppLayout>

        <div class="p-6">
            <h1 class="text-2xl font-bold mb-4">Registros de Personería</h1>
            <Form />
            <table class="w-full mt-8 border">
            <thead class="bg-gray-100">
                <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Nombre</th>
                <th class="p-2 border">Correo</th>
                <th class="p-2 border">Apellido</th>
                <th class="p-2 border">Teléfono</th>
                <th class="p-2 border">profesion</th>
                <th class="p-2 border">Sexo</th>
                <th class="p-2 border">curso</th>
                </tr>

            </thead>
            <tbody>
                <tr v-for="registro in registros" :key="registro.id" class="hover:bg-gray-50">
                <td class="p-2 border">{{ registro.id }}</td>
                <td class="p-2 border">{{ registro.name }}</td>
                <td class="p-2 border">{{ registro.email }}</td>
                <td class="p-2 border">{{ registro.apellido }}</td>
                <td class="p-2 border">{{ registro.curso }}</td>
                <td class="p-2 border">{{ registro.profesion }}</td>
                <td class="p-2 border">{{ registro.sexo }}</td>
                <td class="p-2 border">{{ registro.telefono }}</td>
                </tr>
            </tbody>
            </table>
        </div>
      </AppLayout>

</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Form from './Form.vue'
defineProps({
  registros: Array,
})
</script>
