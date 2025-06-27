<template>
    <AppLayout>
        <div class="min-h-screen bg-gray-50/50">

            <div class="p-4 ">
                <nav
                    class="block w-full max-w-full bg-transparent text-white shadow-none rounded-xl transition-all px-0 py-1">
                    <div class="flex flex-col-reverse justify-between gap-6 md:flex-row md:items-center">
                        <div class="capitalize">

                            <h6
                                class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-gray-900">
                                home</h6>
                        </div>

                    </div>
                </nav>
                <div class="mt-12">
                    <div class="mb-12 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-3">

                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div
                                class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-pink-600 to-pink-400 text-white shadow-pink-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-6 h-6 text-white">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="p-4 text-right">
                                <p
                                    class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                    POSTULACIONES</p>
                                <h4
                                    class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                    {{ postulacionesCount }}
                                </h4>
                            </div>

                        </div>
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div
                                class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-6 h-6 text-white">
                                    <path
                                        d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                    </path>
                                </svg>
                            </div>
                            <div class="p-4 text-right">
                                <p
                                    class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                    USUARIOS ENTRANTES</p>
                                <h4
                                    class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                    {{ usuariosCount }}
                                </h4>
                            </div>

                        </div>
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div
                                class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-orange-600 to-orange-400 text-white shadow-orange-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-6 h-6 text-white">
                                    <path
                                        d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                                    </path>
                                </svg>
                            </div>
                            <div class="p-4 text-right">
                                <p
                                    class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                                    CANTIDAD DE VOTOS</p>
                                <h4
                                    class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                                    {{ totalvotos }}
                                </h4>
                            </div>

                        </div>
                    </div>

                    <div class="mb-4 grid grid-cols-1 gap-6 xl:grid-cols-2 ">
                        <div
                            class="relative flex flex-col bg-clip-border  rounded-xl bg-white text-gray-700 shadow-md overflow-hidden xl:col-span-2">
                            <div
                                class="relative bg-clip-border rounded-xl overflow-hidden bg-transparent text-gray-700 shadow-none m-0 flex items-center justify-between p-6">
                                <div>
                                    <h6
                                        class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-blue-gray-900 mb-1">
                                        postulaciones</h6>

                                </div>
                                <button aria-expanded="false" aria-haspopup="menu" id=":r5:"
                                    class="relative middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30"
                                    type="button">
                                    <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currenColor" viewBox="0 0 24 24"
                                            stroke-width="3" stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z">
                                            </path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <div class="p-6 overflow-x-scroll px-0 pt-0 pb-2">
                                <table class="w-full min-w-[640px] table-auto">
                                    <thead>
                                        <tr>
                                            <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                                <p
                                                    class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                                    Personas</p>
                                            </th>
                                            <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                                <p
                                                    class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                                    grado</p>
                                            </th>
                                            <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                                <p
                                                    class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                                    votos</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="postulacion in postulaciones">
                                                <td  class="py-3 px-5 border-b border-blue-gray-50">
                                                <div  class="flex items-center gap-4">
                                                    {{ postulacion.nombre }}
                                                </div>
                                            </td>
                                            <td  class="py-3 px-5 border-b border-blue-gray-50">
                                                <div  class="flex items-center gap-4">
                                                    {{ postulacion.grado }}
                                                </div>
                                            </td>
                                            <td  class="py-3 px-5 border-b border-blue-gray-50">
                                                <div  class="flex items-center gap-4">
                                                    {{ postulacion.votacion.length}}
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
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

const props = defineProps({
    usuariosCount: {
        type: Number,
        default: () => 0
    },
    postulacionesCount: {
        type: Number,
        default: () => 0
    },

    totalvotos: {
        type: Number,
        default: () => 0
    },

    postulaciones: {
        type: Array,
        default: () => 0
    }

});
</script>
<style scoped></style>
