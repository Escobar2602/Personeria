<template>
    <AppLayout>

        <div class="p-6">
            <h1 class="text-2xl font-bold mb-4">Registros de Personería</h1>
            <Form />
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
