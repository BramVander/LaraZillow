<template>
    <div>
        <ListingAddress :listing="listing"></ListingAddress>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import ListingAddress from "../../components/ListingAddress.vue";

defineProps({
    listing: Object,
});
</script>
