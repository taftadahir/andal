<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    defineProps({
      article: {
        type : Object,
        required : true,
      }
    });
    </script>

    <template>
        <article class="group w-full hover:scale-105 transition ease-in-out duration-150">
            <Link class="space-y-3" :href="route('register')">
                <img :src="article.img" alt="Article Image" class="w-full aspect-video">
                <h3 class="font-medium block text-xl leading-6 text-black-500 dark:text-white-50 group-hover:text-primary-500 transition ease-in-out duration-150">What is ERC-20 in blockchain technology?</h3>
                <span class="block text-sm text-black-300 dark:text-white-600 group-hover:opacity-50">By Taftadjani Dahirou - August 08, 2022 - 5 mins read</span>
            </Link>
        </article>
    </template>