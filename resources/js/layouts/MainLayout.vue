<template>
    <Link href="/">Main page</Link>
    <Link href="/hello">Show page</Link>
    <div>Page with time {{ timer }}</div>

    <slot></slot>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const timer = ref(0);
setInterval(() => timer.value++, 1000);
</script>
