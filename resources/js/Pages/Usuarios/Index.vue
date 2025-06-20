<!-- <template>
        <AppLayout>

  <div class="container">
    <h1>Lista de Usuarios</h1>
    <table class="table-auto w-full border-collapse border border-gray-300">
      <thead>
        <tr class="bg-gray-100">
          <th class="border px-4 py-2">ID</th>
          <th class="border px-4 py-2">Nombre</th>
          <th class="border px-4 py-2">Email</th>
          <th class="border px-4 py-2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="usuario in usuarios" :key="usuario.id">
          <td class="border px-4 py-2">{{ usuario.id }}</td>
          <td class="border px-4 py-2">{{ usuario.name }}</td>
          <td class="border px-4 py-2">{{ usuario.email }}</td>

        </tr>
      </tbody>
    </table>
  </div>
      </AppLayout>

</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
  usuarios: Array
});
</script> -->

<template>
    <AppLayout>
        <h1 class="text-xl text-center mb-4">Tabla de Usuarios</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <DataTable :value="usuarios" paginator :rows="5" showGridlines :filters="filters" tableStyle="min-width: 50rem" class="w-full text-sm">
                <template #header>
                    <InputText v-model="filters['global'].value" placeholder="Búsqueda" />
                </template>
                <Column field="id" header="ID"></Column>
                <Column field="name" header="Name"></Column>
                <Column field="email" header="Correo"></Column>
                <Column header="Acciones">

                    <template #body="slotProps">
                        <div class="flex space-x-2">
                            <button>
                            <span class="shadow"></span>
                            <span class="edge"></span>
                            <span class="front text"> Editar
                            </span>
                            </button>

                            <button>
                            <span class="shadowv"></span>
                            <span class="edgev"></span>
                            <span class="frontv text"> Eliminar
                            </span>
                            </button>
                        </div>
                    </template>
                </Column>
                <Column field="Rol" header="Roles"></Column>


            </DataTable>
        </div>
    </AppLayout>

</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DataTable from 'primevue/datatable';
import { FilterMatchMode } from '@primevue/core/api';
import Column from 'primevue/column';
import { InputText } from 'primevue';
import { ref } from 'vue';

const filters = ref({
    'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
});

defineProps({
    usuarios: Array,
})
</script>
<style scoped>
button {
 position: relative;
 border: none;
 background: transparent;
 padding: 0;
 cursor: pointer;
 outline-offset: 4px;
 transition: filter 250ms;
 user-select: none;
 touch-action: manipulation;
}

.shadow {
 position: absolute;
 top: 0;
 left: 0;
 width: 100%;
 height: 100%;
 border-radius: 12px;
 background: hsl(0deg 0% 0% / 0.25);
 will-change: transform;
 transform: translateY(2px);
 transition: transform
    600ms
    cubic-bezier(.3, .7, .4, 1);
}

.edge {
 position: absolute;
 top: 0;
 left: 0;
 width: 100%;
 height: 100%;
 border-radius: 12px;
 background: linear-gradient(
    to left,
    hsl(340deg 100% 16%) 0%,
    hsl(340deg 100% 32%) 8%,
    hsl(340deg 100% 32%) 92%,
    hsl(340deg 100% 16%) 100%
  );
}

.front {
 display: block;
 position: relative;
 padding: 2px 19px;
 border-radius: 12px;
 font-size: 1.1rem;
 color: white;
 background: hsl(345deg 100% 47%);
 will-change: transform;
 transform: translateY(-4px);
 transition: transform
    600ms
    cubic-bezier(.3, .7, .4, 1);
}

button:hover {
 filter: brightness(110%);
}

button:hover .front {
 transform: translateY(-6px);
 transition: transform
    250ms
    cubic-bezier(.3, .7, .4, 1.5);
}

button:active .front {
 transform: translateY(-2px);
 transition: transform 34ms;
}

button:hover .shadow {
 transform: translateY(4px);
 transition: transform
    250ms
    cubic-bezier(.3, .7, .4, 1.5);
}

button:active .shadow {
 transform: translateY(1px);
 transition: transform 34ms;
}

button:focus:not(:focus-visible) {
 outline: none;
}

/* From Uiverse.io by cssbuttons-io */

.shadowv {
 position: absolute;
 top: 0;
 left: 0;
 width: 100%;
 height: 100%;
 border-radius: 12px;
 background: hsl(0deg 0% 0% / 0.25);
 will-change: transform;
 transform: translateY(2px);
 transition: transform
    600ms
    cubic-bezier(.3, .7, .4, 1);
}

.edgev {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 12px;
  background: linear-gradient(
    to left,
    hsl(120deg 100% 16%) 0%,
    hsl(120deg 100% 32%) 8%,
    hsl(120deg 100% 32%) 92%,
    hsl(120deg 100% 16%) 100%
  );
}


.frontv {
 display: block;
 position: relative;
 padding: 2px 19px;
 border-radius: 12px;
 font-size: 1.1rem;
 color: white;
 background: hsl(110, 100%, 47%);
 will-change: transform;
 transform: translateY(-4px);
 transition: transform
    600ms
    cubic-bezier(.3, .7, .4, 1);
}

button:hover .frontv {
  transform: translateY(-6px);
  transition: transform
    250ms
    cubic-bezier(.3, .7, .4, 1.5);
}

button:active .frontv {
 transform: translateY(-2px);
 transition: transform 34ms;
}



button:hover .shadowv {
 transform: translateY(4px);
 transition: transform
    250ms
    cubic-bezier(.3, .7, .4, 1.5);
}

button:active .shadowv {
 transform: translateY(1px);
 transition: transform 34ms;
}

</style>

