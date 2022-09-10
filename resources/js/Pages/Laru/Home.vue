<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import LaruFrontendLayout from '@/Layouts/Laru/Frontend.vue'
import LaruInput from '@/Components/Laru/Input.vue'
import Article from '@/Components/Laru/Article.vue';
import LinkButton from '@/Components/Laru/LinkButton.vue';

const form = useForm({
    term: '',
});

const articles = [
    {
        id: 1,
        img: "/storage/assets/asset-1.jpg",
    },
    {
        id: 2,
        img: "/storage/assets/asset-1.jpg",
    },
    {
        id: 3,
        img: "/storage/assets/asset-1.jpg",
    },
    {
        id: 4,
        img: "/storage/assets/asset-2.jpg",
    },
    {
        id: 5,
        img: "/storage/assets/asset-1.jpg",
    },
    {
        id: 6,
        img: "/storage/assets/asset-1.jpg",
    },
    {
        id: 7,
        img: "/storage/assets/asset-4.jpg",
    },
    {
        id: 8,
        img: "/storage/assets/asset-1.jpg",
    },
    {
        id: 9,
        img: "/storage/assets/asset-6.jpg",
    },
]

const submit = () => {
    // Redirect to search
    form.post(route('register'), {
        onFinish: () => form.reset('term'),
    });
};
</script>

<template>
    <Head title="Laru Home" />

    <LaruFrontendLayout>
        <!-- Welcome message -->
        <div class="sm:mx-4 lg:mx-0 px-8 py-10 mb-4 bg-primary-50 dark:bg-black-600">
            <span class="text-base sm:text-xl text-black-300 dark:text-white-500 transition ease-in-out duration-150">Welcome to Andal</span>
            <div class="mt-2 text-3xl sm:text-4xl font-medium leading-10 text-black-500 dark:text-white-50">Here, you can <span class="uppercase text-primary-500">learn</span> about <span class="uppercase text-primary-500">Blockchain terminology</span>.</div>
        </div>

        <!-- Search -->
        <div class="sm:mx-4 lg:mx-0 mb-10">
            <form @submit.prevent="submit">
                <div>
                    <LaruInput type="text" class="block w-full max-w-xl" v-model="form.term" placeholder="Start by searching" required/>
                    <!-- <LaruInput type="text" class="block w-full" v-model="form.term" required @keyup.enter="submit"/> -->
                </div>
            </form>
        </div>

        <!-- Articles -->
        <div class="mb-10 sm:px-4 lg:px-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10 no-scrollbar">
            <Article v-for="article in articles" :key="article.id" :article="article"></Article>
        </div>

        <!-- Infinite Scroll -->
        <div class="flex items-center w-full">
            <LinkButton :href="route('register')" class="mx-auto">Load more</LinkButton>
        </div>
    </LaruFrontendLayout>
</template>
