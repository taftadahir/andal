<script setup>
import { Link } from "@inertiajs/inertia-vue3";
    
const props = defineProps({
    type: {
        type: String,
        default: 'primary', 
    },
    href: {
        type: String,
        required: true, 
    }
});

const defaultClass = "inline-flex items-center justify-center border border-transparent font-semibold text-xs uppercase tracking-widest py-2 transition ease-in-out duration-150";
var typeClass = "px-6 bg-primary-500 dark:bg-primary-500 hover:bg-primary-700 dark:hover:bg-primary-700 active:bg-primary-700 dark:active:bg-primary-700 focus:outline-none dark:focus:outline-none focus:bg-primary-700 dark:focus:bg-primary-700 text-white-50";

if (props.type == 'secondary') {
    typeClass = "px-2 bg-primary-50 dark:bg-black-600 sm:bg-transparent sm:dark:bg-transparent text-black-500 dark:text-white-50 hover:text-primary-500 dark:hover:text-primary-500 active:text-primary-500 dark:active:text-primary-500 focus:outline-none focus:text-primary-500 dark:focus:text-primary-500";
}

if (props.type == 'error') {
    typeClass = "px-6 bg-error-500 dark:bg-error-500 hover:bg-error-700 hover:dark:bg-error-700 text-white-50 dark:text-white-50 focus:outline-none";
}

typeClass = defaultClass + ' ' + typeClass;
</script>

<template>
    <Link :href="href" :class="typeClass"><slot /></Link>
</template>
