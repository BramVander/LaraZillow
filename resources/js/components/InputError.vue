<template>
    <div v-if="form.errors.price" class="input-error">
        {{ form.errors.price }}
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

defineProps({
    form: Object,
});
</script>
