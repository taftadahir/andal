<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block font-medium text-base text-black-300 dark:text-white-500">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
