<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Link class="block w-full px-4 py-2 text-left text-sm leading-5 text-black-500 dark:text-white-50 hover:bg-white-100 dark:hover:bg-black-600 focus:outline-none focus:bg-white-500 dark:focus:bg-black-600 transition duration-150 ease-in-out">
        <slot />
    </Link>
</template>
