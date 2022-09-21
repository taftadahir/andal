<script setup>
import LaruAuthenticatedLayout from '@/Layouts/Laru/Authenticated.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';
import LaruLinkButton from '@/Components/Laru/LinkButton.vue';
import LaruButton from '@/Components/Laru/Button.vue';
import LaruInput from '@/Components/Laru/Input.vue'
import LaruLabel from '@/Components/Laru/Label.vue';
import LaruValidationError from '@/Components/Laru/ValidationError.vue';
import Modal from "@/Components/Laru/Modal.vue";

const props = defineProps({
  asset: Object,
});

const form = useForm({
  'name': props.asset.name,
  'original_name': props.asset.original_name,
  'extension': props.asset.extension,
});

const submit = () => {
  form.put(route('assets.update', { 'asset': props.asset.id }));
};
</script>

<template>

  <Head title="Edit Asset" />

  <LaruAuthenticatedLayout>
    <div class="flex flex-col max-w-7xl mx-auto w-full">

      <div class="flex flex-row items-center justify-between mb-8">
        <span class="text-black-500 dark:text-white-50 font-semibold text-3xl">Edit Asset</span>

        <div class="flex flex-row items-center space-x-4">
          <Modal>
            <template #trigger>
              <LaruButton type="error" as="button">Delete</LaruButton>
            </template>
            <template #content>
              <div class="flex flex-col space-y-4 text-primary-50">
                <div>
                  <h3 class="text-3xl font-medium">Confirmation</h3>
                </div>
                <div class="whitespace-normal leading-normal"><p>Delete Article [ ID: <span class="text-secondary-500">{{ asset.id }}</span>, Name:  <span class="text-secondary-500">{{ asset.name }}</span> ]</p></div>
                <div class="flex flex-row justify-end">
                  <LaruLinkButton type="error" as="button" method="delete" :href="route('assets.destroy', {'asset': asset.id})">Delete</LaruLinkButton>
                </div>
              </div>
            </template>
          </Modal>

          <LaruButton @click="submit">Save</LaruButton>
        </div>
      </div>

      <div class="min-h-[32rem]">
        <form class="space-y-6 mb-6">
          <div class="flex flex-row justify-between items-start space-x-6">

            <div class="w-full max-w-lg space-y-2">
              <LaruLabel for="original_name" value="Original name" />
              <LaruInput id="original_name" v-model="form.original_name"
                         class="block w-full p-4"
                         placeholder="Fill the original name" required
                         type="text" autofocus />
              <LaruValidationError input="original_name" />
            </div>

            <div class="w-full max-w-lg space-y-2">
              <LaruLabel for="name" value="Name" />
              <LaruInput id="name" v-model="form.name"
                         autocomplete="title"
                         class="block w-full p-4"
                         placeholder="Fill the name" required
                         type="text" />
              <LaruValidationError input="name" />
            </div>

          </div>

          <div
              class="flex flex-row justify-between items-start space-x-6">
            <div class="w-full max-w-lg space-y-2">
              <LaruLabel for="extension" value="Extension" />
              <LaruInput id="extension" v-model="form.extension"
                         autocomplete="extension"
                         class="block w-full p-4"
                         placeholder="Fill the extension"
                         type="text" />
              <LaruValidationError input="extension" />
            </div>

            <div class="w-full max-w-lg space-y-2">
              <LaruLabel for="file" value="Preview" />
              <img :src="'/storage/assets/' + form.name"
                   alt="Asset Image"
                   class="w-full aspect-video" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </LaruAuthenticatedLayout>

</template>
