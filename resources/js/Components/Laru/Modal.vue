<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';

const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') {
        open.value = false;
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

const open = ref(false);
</script>

<template>
    <div class="relative">
        <div @click="open = ! open">
            <slot name="trigger" />
        </div>

        <!-- Full Screen Dropdown Overlay -->
        <div v-show="open" class="fixed flex items-center justify-center inset-0 z-50 bg-opacity-25" @click="open = false">
         <div class="shadow-md p-6 min-w-[32rem] max-w-[40rem] min-h-[8rem] bg-white-50 dark:bg-black-500">
           <slot name="content" />
         </div>
        </div>
    </div>
</template>
