<template>
  <AppLayout>
    <PieChart :data="chartData" />
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref, computed } from 'vue'

const porcentajeVotos = ref(40)

const chartData = computed(() => ({
  labels: ['Votaron', 'No votaron'],
  datasets: [{
    data: [porcentajeVotos.value, 100 - porcentajeVotos.value],
    backgroundColor: ['#4CAF50', '#F44336'],
  }]
}))
</script>
