<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import LaruButton from '@/Components/Laru/Button.vue';
import LaruLink from "@/Components/Laru/Link.vue";
import LaruInput from '@/Components/Laru/Input.vue'
import LaruGuestLayout from '@/Layouts/Laru/Guest.vue';
import LaruValidationErrors from '@/Components/Laru/ValidationErrors.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <LaruGuestLayout>

        <Head title="Register" />

        <div>
            <LaruValidationErrors class="mb-4"/>
            <form @submit.prevent="submit" class="space-y-6">
                <LaruInput type="text" class="block w-full" v-model="form.name"
                    placeholder="Entre ton nom" autofocus required/>

                <LaruInput type="email" class="block w-full"
                    v-model="form.email" placeholder="Entre ton email" required/>

                <LaruInput type="password" class="block w-full"
                    v-model="form.password" placeholder="Entre ton mot de passe" required/>

                <LaruInput type="password" class="block w-full"
                    v-model="form.password_confirmation"
                    placeholder="Confirm ton mot de passe" required/>

                <div class="flex items-center justify-end">
                    <LaruLink :href="route('login')">
                        Se connecter?
                    </LaruLink>

                    <LaruButton class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        S'inscrire
                    </LaruButton>
                </div>
            </form>
        </div>
    </LaruGuestLayout>
</template>
