<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import LaruFrontendLayout from "@/Layouts/Laru/Frontend.vue";
import { onMounted } from "@vue/runtime-core";
import Article from "@/Components/Laru/Article.vue";
import "./../../prism.js";

onMounted(() => {
  Prism.highlightAll();
});

defineProps({
  article: Object,
  articlesBySameAuthor: Object,
  latestArticles: Object,
});
</script>

<template>
  <Head :title="article.title" />

  <LaruFrontendLayout class="text-black-500 dark:text-white-50">
    <div
      class="flex flex-col lg:flex-row justify-center lg:justify-between items-start lg:space-x-10 sm:px-4 lg:px-0">
      <div class="single w-full max-w-2xl">

        <!-- Title -->
        <h1 v-text="article.title"></h1>
        <!-- What is ERC-20 in Blockchain technology? -->

        <div class="mt-4">
          <div>
            <span class="text-base text-white-600">By {{ article.author.name }} - {{ article.published_at }} - {{ article.read_time }} mins read</span>
          </div>

          <!-- Banner & Summary -->
          <div class="mt-4">
            <img :src="'/storage/assets/' + article.banner.name" alt="Article Image" v-if="article.banner"/>
            <p class="mt-4" v-if="article.excerpt" v-text="article.excerpt"></p>
          </div>

          <!-- Body -->
          <div v-html="article.content" class="mt-4" v-if="article.content">
          </div>
        </div>
      </div>
      <div
        class="w-full lg:max-w-2xl lg:w-96 lg:h-[80vh] sticky top-0 flex flex-col lg:items-start lg:justify-center" v-if="articlesBySameAuthor.length">
       <div class="single"><h3>By the same author</h3></div>  
        <!-- Articles -->
        <div
            class="no-scrollbar w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-x-6 gap-y-10 lg:gap-y-8">
            <Article v-for="article in articlesBySameAuthor" :key="article.slug"
                :article="article" :show-image="false" class="hidden lg:block"></Article>
            <Article v-for="article in articlesBySameAuthor" :key="article.slug"
                :article="article" class="lg:hidden" :show-image="article.banner"></Article>
        </div>
      </div>
    </div>

    <div class="w-full max-w-5xl mx-auto mt-14" v-if="latestArticles.length">
      <div class="single sm:px-4 lg:px-0"><h3>Latest published articles</h3></div>  
      <!-- Articles -->
      <div
            class="mb-10 mt-4 sm:px-4 lg:px-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10 no-scrollbar">
            <Article v-for="article in latestArticles" :key="article.slug"
                :article="article" :show-image="article.banner"></Article>
        </div>
    </div>
  </LaruFrontendLayout>
</template>
