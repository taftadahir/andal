<script setup>
import { Link } from "@inertiajs/inertia-vue3";
    
const props = defineProps({
    href: {
        type: String,
        required: true, 
    }
});
</script>

<template>
    <Link :href="href" class="text-base text-primary-500 hover:text-primary-700 active:text-primary-700 tracking-wide transition ease-in-out duration-150"><slot /></Link>
</template>
