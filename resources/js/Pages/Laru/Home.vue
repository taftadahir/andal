<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia"
import { ref, watch } from 'vue';
import debounce from "lodash/debounce"
import LaruFrontendLayout from '@/Layouts/Laru/Frontend.vue'
import LaruInput from '@/Components/Laru/Input.vue'
import Article from '@/Components/Laru/Article.vue';
import LaruLinkButton from '@/Components/Laru/LinkButton.vue';

const props = defineProps({
    articles: Object,
    filters: Object
})

let search = ref(props.filters.search)

watch(search, debounce(function (value) {
    Inertia.get('/', { search: value }, {
        preserveState: true,
        replace: true,
    })
}, 300))
</script>

<template>

    <Head title="Laru Home" />

    <LaruFrontendLayout>

        <!-- Welcome message -->
        <div
            class="sm:mx-4 lg:mx-0 px-8 py-10 mb-4 bg-primary-50 dark:bg-black-600">
            <span
                class="text-base sm:text-xl text-black-300 dark:text-white-500 transition ease-in-out duration-150">Bienvenue à <span class="uppercase text-secondary-500 font-semibold">Alpha Smarty</span></span>
            <div
                class="mt-2 text-3xl sm:text-4xl font-medium leading-10 text-black-500 dark:text-white-50">
                Tu trouveras ici des articles au sujet de la <span
                    class="uppercase text-primary-500">Blockchain</span> et du <span
                    class="uppercase text-primary-500">Developpement.</span>.</div>
        </div>

        <!-- Search -->
        <div class="sm:mx-4 lg:mx-0 mb-10">
            <div>
                <LaruInput type="text" class="block w-full max-w-xl p-4"
                    v-model="search" placeholder="Entre un mot clé" />
            </div>
        </div>

        <!-- Articles -->
        <div
            class="mb-10 sm:px-4 lg:px-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10 no-scrollbar">
            <Article v-for="article in articles.data" :key="article.slug"
                :article="article" :show-image="article.banner != null"></Article>
        </div>

        <div v-if="!articles.data.length"
            class="text-base sm:text-xl text-black-300 dark:text-white-500 transition ease-in-out duration-150">
            Pas de résultat ...</div>

        <!-- Infinite Scroll || Pagination -->
        <div class="flex items-center justify-center w-full space-x-4"
            v-if="articles.prev_page_url || articles.next_page_url">
            <LaruLinkButton v-if="articles.prev_page_url"
                :href="articles.prev_page_url">Précédant</LaruLinkButton>
            <LaruLinkButton v-if="articles.next_page_url"
                :href="articles.next_page_url">Suivant</LaruLinkButton>
        </div>

    </LaruFrontendLayout>
</template>
