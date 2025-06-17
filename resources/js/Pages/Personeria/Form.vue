<template>
    <div class="  flex flex-col items-center justify-center  dark">
        <h1 class="text-2xl font-bold mb-4">Registrar Datos</h1>
        <div class="w-full space-y-4 bg-gray-800 rounded-lg shadow-md p-6 items-center flex flex-col ">
            <form @submit.prevent="submit" class="grid-cols-2 grid gap-4 w-full">

                <div>
                    <label class="block mb-1 text-white">Nombre</label>
                    <input v-model="form.name" type="text" class="w-full border rounded p-2" />
                    <div v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name }}</div>
                </div>

                <div>
                    <label class="block mb-1 text-white">Correo</label>
                    <input v-model="form.email" type="email" class="w-full border rounded p-2" />
                    <div v-if="form.errors.email" class="text-red-500 text-sm">{{ form.errors.email }}</div>
                </div>
                <div>
                    <label class="block mb-1 text-white">Apellido</label>
                    <input v-model="form.apellido" type="text" class="w-full border rounded p-2" />
                    <div v-if="form.errors.apellido" class="text-red-500 text-sm">{{ form.errors.apellido }}</div>
                </div>
                <div>
                    <label class="block mb-1 text-white">Teléfono</label>
                    <input v-model="form.telefono" type="number
                    " class="w-full border rounded p-2" />
                    <div v-if="form.errors.telefono" class="text-red-500 text-sm">{{ form.errors.telefono }}</div>
                </div>
                <div>
                    <label class="block mb-1 text-white">Curso</label>
                    <input v-model="form.curso" type="number" class="w-full border rounded p-2" />
                    <div v-if="form.errors.curso" class="text-red-500 text-sm">{{ form.errors.curso }}</div>
                </div>
                <div>
                    <label class="block mb-1 text-white">Dirección</label>
                    <input v-model="form.direccion" type="text" class="w-full border rounded p-2" />
                    <div v-if="form.errors.direccion" class="text-red-500 text-sm">{{ form.errors.direccion }}</div>
                </div>
                <div>
                    <label class="block mb-1 text-white">Profesión</label>
                    <input v-model="form.profesion" type="text" class="w-full border rounded p-2" />
                    <div v-if="form.errors.profesion" class="text-red-500 text-sm">{{ form.errors.profesion }}</div>
                </div>

                <div>
                    <label class="block mb-1 text-white">Sexo</label>
                    <select v-model="form.sexo" class="w-full border rounded p-2">
                        <option value="">Seleccione una opción</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                    <div v-if="form.errors.sexo" class="text-red-500 text-sm">{{ form.errors.sexo }}</div>
                </div>
                <div class="col-span-2 flex justify-center">
                    <button type="submit" class="bg-blue-500  text-white px-4 py-2 rounded hover:bg-blue-600 ">
                Guardar
            </button>
                </div>

            </form>

        </div>

    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    apellido: '',
    curso: null,
    profesion: '',
    sexo: '',
    telefono: null,
})

function submit() {
    form.post(route('personeria.store'), {
        onSuccess: () => {
            form.reset()
            form.clearErrors()
        },
        onError: (errors) => {
            console.error(errors)
            form.errors = errors
        }
    })
}
</script>
