<script setup>
import { ref, computed } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import 'flowbite';
import 'primeicons/primeicons.css';

const logout = () => {
    router.post(route('logout'));
};
const showDropdown = ref(false);
const sidebarOpen = ref(true);

function toggleSidebar() {
    sidebarOpen.value = !sidebarOpen.value;
}

const page = usePage();
const currentUrl = computed(() => page.url);
const isActive = (routeNameOrPath) => {
    return currentUrl.value === routeNameOrPath || currentUrl.value.startsWith(routeNameOrPath);
};
</script>

<template>
    <div>
        <nav id="navbar"
            class="fixed top-0 left-0 w-full z-40 shadow-md bg-gray-50 dark:bg-gray-800 transition-all duration-300 py-2 px-4">
            <div class="w-full flex flex-wrap items-center justify-between gap-4">
                <Link :href="route('inicio')" class="flex items-center">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Gestion Personeria</span>
                </Link>

                <ul class="flex flex-wrap items-center gap-4 font-medium">
                    <li v-if="['admin'].includes($page.props.auth.user.role)">
                        <a href="/dashboard"
                           :class="['flex items-center p-2 rounded-lg group transition-all duration-200',
                           isActive('/dashboard') ? 'active-tab' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700']">
                            <span class="ms-2">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <Link :href="route('inicio')"
                              :class="['flex items-center p-2 rounded-lg group transition-all duration-200',
                              isActive('/inicio') ? 'active-tab' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700']">
                            <span class="ms-2">Inicio</span>
                        </Link>
                    </li>

                    <li v-if="['admin'].includes($page.props.auth.user.role)">
                        <Link :href="route('usuarios.index')"
                              :class="['flex items-center p-2 rounded-lg group transition-all duration-200',
                              isActive('/usuarios') ? 'active-tab' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700']">
                            <span class="ms-2">Tabla User</span>
                        </Link>
                    </li>

                    <li class="relative">
                        <div @click.prevent="showDropdown = !showDropdown"
                             class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group cursor-pointer transition-all duration-200">
                            <span class="flex-1 whitespace-nowrap">Personeros</span>
                            <svg class="w-3 h-3 ms-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <transition name="fade">
                            <ul v-show="showDropdown" class="absolute mt-2 bg-white dark:bg-gray-800 rounded shadow-lg z-50 py-2 space-y-1">
                                <li v-if="['admin', 'personero'].includes($page.props.auth.user.role)">
                                    <a href="/postulacion"
                                       :class="['block px-4 py-2 transition-all duration-200',
                                       isActive('/postulacion') ? 'active-tab' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700']">
                                        Postulación
                                    </a>
                                </li>
                                <li>
                                    <a href="/votar"
                                       :class="['block px-4 py-2 transition-all duration-200',
                                       isActive('/votar') ? 'active-tab' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700']">
                                        Votación
                                    </a>
                                </li>
                            </ul>
                        </transition>
                    </li>

                    <!-- Profile -->
                    <li class="relative">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <button v-if="$page.props.jetstream.managesProfilePhotos"
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="size-8 rounded-full object-cover"
                                         :src="$page.props.auth.user.profile_photo_url"
                                         :alt="$page.props.auth.user.name">
                                </button>

                                <span v-else class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ $page.props.auth.user.name }}
                                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <div class="block px-4 py-2 text-xs text-gray-400">Manage Account</div>

                                <DropdownLink :href="route('profile.show')">Profile</DropdownLink>

                                <DropdownLink v-if="$page.props.jetstream.hasApiFeatures"
                                              :href="route('api-tokens.index')">API Tokens</DropdownLink>

                                <div class="border-t border-gray-200" />

                                <form @submit.prevent="logout">
                                    <DropdownLink as="button" class="w-full text-left">Log Out</DropdownLink>
                                </form>
                            </template>
                        </Dropdown>
                    </li>
                </ul>
            </div>
        </nav>

        <div :class="sidebarOpen ? 'main-content-open' : 'main-content-closed'">
            <slot></slot>
        </div>

        <footer class="footer-app">
            <div
                class="text-center py-3 text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
                © {{ new Date().getFullYear() }} Personería. Todos los derechos reservados.
            </div>
        </footer>
    </div>
</template>

<style scoped>
.footer-app {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100vw;
    z-index: 30;
}

.main-content-open,
.main-content-closed {
    margin-top: 5rem;
    padding: 1rem;
    transition: margin 0.3s ease;
}

.active-tab {
    background: linear-gradient(90deg, #fff 80%, #e0f7fa 100%);
    color: #1e293b !important;
    box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.08);
    font-weight: bold;
    border-left: 5px solid #10b981;
    transition: background 0.3s, color 0.3s, box-shadow 0.3s;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
