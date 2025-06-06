<template>
    <AppLayout>

        <div class="p-6">
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
