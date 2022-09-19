<script setup>
import LaruAuthenticatedLayout from '@/Layouts/Laru/Authenticated.vue';
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3';
// import { Inertia } from "@inertiajs/inertia"
import LaruLinkButton from '@/Components/Laru/LinkButton.vue';
import LaruButton from '@/Components/Laru/Button.vue';
import LaruInput from '@/Components/Laru/Input.vue'
import LaruLabel from '@/Components/Laru/Label.vue';
import LaruSelect from '@/Components/Laru/Select.vue';
import ValidationError from '@/Components/Laru/ValidationError.vue';
import LaruTextarea from '@/Components/Laru/Textarea.vue';
import useSlugify from "@/Composables/useSlugify";
import { watch } from "vue";

const props = defineProps({
    article: Object,
    authors: Array,
    banners: Array,
    statuses: Object,
});

const { slugify } = useSlugify();

const form = useForm({
    'banner': props.article.banner ? props.article.banner.id : null,
    'banner_name': props.article.banner ? props.article.banner.name : null,
    'author': props.article.author ? props.article.author.id : null,
    'title': props.article.title,
    'slug': props.article.slug,
    'excerpt': props.article.excerpt,
    'content': props.article.content,
    'status': props.article.status,
    'read_time': props.article.read_time,
});

// Auto-slugifying watcher
watch(() => form.title, (newTitle, oldTitle) => {
    form.slug = slugify(newTitle)
})

watch(() => form.banner, (newTitle, oldTitle) => {
    props.banners.forEach(banner => {
        if (!form.banner) {
            return;
        }

        if (banner.id == form.banner) {
            form.banner_name = banner.name
        }
    });
})

const submit = () => {
    form.put(route('articles.update', { 'article': props.article.id }));
};
</script>
            
<template>

    <Head title="Edit Article" />

    <LaruAuthenticatedLayout>
        <div class="flex flex-col max-w-7xl mx-auto w-full">

            <div class="flex flex-row items-center justify-between mb-8">
                <span
                    class="text-black-500 dark:text-white-50 font-semibold text-3xl">Edit
                    Article</span>

                <div class="flex flex-row space-x-4">
                    <LaruLinkButton :href="route('articles.destroy', { 'article': article.id })" type="error" as="button" method="delete">Delete</LaruLinkButton>
                    <LaruButton @click="submit">Save</LaruButton>
                </div>
            </div>

            <div class="min-h-[32rem]">
                <form class="space-y-6 mb-6">
                    <div
                        class="flex flex-row justify-between items-start space-x-6">
                        <div class="w-full max-w-lg">
                            <LaruLabel for="title" value="Title" />
                            <LaruInput id="title" v-model="form.title"
                                autocomplete="title" autofocus
                                class="block w-full mt-2 p-4"
                                placeholder="Fill the title" required
                                type="text" />
                            <ValidationError input="title" />
                        </div>

                        <div class="w-full max-w-lg">
                            <LaruLabel for="slug" value="Slug" />
                            <LaruInput id="slug" v-model="form.slug"
                                class="block w-full mt-2 p-4"
                                placeholder="Fill the slug" required
                                type="text" />
                            <ValidationError input="slug" />
                        </div>
                    </div>

                    <div
                        class="flex flex-row justify-between items-start space-x-6">
                        <div class="w-full max-w-lg">
                            <LaruLabel for="author" value="Author" />
                            <LaruSelect id="author" v-model="form.author">
                                <option v-for="author in authors"
                                    :key="author.id" :value="author.id"
                                    v-text="author.name" />
                            </LaruSelect>
                            <ValidationError input="author" />
                        </div>

                        <div class="w-full max-w-lg">
                            <LaruLabel for="status" value="Status" />
                            <LaruSelect id="status" v-model="form.status">
                                <option v-for="(value, key) in statuses"
                                    :key="key" :value="key" v-text="value" />
                            </LaruSelect>
                            <ValidationError input="status" />
                        </div>
                    </div>

                    <div
                        class="flex flex-row justify-between items-start space-x-6">
                        <div class="w-full max-w-lg">
                            <LaruLabel for="banner" value="Banner" />
                            <LaruSelect id="banner" v-model="form.banner">
                                <option v-for="banner in banners"
                                    :key="banner.id" :value="banner.id"
                                    v-text="banner.name" />
                            </LaruSelect>
                            <ValidationError input="banner" />
                            <div v-if="form.banner">
                                <img :src="'/storage/assets/' + form.banner_name"
                                    alt="Article Image"
                                    class="w-full aspect-video mt-4" />
                            </div>
                        </div>

                        <div class="w-full max-w-lg">
                            <LaruLabel for="read_time"
                                value="Read time [ minutes ]" />
                            <LaruInput id="read_time" v-model="form.read_time"
                                autocomplete="read_time"
                                class="block w-full mt-2 p-4"
                                placeholder="Fill read time in minutes"
                                type="number" />
                            <ValidationError input="read_time" />
                        </div>
                    </div>

                    <div class="w-full">
                        <LaruLabel for="excerpt" value="Excerpt" />
                        <LaruTextarea id="excerpt" v-model="form.excerpt"
                            class="block w-full mt-2 p-4" name="excerpt"
                            placeholder="Fill the excerpt" rows="4" />
                        <ValidationError input="excerpt" />
                    </div>

                    <div class="w-full">
                        <LaruLabel for="content" value="Content" />
                        <LaruTextarea id="content" v-model="form.content"
                            class="block w-full mt-2 p-4" name="content"
                            placeholder="Fill the content" rows="16" />
                        <ValidationError input="content" />
                    </div>
                </form>
            </div>
        </div>
    </LaruAuthenticatedLayout>
</template>
            