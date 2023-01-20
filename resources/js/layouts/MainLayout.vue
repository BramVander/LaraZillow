<template>
    <header
        class="w-full bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800"
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
                <div>
                    <Link
                        :href="route('listing.create')"
                        class="text-white font-medium p-2 rounded-md bg-indigo-600 hover:bg-indigo-500"
                        >+ New Listing</Link
                    >
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4">
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
</script>
