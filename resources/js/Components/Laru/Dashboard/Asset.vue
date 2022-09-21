<template>
  <div class="group relative w-full aspect-video transition duration-150 ease-in-out overflow-hidden">
    <img :src="'/storage/assets/' + asset.name" :alt="asset.original_name" class="w-full aspect-video group-hover:scale-105 transition duration-150 ease-in-out">
    <div class="flex flex-row h-8 w-full top-full group-hover:top-auto group-hover:bottom-0 z-40 absolute transition-all duration-150 ease-in-out">
      <LaruLinkButton type="error" as="button" method="delete" :href="route('assets.destroy', {'asset': asset.id})" class="w-full">Delete</LaruLinkButton>

      <Link
          :href="route('assets.edit', { 'asset': asset.id })" class="inline-flex items-center justify-center border border-transparent font-semibold text-xs uppercase tracking-widest py-2 transition ease-in-out duration-150 px-6 bg-primary-500 dark:bg-primary-500 hover:bg-primary-700 dark:hover:bg-primary-700 active:bg-primary-700 dark:active:bg-primary-700 focus:outline-none dark:focus:outline-none focus:bg-primary-700 dark:focus:bg-primary-700 text-white-50 w-full">
        Edit
      </Link>
    </div>
  </div>
</template>

<script setup>
import LaruLinkButton from '@/Components/Laru/LinkButton.vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
  asset: {
    type: Object,
    required: true
  }
});
</script>