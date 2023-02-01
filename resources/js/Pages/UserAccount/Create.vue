<template>
    <form @submit.prevent="register">
        <div class="w-1/2 mx-auto">
            <div>
                <label class="label" for="name">Your name</label>
                <input
                    id="name"
                    v-model="form.name"
                    class="input"
                    type="text"
                />
                <div class="input-error" v-if="form.errors.name">
                    {{ form.errors.name }}
                </div>
            </div>
            <div class="mt-4">
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
                <label class="label" for="password_confirmation"
                    >Confirm password</label
                >
                <input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    class="input"
                    type="password"
                />
            </div>
            <div class="mt-4">
                <button class="btn-primary w-full" type="submit">
                    Create Account
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const register = () => form.post(route("user-account.store"));
</script>
