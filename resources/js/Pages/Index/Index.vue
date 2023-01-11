<template>
    <div>Index</div>
    <Link href="/hello">Show page</Link>
    <div>The message is {{ message }}</div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    message: String,
});
</script>
