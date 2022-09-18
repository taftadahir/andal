<script setup>
    import LaruAuthenticatedLayout from '@/Layouts/Laru/Authenticated.vue';
    import LinkButton from "@/Components/Laru/LinkButton.vue";
    import { Head } from '@inertiajs/inertia-vue3';
    </script>
        
    <template>
    
        <Head title="Articles" />
    
        <LaruAuthenticatedLayout>
            <div class="flex flex-col justify-center max-w-7xl mx-auto sm:px-4 lg:px-6 h-full">
                <div class="flex flex-row justify-between">
                    <span class="text-white-50 font-semibold text-3xl">Articles</span>
    
                    <LinkButton v-if="$page.props.auth.canRegister" :href="route('articles.create')"
                        class="flex-grow sm:flex-grow-0">Add</LinkButton>
                </div>
                <div class="min-h-[32rem]">
                    Edit article
                </div>
            </div>
        </LaruAuthenticatedLayout>
    </template>
        