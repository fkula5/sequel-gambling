<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateTransactionForm from "@/Pages/Transaction/Partials/CreateTransactionForm.vue";
import {Head} from "@inertiajs/vue3";
</script>

<template>
    <Head title="Tranzakcje"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tranzakcje</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <CreateTransactionForm class="max-w-xl"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
