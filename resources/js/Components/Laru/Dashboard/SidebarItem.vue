<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
  'href': {
    type: String,
    required: true,
  },
  'active': {
    type: Boolean,
    default: false
  },
  'showTitle': {
    type: Boolean,
    default: false,
  },
  'logout': {
    type: Boolean,
    default: false,
  }
});

const classes = computed(() => props.logout ? 'fill-error-500 text-error-500 hover:fill-error-700 hover:text-error-700' : (props.active
  ? 'text-primary-500 fill-primary-500 hover:text-primary-700 hover:fill-primary-700'
  : 'text-black-500 hover:text-primary-500 dark:text-white-500 hover:dark:text-primary-500 fill-black-500 dark:fill-white-500 hover:fill-primary-500 dark:hover:fill-primary-500')
);
</script>
    
<template>
  <Link :class="classes" :href="href"
    class="inline-flex items-center transition duration-150 ease-in-out">
  <slot />
  <Transition>
    <span v-show="showTitle" class="ml-6 text-sm font-medium leading-normal">
      <slot name="title" />
    </span>
  </Transition>
  </Link>
</template>
    
<style scoped>
v-enter-active,
.v-leave-active {
  transition: opacity 0.15s ease-in-out;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>