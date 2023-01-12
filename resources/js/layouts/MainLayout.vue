<template>
    <Link href="/">Main page</Link>
    <Link href="/listing">Listing page</Link>

    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div>
    <slot></slot>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

// page.props.value.flash.success
const page = usePage();
const flashSuccess = computed(() => page.props.value.flash.success);
</script>

<style scoped>
.success {
    color: white;
    background-color: green;
}
</style>
