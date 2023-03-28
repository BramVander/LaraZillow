<template>
    <div class="flex flex-col-reverse md:grid grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
            <div v-if="listing.images.length" class="grid grid-cols-2 gap-1">
                <img
                    v-for="image in listing.images"
                    :key="image.id"
                    :src="image.src"
                    style="width: 350px; height: 200px"
                />
            </div>

            <div v-else class="w-full text-center font-medium text-gray-500">
                No images
            </div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header> Basic info </template>
                <Price
                    :price="listing.price"
                    class="text-2xl font-bold"
                ></Price>
                <ListingSpace :listing="listing" class="text-lg"></ListingSpace>
                <ListingAddress
                    :listing="listing"
                    class="text-gray-500"
                ></ListingAddress>
            </Box>
            <Box>
                <template #header>Monthly Payment</template>
                <div>
                    <label class="label"
                        >Interest rate ({{ interestRate }}%)</label
                    >
                    <input
                        v-model.number="interestRate"
                        type="range"
                        min="0.1"
                        max="30"
                        step="0.1"
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                    />

                    <label class="label">Duration ({{ duration }} yrs)</label>
                    <input
                        v-model.number="duration"
                        type="range"
                        min="3"
                        max="35"
                        step="1"
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                    />

                    <div class="text-gray-600 dark:text-gray-300 mt-2">
                        <div class="text-gray-400">Your monthly payment</div>
                        <Price :price="monthlyPayment" class="text-3xl"></Price>
                    </div>

                    <div class="mt-2 text-gray-500">
                        <div class="flex justify-between">
                            <div>Total paid</div>
                            <div>
                                <Price
                                    :price="totalPaid"
                                    class="font-medium"
                                ></Price>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>Principal paid</div>
                            <div>
                                <Price
                                    :price="listing.price"
                                    class="font-medium"
                                ></Price>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>Interest paid</div>
                            <div>
                                <Price
                                    :price="totalInterest"
                                    class="font-medium"
                                ></Price>
                            </div>
                        </div>
                    </div>
                </div>
            </Box>

            <MakeOffer
                :listing-id="listing.id"
                :price="listing.price"
            ></MakeOffer>
        </div>
    </div>
</template>

<script setup>
import MakeOffer from "@/Pages/Listing/Show/Components/MakeOffer.vue";
import Box from "@/components/UI/Box.vue";
import ListingAddress from "@/components/ListingAddress.vue";
import ListingSpace from "@/components/ListingSpace.vue";
import Price from "@/components/Price.vue";
import { ref } from "vue";

import { useMonthlyPayment } from "@/composables/useMonthlyPayment";

const interestRate = ref(2.5);
const duration = ref(25);

const props = defineProps({
    listing: Object,
});

const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(
    props.listing.price,
    interestRate,
    duration
);
</script>
