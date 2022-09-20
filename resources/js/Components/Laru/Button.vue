<script setup>

const props = defineProps({
  typeTag: {
    type: String,
    default: 'submit',
  },
  type: {
    type: String,
    default: 'primary',
  },
});

const defaultClass = "inline-flex items-center justify-center border border-transparent font-semibold text-xs uppercase tracking-widest py-2 transition ease-in-out duration-150";
var typeClass = "px-6 bg-primary-500 dark:bg-primary-500 hover:bg-primary-700 dark:hover:bg-primary-700 active:bg-primary-700 dark:active:bg-primary-700 focus:outline-none dark:focus:outline-none focus:bg-primary-700 dark:focus:bg-primary-700 text-white-50";

if (props.type == 'secondary') {
  typeClass = "px-2 bg-primary-50 dark:bg-black-600 sm:bg-transparent sm:dark:bg-transparent text-black-500 dark:text-white-50 hover:text-primary-500 dark:hover:text-primary-500 active:text-primary-500 dark:active:text-primary-500 focus:outline-none focus:text-primary-500 dark:focus:text-primary-500";
}

if (props.type == 'error'){
  typeClass = "px-6 bg-error-500 dark:bg-error-500 hover:bg-error-700 dark:hover:bg-error-700 active:bg-error-700 dark:active:bg-error-700 focus:outline-none dark:focus:outline-none focus:bg-error-700 dark:focus:bg-error-700 text-white-50";
}

typeClass = defaultClass + ' ' + typeClass;
</script>

<template>
  <!-- <Link :class="typeClass"><slot /></Link> -->
  <button :class="typeClass" :type="typeTag">
    <slot/>
  </button>
</template>
