<script setup>
import LaruAuthenticatedLayout from '@/Layouts/Laru/Authenticated.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';
import {Inertia} from "@inertiajs/inertia"
import EditOutline from '@/Components/Laru/Icons/EditOutline.vue';
import TrashOutline from '@/Components/Laru/Icons/TrashOutline.vue';
import LaruDropdown from "@/Components/Laru/Dropdown.vue";
import MoreHorizontalOutline from "@/Components/Laru/Icons/MoreHorizontalOutline.vue";
import LaruLinkButton from '@/Components/Laru/LinkButton.vue';
import LaruInput from '@/Components/Laru/Input.vue'
import {ref, watch} from 'vue';
import debounce from "lodash/debounce"

const props = defineProps({
  users: Object,
  filters: Object
})

let search = ref(props.filters.search)

watch(search, debounce(function (value) {
  Inertia.get('/users', {search: value}, {
    preserveState: true,
    replace: true,
  })
}, 300))
</script>

<template>

  <Head title="Users"/>

  <LaruAuthenticatedLayout>
    <div
        class="flex flex-col justify-center max-w-7xl mx-auto sm:px-4 lg:px-6 w-full">

      <div class="flex flex-row justify-between mb-8">
        <div class="flex flex-row items-center">
                    <span
                        class="text-black-500 dark:text-white-50 font-semibold text-3xl">Users</span>

          <!-- Search -->
          <div class="ml-4">
            <LaruInput v-model="search" class="block w-full max-w-xl py-2"
                       placeholder="Search" type="text"/>
          </div>
        </div>
      </div>

      <div class="min-h-[32rem]">

        <div
            class="overflow-x-auto overflow-y-auto no-scrollbar relative z-30 pb-4">
          <table
              class="w-full text-sm text-left text-black-500 dark:text-white-50">
            <thead
                class="text-xs uppercase text-black-500 dark:text-white-50 bg-primary-50 dark:bg-black-600">
            <tr>
              <th class="py-2 px-6" scope="col">
                Name
              </th>
              <th class="px-6" scope="col">
                Email
              </th>
              <th class="px-6" scope="col">
                Role
              </th>
              <th class="px-6" scope="col">
                Created At
              </th>
              <th class="px-6" scope="col">
                Updated At
              </th>
              <th class="px-6" scope="col">
              </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user, index) in users.data"
                :key="user.id"
                :class="{'bg-primary-50 dark:bg-black-600' : index%2 != 0 }">
              <th class="py-4 px-6 font-medium whitespace-wrap max-w-xs"
                  scope="row"
                  v-html="user.name"></th>
              <td class="px-6" v-html="user.email"></td>
              <td class="px-6">
                <span class="font-medium px-2 py-1"
                    :class="{ 'bg-secondary-500 text-white-50': user.role == 'Subscriber', 'bg-success-500 text-white-50': user.role == 'Admin'  }" v-html="user.role"></span>
              </td>
              <td class="px-6"> {{
                  user.created_at ??
                  '---'
                }}
              </td>
              <td class="px-6"> {{
                  user.updated_at ??
                  '---'
                }}
              </td>
              <td
                  class="flex flex-row justify-end py-4 px-6 h-full whitespace-nowrap">
                <LaruDropdown align="right" width="48">
                  <template #trigger>
                    <button
                        class="w-full sm:w-auto group inline-flex items-center justify-center p-2 border border-transparent text-sm leading-4 font-medium text-black-500 dark:text-white-500 hover:text-primary-500 hover:dark:text-primary-500 focus:outline-none transition ease-in-out duration-150"
                        type="button">
                      <!-- More -->
                      <MoreHorizontalOutline
                          class="fill-black-300 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out"/>
                    </button>
                  </template>

                  <template #content>
                    <div
                        class="flex flex-row items-center justify-center space-x-4 px-4 py-2">
                      <Link
                          :href="route('users.edit', { 'user': user.id })">
                        <EditOutline
                            class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out"/>
                      </Link>
                      <Link
                          :href="route('users.destroy', { 'user': user.id })"
                          as="button" method="delete">
                        <TrashOutline
                            class="fill-black-500 dark:fill-white-500 hover:fill-error-500 hover:dark:fill-error-500 transition duration-150 ease-in-out"/>
                      </Link>
                    </div>
                  </template>
                </LaruDropdown>
              </td>
            </tr>
            </tbody>
          </table>

          <!-- Infinite Scroll || Pagination -->
          <div v-if="users.prev_page_url || users.next_page_url"
               class="flex items-center justify-between w-full mt-6">
            <div class="space-x-4">
              <LaruLinkButton v-if="users.prev_page_url"
                              :href="users.prev_page_url" class="py-2">Previous
              </LaruLinkButton>
              <LaruLinkButton v-if="users.next_page_url"
                              :href="users.next_page_url" class="py-2">Next
              </LaruLinkButton>
            </div>
            <div
                class="text-xs font-medium px-4 py-4 bg-primary-50 dark:bg-black-600 text-black-500 dark:text-white-50">
                            <span class="mr-2"
                                  v-html="users.current_page"></span>/<span
                class="mx-2" v-html="users.last_page"></span>
              [ <span class="mx-2"
                      v-html="users.to"></span>/<span class="mx-2"
                                                      v-html="users.total"></span> ]
            </div>
          </div>
        </div>

      </div>
    </div>
  </LaruAuthenticatedLayout>
</template>