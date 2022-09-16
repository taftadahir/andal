<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        default: null,
    },
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit("update:checked", val);
    },
});
</script>

<template>
    <input type="checkbox" :value="value" v-model="proxyChecked"
           class="border-primary-500 text-primary-700 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 bg-primary-50 dark:bg-black-600 focus:ring-opacity-50">
</template>
