<script setup>
import LaruAuthenticatedLayout from '@/Layouts/Laru/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import LaruLinkButton from '@/Components/Laru/LinkButton.vue';
import LaruButton from '@/Components/Laru/Button.vue';
import LaruInput from '@/Components/Laru/Input.vue'
import LaruLabel from '@/Components/Laru/Label.vue';
import LaruSelect from '@/Components/Laru/Select.vue';
import LaruValidationError from '@/Components/Laru/ValidationError.vue';
import Modal from "@/Components/Laru/Modal.vue";

const props = defineProps({
  user: Object,
  roles: Object,
});


const form = useForm({
  'name': props.user.name,
  'email': props.user.email,
  'role': props.user.role,
});

const submit = () => {
  form.put(route('users.update', { 'user': props.user.id }));
};
</script>

<template>

  <Head title="Edit Article" />

  <LaruAuthenticatedLayout>
    <div class="flex flex-col max-w-7xl mx-auto w-full">

      <div class="flex flex-row items-center justify-between mb-8">
        <span class="text-black-500 dark:text-white-50 font-semibold text-3xl">Edit User</span>

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
                <div class="whitespace-normal leading-normal"><p>Delete User [ ID: <span class="text-secondary-500">{{ user.id }}</span>, Name:  <span class="text-secondary-500">{{ user.name }}</span> ]</p></div>
                <div class="flex flex-row justify-end">
                  <LaruLinkButton type="error" as="button" method="delete" :href="route('users.destroy', {'user': user.id})">Delete</LaruLinkButton>
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
              <LaruLabel for="name" value="Name" />
              <LaruInput id="name" v-model="form.name"
                         autocomplete="title" autofocus
                         class="block w-full p-4"
                         placeholder="Fill the name" required
                         type="text" />
              <LaruValidationError input="name" />
            </div>

            <div class="w-full max-w-lg space-y-2">
              <LaruLabel for="email" value="Email" />
              <LaruInput id="email" v-model="form.email"
                         class="block w-full p-4"
                         placeholder="Fill the email" required
                         type="text" />
              <LaruValidationError input="email" />
            </div>
          </div>

          <div
              class="flex flex-row justify-between items-start space-x-6">

            <div class="w-full max-w-lg space-y-2">
              <LaruLabel for="role" value="Role" />
              <LaruSelect id="role" v-model="form.role">
                <option v-for="(value, key) in roles"
                        :key="key" :value="key" v-text="value" />
              </LaruSelect>
              <LaruValidationError input="role" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </LaruAuthenticatedLayout>

</template>
