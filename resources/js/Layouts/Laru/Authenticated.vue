<script setup>
import {ref} from 'vue';
import {Link} from "@inertiajs/inertia-vue3";
import ApplicationLogo from "@/Components/Laru/Icons/Logo.vue";
import SidebarItem from '@/Components/Laru/Dashboard/SidebarItem.vue';
import Logout from '@/Components/Laru/Icons/Logout.vue';
import DashboardIcon from '@/Components/Laru/Icons/Dashboard.vue';
import People from '@/Components/Laru/Icons/People.vue';
import ArticleIcon from '@/Components/Laru/Icons/Article.vue';
import SettingIcon from '@/Components/Laru/Icons/Setting.vue';
import Layout from '@/Components/Laru/Icons/Layout.vue';
import BulbOutline from '@/Components/Laru/Icons/BulbOutline.vue';
import useSwitchTheme from "@/Composables/switchTheme";
import Person from "@/Components/Laru/Icons/Person.vue";
import CloudUploadOutline from "@/Components/Laru/Icons/CloudUploadOutline.vue";
import FlashMessage from '@/Components/Laru/Dashboard/FlashMessage.vue';
import ImageOutline from "@/Components/Laru/Icons/ImageOutline.vue";

const showingSidebarTitle = ref(false);
const {switchTheme} = useSwitchTheme();

const toggleTheme = () => switchTheme();
</script>

<template>
  <!-- Small screen -->
  <div class="sm:hidden flex items-center justify-center h-screen">
    <div class="flex flex-col items-center justify-center mx-8">
      <Link :href="route('home')" class="h-20 flex flex-row items-center">
        <ApplicationLogo class="block h-10 w-auto"/>
        <span
            class="text-3xl font-semibold text-primary-500 ml-6">Andal</span>
      </Link>
      <p
          class="text-3xl font-medium leading-normal text-center mt-4 text-black-500 dark:text-white-500">Dashboard <span class="text-error-500 font-semibold">not supported</span> on small screen [ <span
          class="text-error-500 font-semibold">width less or equal than 674px</span> ]</p>
    </div>
  </div>

  <div class="h-screen hidden sm:flex flex-row">
    <div :class="{'items-center' : !showingSidebarTitle, 'items-start' : showingSidebarTitle }"
         class="flex flex-col justify-between items-start px-4">

      <!-- App logo -->
      <Link :href="route('home')"
            class="h-20 flex flex-row items-center w-full">
        <ApplicationLogo class="block h-8 w-auto"/>
        <span v-if="showingSidebarTitle"
              class="text-2xl font-semibold text-primary-500 ml-6">Smarty</span>
      </Link>

      <!-- Sidebar menu -->
      <div class="flex flex-col space-y-6 py-20">
        <!-- Dashboard -->
        <SidebarItem :active="route().current('dashboard')"
                     :href="route('dashboard')"
                     :show-title="showingSidebarTitle">
          <template #title>
            Dashboard
          </template>

          <DashboardIcon/>
        </SidebarItem>

        <!-- Asset -->
        <SidebarItem :active="route().current('assets.index') || route().current('assets.edit') || route().current('assets.create')"
                     :href="route('assets.index')"
                     :show-title="showingSidebarTitle">
          <template #title>
            Asset
          </template>

          <ImageOutline/>
        </SidebarItem>

        <!-- User -->
        <SidebarItem :active="route().current('users.index') || route().current('users.edit')"
                     :href="route('users.index')"
                     :show-title="showingSidebarTitle">
          <template #title>
            Users
          </template>

          <People/>
        </SidebarItem>

        <!-- Article -->
        <SidebarItem
            :active="route().current('articles.index') || route().current('articles.create') || route().current('articles.edit')"
            :href="route('articles.index')"
            :show-title="showingSidebarTitle">
          <template #title>
            Articles
          </template>

          <ArticleIcon/>
        </SidebarItem>

        <!-- Setting -->
        <SidebarItem :active="route().current('settings.index')"
                     :href="route('settings.index')"
                     :show-title="showingSidebarTitle">
          <template #title>
            Setting
          </template>

          <SettingIcon/>
        </SidebarItem>
      </div>

      <!-- Logout -->
      <div class="mb-4">
        <SidebarItem :active="false" :href="route('logout')"
                     :logout="true" :show-title="showingSidebarTitle" as="button"
                     method="post">
          <template #title>
            Logout
          </template>

          <!-- Logout icon -->
          <Logout/>
        </SidebarItem>
      </div>
    </div>

    <div class="flex flex-col h-screen w-full overflow-hidden">
      <!-- Header -->
      <div
          class="h-20 flex-shrink-0 w-full px-4 flex flex-row justify-between items-center">
        <button @click="showingSidebarTitle = !showingSidebarTitle">
          <Layout
              class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out"/>
        </button>

        <div class="flex flex-row space-x-4 sm:order-last">

          <SidebarItem :active="false"
                       :href="route('assets.create')" :show-title="false">
            <CloudUploadOutline
                class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" :class="{ 'fill-primary-500 dark:fill-primary-500' : route().current('assets.create')}"/>
          </SidebarItem>

          <button @click="toggleTheme">
            <BulbOutline
                class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out"/>
          </button>

          <SidebarItem :active="route().current('users.edit')"
                       :href="route('users.edit', {'user': $page.props.auth.user.id })" :show-title="false">
            <Person
                class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" :class="{ 'fill-primary-500 dark:fill-primary-500' : route().current('users.edit', {'user': $page.props.auth.user.id })}"/>
          </SidebarItem>
        </div>
      </div>

      <!-- Flash message -->
      <div v-if="$page.props.flash.success" class="flex flex-row justify-end items-center">
        <FlashMessage v-if="$page.props.flash.success"
                      :body="$page.props.flash.success" type="success" class="my-2 h-28"/>
      </div>

      <!-- Content -->
      <div
          class="overflow-auto no-scrollbar px-4 text-black-500 dark:text-white-500">
        <slot/>
      </div>
    </div>
  </div>
</template>
