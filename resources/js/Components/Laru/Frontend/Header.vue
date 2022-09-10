<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import ApplicationLogo from "@/Components/Laru/Icons/Logo.vue";
import LinkButton from "@/Components/Laru/LinkButton.vue";
import Dropdown from "@/Components/Laru/Dropdown.vue";
import DropdownLink from "@/Components/Laru/DropdownLink.vue";
import ArrowIosDownwardOutline from "@/Components/Laru/Icons/ArrowIosDownwardOutline.vue";
</script>

<template>
    <nav
        class="w-full bg-transparent dark:bg-transparent sm:bg-primary-50 sm:dark:bg-black-600 sm:h-20 sm:px-4 lg:px-0">
        <header
            class="max-w-5xl w-full h-full mx-auto flex flex-col sm:flex-row sm:justify-between items-center">
            <!-- Logo -->
            <Link :href="route('home')"
                class="bg-primary-50 dark:bg-black-600 flex flex-row items-center w-full sm:w-auto justify-center py-4 sm:py-0">
                <ApplicationLogo class="block h-10 w-auto mr-6" />
                <span class="text-3xl font-semibold text-primary-500">Andal</span>
            </Link>

            <!-- Right nav -->
            <div v-if="$page.props.auth.canLogin && !$page.props.auth.user"
                class="flex flex-row w-full sm:w-auto mt-2 sm:mt-0 sm:space-x-6">
                <LinkButton :href="route('login')" type="secondary"
                    class="flex-grow sm:flex-grow-0 bg-primary-50 dark:bg-black-600">
                    Login</LinkButton>
                <LinkButton v-if="$page.props.auth.canRegister" :href="route('register')"
                    class="flex-grow sm:flex-grow-0">Register</LinkButton>
            </div>

            <div v-if="$page.props.auth.user" class="w-full sm:w-auto">
                <Dropdown align="right" width="48">

                    <template #trigger>
                        <button
                            class="w-full sm:w-auto group inline-flex items-center justify-center p-2 border border-transparent text-sm leading-4 font-medium text-black-500 dark:text-white-500 hover:text-primary-500 hover:dark:text-primary-500 focus:outline-none transition ease-in-out duration-150"
                            type="button">
                            {{ $page.props.auth.user.name }}

                            <ArrowIosDownwardOutline
                                class="fill-current dark:fill-current group-hover:fill-primary-500 dark:group-hover:fill-primary-500 w-4 ml-2 transition ease-in-out duration-150" />
                        </button>
                    </template>

                    <template #content>
                        <!-- TODO: This should show only for admin -->
                        <DropdownLink :href="route('dashboard')" as="button" class="">
                            Dashboard
                        </DropdownLink>

                        <DropdownLink :href="route('logout')" as="button"
                            method="post">
                            Log Out
                        </DropdownLink>
                    </template>
                </Dropdown>
            </div>
        </header>
    </nav>
</template>
