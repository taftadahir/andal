<script setup>
import Header from "@/Components/Laru/Frontend/Header.vue";
import Footer from "@/Components/Laru/Frontend/Footer.vue";
</script>

<template>
  <div class="min-h-screen flex flex-col justify-between">
    <!-- Header -->
    <Header class="mb-10" />

    <!-- Page Content -->
    <main class="max-w-5xl mx-auto w-full">
      <slot />
    </main>

    <!-- Footer -->
    <Footer class="mt-10" />
  </div>
</template>