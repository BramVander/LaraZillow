<template>
    <Box>
        <template #header>Offer Made</template>
    </Box>

    <Price :price="offer.amount" class="text-3xl"></Price>

    <section
        class="mt-2 flex flex-col md:flex-row justify-between text-gray-500"
    >
        <div>Made on</div>
        <div class="font-medium">{{ offerMadeOn }}</div>
    </section>
</template>

<script setup>
import { computed } from "vue";
import Box from "@/components/UI/Box.vue";
import Price from "@/components/Price.vue";

const props = defineProps({
    offer: Object,
});

const offerMadeOn = computed(() =>
    new Date(props.offer.created_at).toDateString()
);
</script>
