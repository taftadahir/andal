<script setup>
import { onMounted, ref } from "vue";
import Close from "@/Components/Laru/Icons/Close.vue";

const props = defineProps({
    type: {
        type: String,
        default: 'success',
        required: true
    },
    body: {
        type: String,
        required: true
    }
});

let show = ref(true);

onMounted(() => {
    setTimeout(() => {
        show.value = false;
    }, 5000);
})
</script>
    
<template>
    <Transition name="slide-fade">
        <div class="h-fit pl-2 mx-6" v-if="show"
            :class="{'bg-success-100' : type === 'success'}">
            <div class="p-2 flex flex-row items-center space-x-20">
                <div class="flex flex-col items-start"
                    :class="{'text-success-800' : type === 'success'}">
                    <span class="text-base font-medium">Message</span>
                    <span class="text-sm">{{ body }}</span>
                </div>
                <button @click="show = false">
                    <Close class="fill-error-500 dark:fill-error-500" />
                </button>
            </div>
        </div>
    </Transition>
</template>

<style scoped>
    .slide-fade-enter-active,
    .slide-fade-leave-active {
      transition: all 0.4s;
    }
    .slide-fade-enter,
    .slide-fade-leave-to {
      transform: translateX(400px);
      opacity: 0;
    }
    </style>