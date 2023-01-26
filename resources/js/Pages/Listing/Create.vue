<template>
    <form @submit.prevent="create">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="label">Beds</label>
                <input v-model.number="form.beds" type="text" class="input" />
                <InputError :form="form"></InputError>
            </div>

            <div class="col-span-2">
                <label class="label">Baths</label>
                <input class="input" v-model.number="form.baths" type="text" />
                <InputError :form="form"></InputError>
            </div>

            <div class="col-span-2">
                <label class="label">Area</label>
                <input class="input" v-model.number="form.area" type="text" />
                <InputError :form="form"></InputError>
            </div>

            <div class="col-span-4">
                <label class="label">City</label>
                <input class="input" v-model="form.city" type="text" />
                <InputError :form="form"></InputError>
            </div>

            <div class="col-span-2">
                <label class="label">Post Code</label>
                <input class="input" v-model="form.code" type="text" />
                <InputError :form="form"></InputError>
            </div>

            <div class="col-span-4">
                <label class="label">Street</label>
                <input class="input" v-model="form.street" type="text" />
                <InputError :form="form"></InputError>
            </div>

            <div class="col-span-2">
                <label class="label">Street Nr</label>
                <input
                    class="input"
                    v-model.number="form.street_nr"
                    type="text"
                />
                <InputError :form="form"></InputError>
            </div>

            <div class="col-span-6">
                <label class="label">Price</label>
                <input class="input" v-model.number="form.price" type="text" />
                <InputError :form="form"></InputError>
            </div>
            <div class="col-span-6">
                <button class="btn-primary" type="submit">Create</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import InputError from "@/components/InputError.vue";

const form = useForm({
    beds: 0,
    baths: 0,
    area: 0,
    code: null,
    city: null,
    street: null,
    street_nr: null,
    price: 0,
});

const create = () => form.post(route("listing.store"));
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
