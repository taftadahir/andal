<script setup>
import LaruAuthenticatedLayout from '@/Layouts/Laru/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import LaruButton from '@/Components/Laru/Button.vue';
import LaruInput from '@/Components/Laru/Input.vue'
import LaruLabel from '@/Components/Laru/Label.vue';
import ValidationError from '@/Components/Laru/ValidationError.vue';

const form = useForm({
  'asset': null,
});

const submit = () => {
  form.post(route('assets.store'));
};
</script>

<template>

  <Head title="Import asset" />

  <LaruAuthenticatedLayout>
    <div
        class="flex flex-col max-w-7xl mx-auto w-full">

      <div class="flex flex-row items-center justify-between mb-8">
                <span
                    class="text-black-500 dark:text-white-50 font-semibold text-3xl">Import asset</span>

        <LaruButton @click="submit">Save
        </LaruButton>
      </div>

      <div class="min-h-[32rem]">
        <form class="space-y-6 mb-6">
          <div class="flex flex-row justify-between items-start">
            <div class="w-full max-w-lg space-y-4">
              <LaruLabel for="asset" value="Asset" />
              <input type="file" @input="form.asset = $event.target.files[0]" />
              <ValidationError input="asset" />
            </div>
          </div>

        </form>
      </div>
    </div>
  </LaruAuthenticatedLayout>
</template>
