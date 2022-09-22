<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import LaruLink from "@/Components/Laru/Link.vue";
import LaruInput from '@/Components/Laru/Input.vue'
import LaruButton from '@/Components/Laru/Button.vue';
import LaruCheckbox from '@/Components/Laru/Checkbox.vue';
import LaruGuestLayout from '@/Layouts/Laru/Guest.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <LaruGuestLayout>

        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-success-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <LaruInput type="email" class="block w-full" v-model="form.email"
                placeholder="Entre ton email" required autofocus
                autocomplete="username" />

            <LaruInput type="password" class="block w-full"
                v-model="form.password" placeholder="Entre ton mot de passe" required
                autocomplete="current-password" />

            <!-- <div class="block mt-4">
                <label class="flex items-center">
                    <LaruCheckbox name="remember"
                        v-model:checked="form.remember" />
                    <span
                        class="ml-2 text-sm text-black-300">Remember
                        me</span>
                </label>
            </div> -->

            <div class="flex items-center justify-end mt-4">
                <LaruLink v-if="canResetPassword" :href="route('register')">
                    S'inscrire?
                </LaruLink>

                <LaruButton class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    Se connecter
                </LaruButton>
            </div>
        </form>
    </LaruGuestLayout>
</template>
