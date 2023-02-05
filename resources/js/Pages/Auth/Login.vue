<template>
    <form @submit.prevent="login">
        <div class="w-1/2 mx-auto">
            <div>
                <label class="label" for="email">Email</label>
                <input
                    id="email"
                    v-model="form.email"
                    class="input"
                    type="text"
                />
                <div class="input-error" v-if="form.errors.email">
                    {{ form.errors.email }}
                </div>
            </div>
            <div class="mt-4">
                <label class="label" for="password">Password</label>
                <input
                    id="password"
                    v-model="form.password"
                    class="input"
                    type="password"
                />
                <div class="input-error" v-if="form.errors.password">
                    {{ form.errors.password }}
                </div>
            </div>
            <div class="mt-4">
                <button class="btn-primary w-full" type="submit">Login</button>
                <div class="mt-2 text-center">
                    <Link
                        :href="route('user-account.create')"
                        class="text-sm text-gray-500"
                        >Need an account? Click here</Link
                    >
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm, Link } from "@inertiajs/inertia-vue3";

const form = useForm({
    email: null,
    password: null,
});

const login = () => {
    form.post(route("login.store"));
};
</script>
