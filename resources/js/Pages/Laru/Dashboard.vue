<script setup>
import LaruAuthenticatedLayout from '@/Layouts/Laru/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <LaruAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Dashboard
                    </div>
                </div>
            </div>
        </div>
    </LaruAuthenticatedLayout>
</template>
