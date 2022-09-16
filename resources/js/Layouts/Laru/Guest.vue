<script setup>
import ApplicationLogo from "@/Components/Laru/Icons/Logo.vue";
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div
        class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0">
        <div>
            <Link :href="route('home')"
                class="flex flex-row items-center w-full sm:w-auto justify-center py-4 sm:py-0">
            <ApplicationLogo class="block h-10 w-auto mr-6" />
            <span class="text-3xl font-semibold text-primary-500">Andal</span>
            </Link>
        </div>

        <div
            class="w-full sm:max-w-xl mt-6 px-8 py-6 shadow-md overflow-hidden">
            <slot />
        </div>
    </div>
</template>
