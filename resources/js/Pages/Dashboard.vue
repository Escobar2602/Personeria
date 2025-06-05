<template>
    <AppLayout>
        <div class="min-h-screen bg-gradient-to-br from-blue-100 to-white p-6 flex flex-col justify-center items-center text-center">
            <div class="mb-8">
            <img src="/images/fotoo4.jpg" alt="Logo Colegio" class="w-24 h-24 mx-auto rounded-full shadow-lg" />
            <h1 class="text-4xl font-bold text-blue-800 mt-4">Elecciones Personero Estudiantil 2025</h1>
            <p class="text-gray-600 mt-2">Conoce a tus candidatos, sus propuestas y participa en esta jornada democrática escolar.</p>
            </div>

            <router-link to="/candidatos">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-2xl shadow-lg transition-all">
                Ver candidatos
            </button>
            </router-link>

            <div class="mt-10 max-w-3xl text-gray-700">
            <h2 class="text-2xl font-semibold text-blue-700 mb-2">¿Qué es la personería estudiantil?</h2>
            <p>
                Es una representación elegida por los estudiantes para velar por sus derechos, promover la participación y apoyar una sana convivencia escolar.
                ¡Tu voz cuenta, participa con responsabilidad!
            </p>
            </div>
        </div>

    </AppLayout>

</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<style scoped>
</style>
