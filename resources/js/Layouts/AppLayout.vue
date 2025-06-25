<script setup>
import { ref, computed } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import 'flowbite';
import 'primeicons/primeicons.css'

const logout = () => {
    router.post(route('logout'));
};
const showDropdown = ref(false)
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
        <button @click="toggleSidebar"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 transition-colors z-50 absolute top-4 right-4"
            aria-label="Abrir/Cerrar sidebar">
            <svg v-if="sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <aside id="logo-sidebar" :class="sidebarOpen ? 'sidebar-open' : 'sidebar-closed'"
            class="fixed top-0 left-0 z-40 w-64 h-screen shadow-2xl border-spacing-3 transition-transform duration-300"
            aria-label="Sidebar">
            <button @click="toggleSidebar"
                class="absolute top-4 right-4 sm:hidden text-gray-500 hover:text-red-500 transition-colors z-50"
                aria-label="Cerrar sidebar">
                <svg v-if="sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <Link :href="route('inicio')" class="flex items-center ps-2.5 mb-5">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Gestion
                    Personeria</span>
                </Link>
                <ul class="space-y-2 font-medium">
                    <li v-if="['admin'].includes($page.props.auth.user.role)">
                        <a href="/dashboard"
                            :class="['flex items-center p-2 rounded-lg group transition-all duration-200',
                                isActive('/dashboard') ? 'active-tab' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700']">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 18">
                                <path
                                    d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <Link :href="route('inicio')"
                            :class="['flex items-center p-2 rounded-lg group transition-all duration-200',
                                isActive('/inicio') ? 'active-tab' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700']">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 2a8 8 0 1 0 8 8A8.009 8.009 0 0 0 10 2Zm0 14a6 6 0 1 1 6-6 6.007 6.007 0 0 1-6 6Z" />
                            <path
                                d="M10.707 7.293a1.003 1.003 0 0 0-1.414-1.414l-4.5 4.5a1.003 1.003 0 0 0-.293.707v3a1.003 1.003 0 0 0 .293.707l4.5 4.5a1.003 1.003 0 1 0 1.414-1.414L7.414 15H11a3.002 3.002 0 0 0 .293-5.993L10.707 7.293Z" />
                        </svg>
                        <span class="ms-3">inicio</span>
                        </Link>
                    </li>
                    <li v-if="['admin'].includes($page.props.auth.user.role)">
                        <Link :href="route('usuarios.index')"
                            :class="['flex items-center p-2 rounded-lg group transition-all duration-200',
                                isActive('/usuarios') ? 'active-tab' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700']">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 2a8 8 0 1 0 8 8A8.009 8.009 0 0 0 10 2Zm0 14a6 6 0 1 1 6-6 6.007 6.007 0 0 1-6 6Z" />
                            <path
                                d="M10.707 7.293a1.003 1.003 0 0 0-1.414-1.414l-4.5 4.5a1.003 1.003 0 0 0-.293.707v3a1.003 1.003 0 0 0 .293.707l4.5 4.5a1.003 1.003 0 1 0 1.414-1.414L7.414 15H11a3.002 3.002 0 0 0 .293-5.993L10.707 7.293Z" />
                        </svg>
                        <span class="ms-3">Tabla User</span>
                        </Link>
                    </li>
                    <li>
                        <div @click.prevent="showDropdown = !showDropdown"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group cursor-pointer transition-all duration-200">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Personeros</span>
                            <svg class="w-3 h-3 ms-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </div>
                        <transition name="fade">
                            <ul v-show="showDropdown" class="py-2 space-y-2">
                                <li v-if="['admin', 'personero'].includes($page.props.auth.user.role)">
                                    <a href="/postulacion"
                                        :class="['flex items-center w-full p-2 rounded-lg pl-11 group transition-all duration-200',
                                            isActive('/postulacion') ? 'active-tab' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700']">
                                        Postulacion
                                    </a>
                                </li>
                                <li>
                                    <a href="/votar"
                                        :class="['flex items-center w-full p-2 rounded-lg pl-11 group transition-all duration-200',
                                            isActive('/votar') ? 'active-tab' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700']">
                                        Votacion
                                    </a>
                                </li>
                            </ul>
                        </transition>
                    </li>
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <div class="ms-3 relative">
                            <Dropdown v-if="$page.props.jetstream.hasTeamFeatures" align="right" width="60">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ $page.props.auth.user.current_team.name }}

                                            <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <div class="w-60">
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Team
                                        </div>

                                        <DropdownLink :href="route('teams.show', $page.props.auth.user.current_team)">
                                            Team Settings
                                        </DropdownLink>

                                        <DropdownLink v-if="$page.props.jetstream.canCreateTeams"
                                            :href="route('teams.create')">
                                            Create New Team
                                        </DropdownLink>

                                        <template v-if="$page.props.auth.user.all_teams.length > 1">
                                            <div class="border-t border-gray-200" />

                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                Switch Teams
                                            </div>

                                            <template v-for="team in $page.props.auth.user.all_teams" :key="team.id">
                                                <form @submit.prevent="switchToTeam(team)">
                                                    <DropdownLink as="button">
                                                        <div class="flex items-center">
                                                            <svg v-if="team.id == $page.props.auth.user.current_team_id"
                                                                class="me-2 size-5 text-green-400"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>

                                                            <div>{{ team.name }}</div>
                                                        </div>
                                                    </DropdownLink>
                                                </form>
                                            </template>
                                        </template>
                                    </div>
                                </template>
                            </Dropdown>
                        </div>

                        <div class="ms-3 relative">
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
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Manage Account
                                    </div>

                                    <DropdownLink :href="route('profile.show')">
                                        Profile
                                    </DropdownLink>

                                    <DropdownLink v-if="$page.props.jetstream.hasApiFeatures"
                                        :href="route('api-tokens.index')">
                                        API Tokens
                                    </DropdownLink>

                                    <div class="border-t border-gray-200" />

                                    <form @submit.prevent="logout">
                                        <DropdownLink as="button" class="w-full text-left">
                                            Log Out
                                        </DropdownLink>
                                    </form>
                                </template>
                            </Dropdown>
                        </div>
                    </div>
                </ul>
            </div>
        </aside>

        <div :class="sidebarOpen ? 'main-content-open' : 'main-content-closed'">
            <slot></slot>
        </div>
    </div>
</template>


<style scoped>
.sidebar-open {
    transform: translateX(0);
    transition: transform 0.3s cubic-bezier(.4, 2, .6, 1);
}

.sidebar-closed {
    transform: translateX(-100%);
    transition: transform 0.3s cubic-bezier(.4, 2, .6, 1);
}

.main-content-open {
    margin-left: 16rem;
    transition: margin-left 0.3s cubic-bezier(.4, 2, .6, 1), width 0.3s cubic-bezier(.4, 2, .6, 1);
}

.main-content-closed {
    margin-left: 0;
    transition: margin-left 0.3s cubic-bezier(.4, 2, .6, 1), width 0.3s cubic-bezier(.4, 2, .6, 1);
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
