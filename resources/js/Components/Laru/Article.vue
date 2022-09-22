<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    defineProps({
      article: {
        type : Object,
        required : true,
      },
      showImage: {
        type : Boolean,
        required: false,
        default: true,
      }
    });
    </script>

    <template>
        <article class="group w-full hover:scale-105 transition ease-in-out duration-150">
            <Link class="space-y-3" :href="route('single', {'article' : article.slug})">
                <img :src="'/storage/assets/' + article.banner.name" alt="Article Image" class="w-full aspect-video" v-if="showImage">
                <h3 class="font-medium block text-lg leading-7 text-black-500 dark:text-white-50 group-hover:text-primary-500 line-clamp overflow-y-hidden transition ease-in-out duration-150">{{ article.title }}</h3>
                <span class="block text-sm text-black-300 dark:text-white-600 group-hover:opacity-50">Par {{ article.author.name }} - {{ article.published_at }} - {{ article.read_time }} mins</span>
            </Link>
        </article>
    </template>