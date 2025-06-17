<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import 'flowbite';
import 'primeicons/primeicons.css'



const logout = () => {
    router.post(route('logout'));
};
const showDropdown = ref(false)


</script>


<template>
    <div>
        <button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar"
            aria-controls="separator-sidebar" type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z" />
            </svg>
        </button>

        <aside id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen shadow-2xl border-spacing-3   transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
                    <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 me-3 sm:h-7" alt="Flowbite Logo" /> -->
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Personeria</span>
                </a>
                <ul class="space-y-2 font-medium">
                    <li v-if="['admin'].includes($page.props.auth.user.role)">
                        <a href="/dashboard"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
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
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

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

                    <li v-if="['admin', 'personero'].includes($page.props.auth.user.role)">

                        <Link :href="route('personeria.index')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="pi pi-user-plus text-lg me-2"></i>
                        <span class="ms-3">Registro Personeria</span>
                        </Link>
                    </li>

                    <li v-if="['admin'].includes($page.props.auth.user.role)">

                        <Link :href="route('personeria.tabla')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">tabla</span>

                        </Link>
                    </li>



                    <li>
                        <div @click.prevent="showDropdown = !showDropdown"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
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

                        <ul v-show="showDropdown" class="py-2 space-y-2">

                            <li v-if="['admin', 'personero'].includes($page.props.auth.user.role)">
                                <a href="/postulacion"
                                    class="flex items-center w-full p-2 text-gray-900 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Postulacion</a>
                            </li>
                            <li>
                                <a href="/votar"
                                    class="flex items-center w-full p-2 text-gray-900 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Votacion</a>

                            </li>
                        </ul>
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
                                    <div class="dropdown">
                                        <input hidden="" class="sr-only" name="state-dropdown" id="state-dropdown"
                                            type="checkbox" />
                                        <label aria-label="dropdown scrollbar" for="state-dropdown"
                                            class="trigger"></label>

                                        <ul class="list webkit-scrollbar" role="list" dir="auto">
                                            <li class="listitem" role="listitem">
                                                <article
                                                    class="article font-semibold text-xs text-gray-500 uppercase tracking-wide">
                                                    Administrar cuenta
                                                </article>
                                            </li>
                                            <li class="listitem" role="listitem">
                                                <article class="article">
                                                    <a :href="route('profile.show')"
                                                        class="flex items-center px-4 py-2 hover:bg-gray-100 rounded transition">
                                                        Perfil
                                                    </a>
                                                </article>


                                            </li>
                                            <li class="listitem" role="listitem"
                                                v-if="$page.props.jetstream.hasApiFeatures">
                                                <article class="article">
                                                    <a href="{{ route('api-tokens.index') }}"
                                                        class="flex items-center px-4 py-2 hover:bg-gray-100 rounded transition">
                                                        Tokens API
                                                    </a>
                                                </article>
                                            </li>
                                            <li class="listitem" role="listitem">
                                                <article class="article">
                                                    <form @submit.prevent="logout">
                                                        <button type="submit"
                                                            class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50 rounded transition">
                                                            Cerrar sesión
                                                        </button>
                                                    </form>
                                                </article>
                                            </li>
                                        </ul>
                                    </div>
                                </template>
                            </Dropdown>
                        </div>
                    </div>
                </ul>
            </div>
        </aside>


        <div class="p-4 sm:ml-64">
            <slot></slot>
        </div>

    </div>


</template>
<style scoped>
/* From Uiverse.io by ilkhoeri */
.dropdown {
    border: 1px solid #c1c2c5;
    border-radius: 12px;
    transition: all 300ms;
    display: flex;
    flex-direction: column;
    min-height: 58px;
    background-color: white;
    overflow: hidden;
    position: relative;
    inset-inline: auto;
    max-width: 298px;
    min-width: 298px;
}

.dropdown input:where(:checked)~.list {
    opacity: 1;
    transform: translateY(-3rem) scale(1);
    transition: all 500ms ease;
    margin-top: 32px;
    padding-top: 4px;
    margin-bottom: -32px;
}

.dropdown input:where(:not(:checked))~.list {
    opacity: 0;
    transform: translateY(3rem);
    margin-top: -100%;
    user-select: none;
    height: 0px;
    max-height: 0px;
    min-height: 0px;
    pointer-events: none;
    transition: all 500ms ease-out;
}

.trigger {
    cursor: pointer;
    list-style: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    font-weight: 600;
    color: inherit;
    width: 100%;
    display: flex;
    align-items: center;
    flex-flow: row;
    gap: 1rem;
    padding: 1rem;
    height: max-content;
    position: relative;
    z-index: 99;
    border-radius: inherit;
    background-color: white;
}

.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
}

.dropdown input:where(:checked)+.trigger {
    margin-bottom: 1rem;
}

.dropdown input:where(:checked)+.trigger:before {
    rotate: 90deg;
    transition-delay: 0ms;
}

.dropdown input:where(:checked)+.trigger::after {
    content: "Close Dropdown";
}

.trigger:before,
.trigger::after {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.trigger:before {
    content: "›";
    rotate: -90deg;
    width: 17px;
    height: 17px;
    color: #262626;
    border-radius: 2px;
    font-size: 26px;
    transition: all 350ms ease;
    transition-delay: 85ms;
}

.trigger::after {
    content: "Open Dropdown";
}

.list {
    height: 100%;
    max-height: 20rem;
    width: calc(100% - calc(var(--w-scrollbar) / 2));
    display: grid;
    grid-auto-flow: row;
    overflow: hidden auto;
    gap: 1rem;
    padding: 0 1rem;
    margin-right: -8px;
    --w-scrollbar: 8px;
}

.listitem {
    height: 100%;
    width: calc(100% + calc(calc(var(--w-scrollbar) / 2) + var(--w-scrollbar)));
    list-style: none;
}

.article {
    padding: 1rem;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 500;
    text-align: justify;
    width: 100%;
    border: 1px solid #c1c2c5;
    display: inline-block;
    background-color: white;
}

.webkit-scrollbar::-webkit-scrollbar {
    width: var(--w-scrollbar);
    height: var(--w-scrollbar);
    border-radius: 9999px;
}

.webkit-scrollbar::-webkit-scrollbar-track {
    background: #0000;
}

.webkit-scrollbar::-webkit-scrollbar-thumb {
    background: #0000;
    border-radius: 9999px;
}

.webkit-scrollbar:hover::-webkit-scrollbar-thumb {
    background: #c1c2c5;
}
</style>


