<template>
    <header
        class="w-full bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900"
    >
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div
                    class="text-xl font-bold text-center text-indigo-600 dark:text-indigo-300"
                >
                    <Link :href="route('listing.index')">LaraZillow</Link>
                </div>
                <div class="flex items-center gap-4" v-if="user">
                    <Link
                        :href="route('realtor.listing.index')"
                        class="text-sm text-gray-500"
                    >
                        {{ user.name }}
                    </Link>
                    <Link :href="route('listing.create')" class="btn-primary"
                        >+ New Listing</Link
                    >
                    <div>
                        <Link
                            :href="route('logout')"
                            method="DELETE"
                            as="button"
                            >Logout</Link
                        >
                    </div>
                </div>
                <div v-else class="flex items-center gap-2">
                    <Link :href="route('user-account.create')">Register</Link>
                    <Link :href="route('login')">Sign in</Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 w-full">
        <div
            v-if="flashSuccess"
            class="mb-4 p-2 border rounded-md shadow-sm border-green-200 bg-green-50 dark:bg-green-600 dark:border-green-900"
        >
            {{ flashSuccess }}
        </div>
        <slot></slot>
    </main>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

// page.props.value.flash.success
const page = usePage();
const flashSuccess = computed(() => page.props.value.flash.success);
const user = computed(() => page.props.value.user);
</script>
