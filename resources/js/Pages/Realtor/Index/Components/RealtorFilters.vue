<template>
    <form>
        <div class="mb-4 mt-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center gap-2">
                <input
                    id="deleted"
                    v-model="filterForm.deleted"
                    type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                />
                <label for="deleted">Deleted</label>
            </div>

            <div class="flex flex-nowrap items-center gap-2">
                <input
                    id="drafts"
                    v-model="filterForm.drafts"
                    type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                />
                <label for="drafts">Drafts</label>
            </div>

            <div class="flex flex-nowrap items-center gap-2">
                <select class="input-filter-l w-24">
                    <option>Added</option>
                    <option>Price</option>
                </select>
                <select class="input-filter-r w-32">
                    <option>Cheapest</option>
                </select>
            </div>
        </div>
    </form>
</template>

<script setup>
import { reactive, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { debounce } from "lodash";

const sortLabels = {};

const filterForm = reactive({
    deleted: false,
    drafts: false,
});

watch(
    filterForm,
    debounce(
        () =>
            Inertia.get(route("realtor.listing.index"), filterForm, {
                preserveState: true,
                preserveScroll: true,
            }),
        1000
    )
);
</script>
