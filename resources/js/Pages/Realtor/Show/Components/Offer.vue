<template>
    <Box>
        <template #header
            >Offer #{{ offer.id }}
            <div
                v-if="offer.accepted_at"
                class="dark:bg-emerald-900 dark:text-emerald-200 bg-emerald-200 text-emerald-900 p-1 rounded-md uppercase ml-2 float-right"
            >
                Accepted
            </div>
            <span
                v-if="offer.rejected_at"
                class="dark:bg-rose-900 dark:text-rose-200 bg-rose-200 text-rose-900 p-1 rounded-md uppercase ml-2 float-right"
                >Rejected</span
            >
        </template>

        <section class="flex items-center justify-between">
            <div>
                <Price :price="offer.amount" class="text-xl" />

                <div class="text-gray-500">
                    Difference <Price :price="difference" />
                </div>

                <div class="text-gray-500 text-sm">
                    Made by {{ offer.bidder.name }}
                </div>

                <div class="text-gray-500 text-sm">Made on {{ createdAt }}</div>
            </div>

            <div>
                <Link
                    v-if="!isSold"
                    :href="route('realtor.offer.accept', { offer: offer.id })"
                    class="btn-outline text-xs font-medium"
                    as="button"
                    method="PUT"
                >
                    Accept
                </Link>
            </div>
        </section>
    </Box>
</template>

<script setup>
import Price from "@/Components/Price.vue";
import Box from "@/Components/UI/Box.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

const props = defineProps({
    offer: Object,
    listingPrice: Number,
    isSold: Boolean,
});

const difference = computed(() => props.offer.amount - props.listingPrice);

const createdAt = computed(() =>
    new Date(props.offer.created_at).toDateString()
);
</script>
