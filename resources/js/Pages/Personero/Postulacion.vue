<template>
    <AppLayout>
    <form method="POST" action="{{ route('postulacion.store') }}" enctype="multipart/form-data">

    <div>
        <label class="block mb-1 font-semibold">Foto:</label>
        <input type="file" name="foto" class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block mb-1 font-semibold">Nombre:</label>
        <input type="text" name="nombre" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block mb-1 font-semibold">Grado:</label>
        <input type="text" name="grado" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block mb-1 font-semibold">Descripción:</label>
        <textarea name="descripcion" class="w-full border rounded p-2" rows="4"></textarea>
    </div>

    <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Guardar Postulación
        </button>
    </div>
</form>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
defineProps({
    registros: Array,
})
</script>
