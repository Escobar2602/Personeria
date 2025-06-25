<template>
  <AppLayout title="Administración de Usuarios">
    <div class="min-h-screen bg-gradient-to-br from-emerald-100 to-emerald-200 py-16 px-4">
      <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">👥 Gestión de Usuarios</h1>

      <div class="max-w-7xl mx-auto bg-white p-6 rounded-2xl shadow-lg border border-gray-200">
        <div class="mb-4 flex justify-between items-center">
          <InputText v-model="filters['global'].value" placeholder="🔍 Buscar..." class="w-full max-w-sm p-inputtext-sm" />
        </div>

        <DataTable
          :value="usuarios"
          paginator
          :rows="5"
          showGridlines
          :filters="filters"
          tableStyle="min-width: 60rem"
          class="text-sm"
        >
          <Column field="id" header="ID" sortable></Column>
          <Column field="name" header="Nombre" sortable></Column>
          <Column field="email" header="Correo" sortable></Column>

          <Column header="Rol">
            <template #body="slotProps">
              <Select
                v-model="slotProps.data.role"
                :options="rolesDisponibles"
                optionLabel="name"
                optionValue="id"
                placeholder="Seleccionar"
                class="w-full md:w-48"
                @change="asignarRol(slotProps.data)"
              />
            </template>
          </Column>

          <Column header="Acciones">
            <template #body="slotProps">
              <div class="flex gap-2 justify-center">
                <button @click="editarUsuario(slotProps.data)" class="btn-primary">Editar</button>
                <button @click="eliminarUsuario(slotProps.data)" class="btn-danger">Eliminar</button>
              </div>
            </template>
          </Column>
        </DataTable>
      </div>
    </div>
  </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import Select from 'primevue/select'
import { InputText } from 'primevue'
import { FilterMatchMode } from '@primevue/core/api'
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  usuarios: Array
})

const filters = ref({
  global: { value: null, matchMode: FilterMatchMode.CONTAINS }
})

const rolesDisponibles = ref([
  { id: 'admin', name: 'Administrador' },
  { id: 'estudiante', name: 'Estudiante' },
  { id: 'personero', name: 'Personero' }
])

const asignarRol = async (user) => {
  router.post(route('asignarRol', user.id), { role: user.role })
}

const editarUsuario = (user) => {
  console.log('Editar:', user)
}

const eliminarUsuario = (user) => {
  if (confirm(`¿Seguro que deseas eliminar a ${user.name}?`)) {
    router.delete(route('usuarios.destroy', user.id))
  }
}
</script>

<style scoped>
.btn-primary {
  @apply bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition;
}

.btn-danger {
  @apply bg-red-500 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition;
}
</style>
