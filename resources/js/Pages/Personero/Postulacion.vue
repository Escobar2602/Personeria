<template>
    <AppLayout>
        <div class="p-6">
            <Card style="width: 25rem; overflow: hidden">
                <template #header>
                    <img alt="user header" src="https://primefaces.org/cdn/primevue/images/usercard.png" />
                </template>
                <template #title>Postulación</template>
                <template #subtitle>Formulario de Postulación</template>
                <template #content>
                    <p class="m-0">
                        Por favor, complete el formulario para postularse.
                    </p>
                </template>
                <template #footer>
                    <div class="flex gap-4 mt-1">
                        <Button label="Cancelar" severity="secondary" outlined class="w-full" />
                        <Button label="Guardar" class="w-full" />
                    </div>
                </template>
            </Card>
        </div>
</AppLayout>

</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Card from 'primevue/card';
import Button from 'primevue/button';
</script>



