<script setup>
import ArrowUpwardOutline from "@/Components/Laru/Icons/ArrowUpwardOutline.vue";
import BulbOutline from "@/Components/Laru/Icons/BulbOutline.vue";

function goUp() {
    window.scrollTo(0, 0);
}

function switchTheme() {
    document.documentElement.classList.toggle('dark');
}
</script>
    
<template>
    <footer class="w-full bg-primary-50 dark:bg-black-600 px-4 lg:px-0">
        <div
            class="max-w-5xl w-full mx-auto flex flex-col sm:flex-row sm:justify-between items-center sm:h-20 py-4 sm:py-0">

            <div class="flex flex-row space-x-4 sm:order-last">
                <button @click="switchTheme">
                    <BulbOutline
                        class="fill-black-500 dark:fill-white-500 hover:fill-primary-500 hover:dark:fill-primary-500 transition duration-150 ease-in-out" />
                </button>

                <button @click="goUp">
                    <ArrowUpwardOutline
                        class="fill-primary-500 dark:fill-primary-500 hover:fill-primary-700 hover:dark:fill-primary-700 transition duration-150 ease-in-out" />
                </button>
            </div>

            <div
                class="font-medium text-sm flex items-center text-white-600 mt-4 sm:mt-0">
                <span class="mr-4">Andal © 2022</span>
                <span class="w-0.5 h-3 bg-white-600"></span>
                <span class="ml-4">All right
                    reserved</span>
            </div>

        </div>
    </footer>
</template>