<template>
  <AppLayout title="Elecciones Personero 2025">
    <div class="min-h-screen bg-gradient-to-br from-emerald-100 to-emerald-200 py-16 px-4 flex flex-col items-center justify-center">
      <div class="text-center mb-12 animate-fade-in">
        <div class="w-32 h-32 mx-auto p-1 bg-white rounded-full shadow-xl ring-4 ring-blue-300">
          <img src="/images/foto3.webp" alt="Logo Colegio" class="w-full h-full object-cover rounded-full" />
        </div>
        <h1 class="text-5xl font-extrabold text-blue-900 mt-8 leading-tight">
          Elecciones Personero <span class="text-blue-600">2025</span>
        </h1>
        <p class="text-lg text-gray-700 mt-4 max-w-xl mx-auto">
          Conoce a tus candidatos, sus propuestas y participa en esta jornada democrática escolar.
        </p>
      </div>

      <div class="flex flex-col sm:flex-row gap-6 mb-16">
        <Link
          href="/postulacion"
          class="px-8 py-4 bg-blue-700 text-white rounded-2xl shadow-md hover:shadow-xl hover:bg-blue-800 transition-all text-lg font-semibold transform hover:-translate-y-1"
        >
          Postularse como Candidato
        </Link>
        <Link
          href="/votar"
          class="px-8 py-4 bg-white border-2 border-blue-600 text-blue-600 rounded-2xl shadow-md hover:bg-blue-50 transition-all text-lg font-semibold transform hover:-translate-y-1"
        >
          Ver Candidatos
        </Link>
      </div>

      <div class="w-full max-w-5xl bg-white p-10 rounded-3xl shadow-xl border border-gray-200 animate-fade-in delay-200">
        <div class="grid md:grid-cols-2 gap-10 items-center">
          <div>
            <h2 class="text-2xl font-bold text-blue-800 mb-4">¿Qué es la personería estudiantil?</h2>
            <p class="text-gray-700 text-lg leading-relaxed">
              Es el representante elegido democráticamente por los estudiantes para velar por sus derechos,
              promover la participación activa y fomentar una sana convivencia escolar.
            </p>
            <p class="text-gray-700 text-lg mt-4 leading-relaxed">
              El personero será tu voz ante la administración del colegio. ¡Participa con responsabilidad en este importante proceso!
            </p>
          </div>

          <div class="bg-blue-50 p-6 rounded-2xl border border-blue-200 shadow-sm">
            <h3 class="text-xl font-semibold text-blue-700 mb-4">📅 Fechas importantes</h3>
            <ul class="space-y-4 text-gray-800">
              <li class="flex items-start gap-3">
                <span class="text-2xl">📝</span>
                <span><strong>Postulaciones:</strong> 1 - 15 de Marzo</span>
              </li>
              <li class="flex items-start gap-3">
                <span class="text-2xl">🎤</span>
                <span><strong>Campaña:</strong> 16 - 30 de Marzo</span>
              </li>
              <li class="flex items-start gap-3">
                <span class="text-2xl">🗳️</span>
                <span><strong>Elecciones:</strong> 5 de Abril</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<style scoped>
.animate-fade-in {
  animation: fadeIn 0.9s ease-out;
}
.animate-fade-in.delay-200 {
  animation-delay: 0.2s;
}
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
