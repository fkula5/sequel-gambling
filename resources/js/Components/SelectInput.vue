<script setup>
import {ref} from "vue";

const model = defineModel({
    required: true,
});

const input = ref(null);
</script>

<template>
    <select ref="input" v-model="model"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        <slot/>
    </select>
</template>

