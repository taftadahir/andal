<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import LaruFrontendLayout from "@/Layouts/Laru/Frontend.vue";
import Link from "@/Components/Laru/Link.vue";
import { onMounted } from "@vue/runtime-core";
import Article from "@/Components/Laru/Article.vue";
import "./../../prism.js";

onMounted(() => {
  Prism.highlightAll();
});

defineProps({
  article: Object,
  articlesBySameAuthor: Object,
  articlesBySameAuthor: Object,
});
</script>

<template>
  <Head :title="article.title" />

  <LaruFrontendLayout class="text-black-500 dark:text-white-50">
    <div
      class="flex flex-col lg:flex-row justify-center lg:justify-between items-start space-y-12 lg:space-x-10 sm:px-4 lg:px-0">
      <div class="single w-full max-w-2xl">

        <!-- Title -->
        <h1>
          What is ERC-20 in Blockchain technology?
        </h1>

        <div class="mt-4">
          <div>
            <span class="text-base text-white-600">By Taftadjani - Published at
              August 08, 2022 - 5
              mins read</span>
          </div>

          <!-- Banner & Summary -->
          <div class="mt-4">
            <img src="/storage/assets/asset-1.jpg" alt="Article Image"/>
            <p class="mt-4">
              Lorem ipsum dolor sit amet, consectetur adipiscing
              elit. Quis risus donec tellus volutpat nisi egestas.
              Adipiscing amet, morbi pellentesque enim, sit
              mollis. Nunc eu, pharetra ut vestibulum molestie
              dolor. Felis ut mauris habitant eget morbi.
            </p>
          </div>

          <!-- Body -->
          <div>
            <h2>H2 Introduction</h2>
            <p>
              On sait depuis longtemps que travailler avec du
              texte lisible et contenant du sens est source de
              distractions, et empêche de se concentrer sur la
              mise en page elle-même. L'avantage du Lorem Ipsum
              sur un texte générique comme 'Du texte. Du texte. Du
              texte.' est qu'il possède une distribution de
              lettres plus ou moins normale, et en tout cas
              comparable avec celle du français standard. De
              nombreuses suites logicielles de mise en page ou
              éditeurs de sites <mark>Web2</mark> ont fait du Lorem Ipsum leur
              faux texte par défaut, et une recherche pour 'Lorem
              Ipsum' vous conduira vers de nombreux sites qui n'en
              sont encore qu'à leur phase de construction.
              Plusieurs versions sont apparues avec le temps,
              parfois par accident, souvent intentionnellement
              (histoire d'y rajouter de petits clins d'oeil, voire
              des phrases embarassantes).
            </p>

            <h2>H2 Introduction</h2>
            <p>
              On sait depuis longtemps que travailler avec du
              texte lisible et contenant du sens est source de
              distractions, et empêche de se concentrer sur la
              mise en page elle-même. L'avantage du Lorem Ipsum
              sur un texte générique comme 'Du texte. Du texte. Du
              texte.' est qu'il possède une distribution de
              lettres plus ou moins normale, et en tout cas
              comparable avec celle du français standard. De
              nombreuses suites logicielles de mise en page ou
              éditeurs de sites Web ont fait du Lorem Ipsum leur
              faux texte par défaut, et une recherche pour 'Lorem
              Ipsum' vous conduira vers de nombreux sites qui n'en
              sont encore qu'à leur phase de construction.
              Plusieurs versions sont apparues avec le temps,
              parfois par accident,
              <a href="http://www.google.com" target="_blank">This is a link to
                google</a>
              (histoire d'y rajouter de petits clins d'oeil, voire
              des phrases embarassantes).
            </p>

            <h2>H2 Introduction</h2>
            <p>
              On sait depuis longtemps que travailler avec du
              texte lisible et contenant du sens est source de
              distractions, et empêche de se concentrer sur la
              mise en page elle-même. L'avantage du Lorem Ipsum
              sur un texte générique comme 'Du texte. Du texte. Du
              texte.' est qu'il possède une distribution de
              lettres plus ou moins normale, et en tout cas
              comparable avec celle du français standard. De
              nombreuses suites logicielles de mise en page ou
              éditeurs de sites Web ont fait du Lorem Ipsum leur
              faux texte par défaut, et une recherche pour 'Lorem
              Ipsum' vous conduira vers de nombreux sites qui n'en
              sont encore qu'à leur phase de construction.
              Plusieurs versions sont apparues avec le temps,
              parfois par accident,
              <a href="http://www.google.com" target="_blank">This is a link to
                google</a>
              (histoire d'y rajouter de petits clins d'oeil, voire
              des phrases embarassantes).
            </p>

            <h2>H2 Introduction</h2>
            <h3>H3 Introduction</h3>
            <h4>H4 Introduction</h4>
            <h5>H5 Introduction</h5>
            <div class="img">
              <img src="/storage/assets/asset-1.jpg" alt="Article Image"/>
              <span>Lorem ipsum dolor sit amet,
                consectetur
                adipiscing elit.</span>
            </div>

            <h2>h2 Highlight code using Prism</h2>

            <pre data-src="/storage/code/test.css"></pre>
            <pre data-src="/storage/code/test.php"></pre>
            <pre data-src="/storage/code/test.java"></pre>
            <pre data-src="/storage/code/test.html"></pre>
            <pre data-src="/storage/code/test.py"></pre>
            <pre data-src="/storage/code/test.js"></pre>
            <pre data-src="/storage/code/test.sql"></pre>
          </div>
        </div>
      </div>
      <div
        class="w-full lg:max-w-2xl lg:w-96 lg:h-[80vh] sticky top-0 flex flex-col lg:items-start lg:justify-center">
       <div class="single"><h3>By the same author</h3></div>  
        <!-- Articles -->
        <div
            class="no-scrollbar w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-x-6 gap-y-10 lg:gap-y-8">
            <Article v-for="article in articlesBySameAuthor" :key="article.slug"
                :article="article" :show-image="false" class="hidden lg:block"></Article>
            <Article v-for="article in articlesBySameAuthor" :key="article.slug"
                :article="article" class="lg:hidden"></Article>
        </div>
      </div>
    </div>

    <div class="w-full max-w-5xl mx-auto mt-14">
      <div class="single sm:px-4 lg:px-0"><h3>Latest published articles</h3></div>  
      <!-- Articles -->
      <div
            class="mb-10 mt-4 sm:px-4 lg:px-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10 no-scrollbar">
            <Article v-for="article in articlesBySameAuthor" :key="article.slug"
                :article="article"></Article>
        </div>
    </div>
  </LaruFrontendLayout>
</template>
