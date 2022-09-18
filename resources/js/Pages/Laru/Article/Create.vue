<script setup>
import LaruAuthenticatedLayout from '@/Layouts/Laru/Authenticated.vue';
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia"
import LaruLinkButton from '@/Components/Laru/LinkButton.vue';
import LaruButton from '@/Components/Laru/Button.vue';
import LaruInput from '@/Components/Laru/Input.vue'
import LaruLabel from '@/Components/Laru/Label.vue';
import LaruSelect from '@/Components/Laru/Select.vue';
import ValidationError from '@/Components/Laru/ValidationError.vue';
import LaruTextarea from '@/Components/Laru/Textarea.vue';
import useSlugify from "@/Composables/useSlugify";
import { watch } from "vue";

const { slugify } = useSlugify();

const props = defineProps({
    authors: Array,
    statuses: Object,
});

const form = useForm({
    'banner': null,
    'author': usePage().props.value.auth.user.id,
    'title': '',
    'slug': '',
    'excerpt': '',
    'content': '',
    'status': 'draft',
    'read_time': 0,
});

// Auto-slugifying watcher
watch(() => form.title, (newTitle, oldTitle) => {
    form.slug = slugify(newTitle)
})

const submit = () => {
    form.post(route('articles.store'));
};
</script>
        
<template>

    <Head title="Create Article" />

    <LaruAuthenticatedLayout>
        <div
            class="flex flex-col items-start justify-center max-w-7xl mx-auto sm:px-4 lg:px-6 w-full">

            <div class="flex flex-row items-center justify-between mb-8 w-full">
                <span
                    class="text-black-500 dark:text-white-50 font-semibold text-3xl">Create
                    Article</span>

                <LaruButton @click="submit">Save
                </LaruButton>
            </div>

            <div class="min-h-[32rem] w-full" >
                <form class="space-y-6 mb-6">
                    <div class="flex flex-row justify-between items-start">
                        <div class="w-full max-w-md">
                            <LaruLabel for="title" value="Title" />
                            <LaruInput id="title" v-model="form.title"
                                autocomplete="title" autofocus
                                class="block w-full mt-2 p-4"
                                placeholder="Fill the title" required
                                type="text" />
                            <ValidationError input="title" />
                        </div>

                        <div class="w-full max-w-md">
                            <LaruLabel for="slug" value="Slug" />
                            <LaruInput id="slug" v-model="form.slug"
                                class="block w-full mt-2 p-4"
                                placeholder="Fill the slug" required
                                type="text" />
                            <ValidationError input="slug" />
                        </div>
                    </div>

                    <div class="flex flex-row justify-between items-start">
                        <div class="w-full max-w-md">
                            <LaruLabel for="author" value="Author" />
                            <LaruSelect id="author" v-model="form.author">
                                <option v-for="author in authors"
                                    :key="author.id" :value="author.id"
                                    v-text="author.name" />
                            </LaruSelect>
                            <ValidationError input="author" />
                        </div>

                        <div class="w-full max-w-md">
                            <LaruLabel for="status" value="Status" />
                            <LaruSelect id="status" v-model="form.status">
                                <option v-for="(value, key) in statuses"
                                    :key="key" :value="key" v-text="value" />
                            </LaruSelect>
                            <ValidationError input="status" />
                        </div>
                    </div>

                    <div class="flex flex-row justify-end items-start">
                        <div class="w-full max-w-md">
                            <LaruLabel for="read_time" value="Read time" />
                            <LaruInput id="read_time" v-model="form.read_time"
                                autocomplete="read_time"
                                class="block w-full mt-2"
                                placeholder="Fill read time in seconds"
                                type="number" />
                            <ValidationError input="read_time" />
                        </div>
                    </div>
                    
                    <div class="w-full">
                        <LaruLabel for="excerpt" value="Excerpt" />
                        <LaruTextarea id="excerpt" v-model="form.excerpt"
                            class="block w-full mt-2" name="excerpt"
                            placeholder="Fill the excerpt" rows="4" />
                        <ValidationError input="excerpt" />
                    </div>

                    <div class="w-full">
                        <LaruLabel for="content" value="Content" />
                        <LaruTextarea id="content" v-model="form.content"
                            class="block w-full mt-2" name="content"
                            placeholder="Fill the content" rows="16" />
                        <ValidationError input="content" />
                    </div>
                </form>
            </div>
        </div>
    </LaruAuthenticatedLayout>
</template>
        