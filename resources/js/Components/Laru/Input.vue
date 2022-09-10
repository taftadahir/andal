<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>

<template>
    <input class="text-base p-4 bg-primary-50 dark:bg-black-600 border border-transparent focus:border-primary-500 ring-0 focus:ring-transparent placeholder-black-300 dark:placeholder-white-600 text-black-500 dark:text-primary-50 transition ease-in-out duration-150" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>
