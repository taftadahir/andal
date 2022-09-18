<script setup>
import LaruAuthenticatedLayout from '@/Layouts/Laru/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import EyeOutline from '@/Components/Laru/Icons/EyeOutline.vue';
import EditOutline from '@/Components/Laru/Icons/EditOutline.vue';
import TrashOutline from '@/Components/Laru/Icons/TrashOutline.vue';
import LaruDropdown from "@/Components/Laru/Dropdown.vue";
import MoreHorizontalOutline from "@/Components/Laru/Icons/MoreHorizontalOutline.vue";
import LaruLinkButton from '@/Components/Laru/LinkButton.vue';
</script>
    
<template>

    <Head title="Articles" />

    <LaruAuthenticatedLayout>
        <div
            class="flex flex-col justify-center max-w-7xl mx-auto sm:px-4 lg:px-6 h-full">

            <div class="flex flex-row justify-between mb-8">
                <span
                    class="text-white-50 font-semibold text-3xl">Articles</span>

                <LaruLinkButton v-if="$page.props.auth.canRegister"
                    :href="route('articles.create')">Add</LaruLinkButton>
            </div>

            <div class="min-h-[32rem]">

                <div
                    class="overflow-x-auto overflow-y-auto no-scrollbar relative z-30 pb-8">
                    <table
                        class="w-full text-sm text-left text-black-500 dark:text-white-50">
                        <thead
                            class="text-xs uppercase text-black-500 dark:text-white-50 bg-primary-50 dark:bg-black-600">
                            <tr>
                                <th scope="col" class="py-2 px-6">
                                    Title
                                </th>
                                <th scope="col" class="px-6">
                                    Author
                                </th>
                                <th scope="col" class="px-6">
                                    Status
                                </th>
                                <th scope="col" class="px-6">
                                    Read time
                                </th>
                                <th scope="col" class="px-6">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"
                                    class="py-4 px-6 font-medium whitespace-wrap max-w-xs">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Felis urna platea
                                    ullamcorper amet, fermentum auctor nunc
                                    arcu.
                                </th>
                                <td class="px-6">
                                    Taftadjani
                                </td>
                                <td class="px-6">
                                    <span
                                        class="font-medium px-2 py-1 bg-success-500">Published</span>
                                </td>
                                <td class="px-6">
                                    $2999
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
                                                    class="fill-black-300 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                            </button>
                                        </template>

                                        <template #content>
                                            <div
                                                class="flex flex-row items-center justify-center space-x-4 px-4 py-2">
                                                <Link :href="route('login')"
                                                    class="whitespace-nowrap">
                                                <EyeOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <EditOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <TrashOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-error-500 hover:dark:fill-error-500 transition duration-150 ease-in-out" />
                                                </Link>
                                            </div>
                                        </template>
                                    </LaruDropdown>
                                </td>
                            </tr>
                            <tr class="bg-primary-50 dark:bg-black-600">
                                <th scope="row"
                                    class="py-4 px-6 font-medium whitespace-nowrap">
                                    Microsoft Surface Pro
                                </th>
                                <td class="py-4 px-6">
                                    White
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="font-medium px-2 py-1 bg-secondary-500">Draft</span>
                                </td>
                                <td class="py-4 px-6">
                                    $1999
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
                                                    class="fill-black-300 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                            </button>
                                        </template>

                                        <template #content>
                                            <div
                                                class="flex flex-row items-center justify-center space-x-4 px-4 py-2">
                                                <Link :href="route('login')"
                                                    class="whitespace-nowrap">
                                                <EyeOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <EditOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <TrashOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-error-500 hover:dark:fill-error-500 transition duration-150 ease-in-out" />
                                                </Link>
                                            </div>
                                        </template>
                                    </LaruDropdown>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"
                                    class="py-4 px-6 font-medium whitespace-nowrap">
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="py-4 px-6">
                                    Sliver
                                </td>
                                <td
                                    class="flex flex-row items-center py-4 px-6">
                                    <span
                                        class="font-medium px-2 py-1 bg-error-500">Outdated</span>
                                </td>
                                <td class="py-4 px-6">
                                    $2999
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
                                                    class="fill-black-300 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                            </button>
                                        </template>

                                        <template #content>
                                            <div
                                                class="flex flex-row items-center justify-center space-x-4 px-4 py-2">
                                                <Link :href="route('login')"
                                                    class="whitespace-nowrap">
                                                <EyeOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <EditOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <TrashOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-error-500 hover:dark:fill-error-500 transition duration-150 ease-in-out" />
                                                </Link>
                                            </div>
                                        </template>
                                    </LaruDropdown>
                                </td>
                            </tr>
                            <tr class="bg-primary-50 dark:bg-black-600">
                                <th scope="row"
                                    class="py-4 px-6 font-medium whitespace-nowrap">
                                    Microsoft Surface Pro
                                </th>
                                <td class="py-4 px-6">
                                    White
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="font-medium px-2 py-1 bg-secondary-500">Draft</span>
                                </td>
                                <td class="py-4 px-6">
                                    $1999
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
                                                    class="fill-black-300 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                            </button>
                                        </template>

                                        <template #content>
                                            <div
                                                class="flex flex-row items-center justify-center space-x-4 px-4 py-2">
                                                <Link :href="route('login')"
                                                    class="whitespace-nowrap">
                                                <EyeOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <EditOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <TrashOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-error-500 hover:dark:fill-error-500 transition duration-150 ease-in-out" />
                                                </Link>
                                            </div>
                                        </template>
                                    </LaruDropdown>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"
                                    class="py-4 px-6 font-medium whitespace-wrap max-w-xs">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Felis urna platea
                                    ullamcorper amet, fermentum auctor nunc
                                    arcu.
                                </th>
                                <td class="px-6">
                                    Taftadjani
                                </td>
                                <td class="px-6">
                                    <span
                                        class="font-medium px-2 py-1 bg-success-500">Published</span>
                                </td>
                                <td class="px-6">
                                    $2999
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
                                                    class="fill-black-300 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                            </button>
                                        </template>

                                        <template #content>
                                            <div
                                                class="flex flex-row items-center justify-center space-x-4 px-4 py-2">
                                                <Link :href="route('login')"
                                                    class="whitespace-nowrap">
                                                <EyeOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <EditOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <TrashOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-error-500 hover:dark:fill-error-500 transition duration-150 ease-in-out" />
                                                </Link>
                                            </div>
                                        </template>
                                    </LaruDropdown>
                                </td>
                            </tr>
                            <tr class="bg-primary-50 dark:bg-black-600">
                                <th scope="row"
                                    class="py-4 px-6 font-medium whitespace-nowrap">
                                    Microsoft Surface Pro
                                </th>
                                <td class="py-4 px-6">
                                    White
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="font-medium px-2 py-1 bg-secondary-500">Draft</span>
                                </td>
                                <td class="py-4 px-6">
                                    $1999
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
                                                    class="fill-black-300 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                            </button>
                                        </template>

                                        <template #content>
                                            <div
                                                class="flex flex-row items-center justify-center space-x-4 px-4 py-2">
                                                <Link :href="route('login')"
                                                    class="whitespace-nowrap">
                                                <EyeOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <EditOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <TrashOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-error-500 hover:dark:fill-error-500 transition duration-150 ease-in-out" />
                                                </Link>
                                            </div>
                                        </template>
                                    </LaruDropdown>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"
                                    class="py-4 px-6 font-medium whitespace-wrap max-w-xs">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Felis urna platea
                                    ullamcorper amet, fermentum auctor nunc
                                    arcu.
                                </th>
                                <td class="px-6">
                                    Taftadjani
                                </td>
                                <td class="px-6">
                                    <span
                                        class="font-medium px-2 py-1 bg-success-500">Published</span>
                                </td>
                                <td class="px-6">
                                    $2999
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
                                                    class="fill-black-300 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                            </button>
                                        </template>

                                        <template #content>
                                            <div
                                                class="flex flex-row items-center justify-center space-x-4 px-4 py-2">
                                                <Link :href="route('login')"
                                                    class="whitespace-nowrap">
                                                <EyeOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <EditOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <TrashOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-error-500 hover:dark:fill-error-500 transition duration-150 ease-in-out" />
                                                </Link>
                                            </div>
                                        </template>
                                    </LaruDropdown>
                                </td>
                            </tr>
                            <tr class="bg-primary-50 dark:bg-black-600">
                                <th scope="row"
                                    class="py-4 px-6 font-medium whitespace-nowrap">
                                    Microsoft Surface Pro
                                </th>
                                <td class="py-4 px-6">
                                    White
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="font-medium px-2 py-1 bg-secondary-500">Draft</span>
                                </td>
                                <td class="py-4 px-6">
                                    $1999
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
                                                    class="fill-black-300 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                            </button>
                                        </template>

                                        <template #content>
                                            <div
                                                class="flex flex-row items-center justify-center space-x-4 px-4 py-2">
                                                <Link :href="route('login')"
                                                    class="whitespace-nowrap">
                                                <EyeOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <EditOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <TrashOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-error-500 hover:dark:fill-error-500 transition duration-150 ease-in-out" />
                                                </Link>
                                            </div>
                                        </template>
                                    </LaruDropdown>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"
                                    class="py-4 px-6 font-medium whitespace-wrap max-w-xs">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Felis urna platea
                                    ullamcorper amet, fermentum auctor nunc
                                    arcu.
                                </th>
                                <td class="px-6">
                                    Taftadjani
                                </td>
                                <td class="px-6">
                                    <span
                                        class="font-medium px-2 py-1 bg-success-500">Published</span>
                                </td>
                                <td class="px-6">
                                    $2999
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
                                                    class="fill-black-300 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                            </button>
                                        </template>

                                        <template #content>
                                            <div
                                                class="flex flex-row items-center justify-center space-x-4 px-4 py-2">
                                                <Link :href="route('login')"
                                                    class="whitespace-nowrap">
                                                <EyeOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <EditOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                                                </Link>
                                                <Link :href="route('login')">
                                                <TrashOutline
                                                    class="fill-black-500 dark:fill-white-500 hover:fill-error-500 hover:dark:fill-error-500 transition duration-150 ease-in-out" />
                                                </Link>
                                            </div>
                                        </template>
                                    </LaruDropdown>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Infinite Scroll || Pagination -->
                    <div class="flex items-center justify-center w-full space-x-4 mt-6">
                        <LaruLinkButton :href="route('articles.create')">
                            Previous</LaruLinkButton>
                        <LaruLinkButton :href="route('articles.create')">Next
                        </LaruLinkButton>
                    </div>
                </div>

            </div>
        </div>
    </LaruAuthenticatedLayout>
</template>
    