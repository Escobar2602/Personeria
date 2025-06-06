<template>
    <AppLayout>
        <h1 class="text-xl text-center mb-4">Tabla de Usuarios</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <DataTable :value="registros" paginator :rows="5" showGridlines tableStyle="min-width: 50rem" class="w-full text-sm">
                <Column field="id" header="ID"></Column>
                <Column field="name" header="Name"></Column>
                <Column field="apellido" header="Apellido"></Column>
                <Column field="email" header="Correo"></Column>
                <Column field="curso" header="curso"></Column>
                <Column field="profesion" header="Profesion"></Column>
                <Column field="sexo" header="Genero"></Column>
                <Column field="telefono" header="Telefono"></Column>
            </DataTable>
        </div>
    </AppLayout>

</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
defineProps({
    registros: Array,
})
</script>
