<template>
    <AppLayout title="Elecciones Personero 2025">
        <div class="min-h-screen s p-6 flex flex-col justify-center items-center text-center">
            <div class="mb-10 max-w-4xl">
                <div class="mb-8 animate-fade-in">
                    <div class="w-32 h-32 mx-auto p-1 bg-white rounded-full shadow-md ring-2 ring-blue-200">
                        <img src="/images/foto3.webp" alt="Logo Colegio" class="w-full h-full object-cover rounded-full" />
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-blue-900 mt-6 mb-3">
                        Elecciones Personero Estudiantil <span class="text-blue-600">2025</span>
                    </h1>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Conoce a tus candidatos, sus propuestas y participa en esta jornada democrática escolar.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
                    <Link
                        href="/postulacion"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 font-medium text-lg"
                    >
                        Postularse como Candidato
                    </Link>
                    <Link
                        href="/votar"
                        class="bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 px-8 py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 font-medium text-lg"
                    >
                        Ver Candidatos
                    </Link>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100">
                    <div class="flex flex-col md:flex-row gap-8 items-center">
                        <div class="md:w-1/2">
                            <h2 class="text-2xl font-bold text-blue-800 mb-4">¿Qué es la personería estudiantil?</h2>
                            <p class="text-gray-700 text-lg leading-relaxed">
                                Es el representante elegido democráticamente por los estudiantes para velar por sus derechos,
                                promover la participación activa y fomentar una sana convivencia escolar.
                            </p>
                            <p class="text-gray-700 text-lg mt-4 leading-relaxed">
                                El personero será tu voz ante la administración del colegio.
                                ¡Participa con responsabilidad en este importante proceso!
                            </p>
                        </div>
                        <div class="md:w-1/2">
                            <div class="bg-blue-50 p-6 rounded-xl border border-blue-100">
                                <h3 class="text-xl font-semibold text-blue-700 mb-3">Fechas importantes</h3>
                                <ul class="space-y-3 text-left">
                                    <li class="flex items-start">
                                        <span class="bg-blue-100 text-blue-800 p-1 rounded-full mr-3">📅</span>
                                        <span><strong>Postulaciones:</strong> 1-15 de Marzo</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="bg-blue-100 text-blue-800 p-1 rounded-full mr-3">🗳️</span>
                                        <span><strong>Campaign:</strong> 16-30 de Marzo</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="bg-blue-100 text-blue-800 p-1 rounded-full mr-3">🏛️</span>
                                        <span><strong>Elecciones:</strong> 5 de Abril</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
.animate-fade-in {
    animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
