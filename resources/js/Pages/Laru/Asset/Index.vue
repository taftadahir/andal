<script setup>
import LaruAuthenticatedLayout from '@/Layouts/Laru/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia"
import EyeOutline from '@/Components/Laru/Icons/EyeOutline.vue';
import EditOutline from '@/Components/Laru/Icons/EditOutline.vue';
import TrashOutline from '@/Components/Laru/Icons/TrashOutline.vue';
import LaruDropdown from "@/Components/Laru/Dropdown.vue";
import MoreHorizontalOutline from "@/Components/Laru/Icons/MoreHorizontalOutline.vue";
import LaruLinkButton from '@/Components/Laru/LinkButton.vue';
import LaruInput from '@/Components/Laru/Input.vue'
import { ref, watch } from 'vue';
import debounce from "lodash/debounce"
import AssetComponent from "@/Components/Laru/Dashboard/Asset.vue";

const props = defineProps({
  assets: Object,
})
</script>

<template>

  <Head title="Assets" />

  <LaruAuthenticatedLayout>
    <div
        class="flex flex-col justify-center max-w-7xl mx-auto sm:px-4 lg:px-6 w-full">

      <div class="flex flex-row justify-between mb-8">
        <div class="flex flex-row items-center">
                    <span
                        class="text-black-500 dark:text-white-50 font-semibold text-3xl">Assets</span>
        </div>
      </div>

      <div class="min-h-[32rem]">

        <div
            class="overflow-x-auto overflow-y-auto no-scrollbar relative z-30 pb-4">
          <div class="mb-10 sm:px-4 lg:px-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10 no-scrollbar">
            <AssetComponent v-for="asset in assets.data" :asset="asset"></AssetComponent>
          </div>

          <!-- Infinite Scroll || Pagination -->
          <div class="flex items-center justify-between w-full mt-6"
               v-if="assets.prev_page_url || assets.next_page_url">
            <div class="space-x-4">
              <LaruLinkButton v-if="assets.prev_page_url"
                              :href="assets.prev_page_url" class="py-2">Previous
              </LaruLinkButton>
              <LaruLinkButton v-if="assets.next_page_url"
                              :href="assets.next_page_url" class="py-2">Next
              </LaruLinkButton>
            </div>
            <div
                class="text-xs font-medium px-4 py-4 bg-primary-50 dark:bg-black-600 text-black-500 dark:text-white-50">
                            <span class="mr-2"
                                  v-html="assets.current_page"></span>/<span
                class="mx-2" v-html="assets.last_page"></span>
              [ <span class="mx-2"
                      v-html="assets.to"></span>/<span class="mx-2"
                                                         v-html="assets.total"></span> ]
            </div>
          </div>
        </div>

      </div>
    </div>
  </LaruAuthenticatedLayout>
</template>
