<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import DangerButton from "@/Components/DangerButton.vue";

defineProps({auth: Object})

const form = useForm({});

const deleteTransaction = (transactionId) => {
    if (confirm("Czy jesteś pewny, że chcesz usunąć tranzakcje?")) {
        form.delete(route('transactions.destroy', transactionId));
    }
}
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
            <div class="flex gap-5">
                <Link :href="route('transactions.create')">Wykonaj akcje</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Bilans konta</h2>

                            <p class="mt-1 text-md text-gray-600">
                                {{ auth.user.balance }} zł
                            </p>
                        </header>
                    </section>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Wpłaty</h2>

                            <p class="mt-1 text- text-gray-600">
                                Pieniądze wpłacone na konto.
                            </p>
                        </header>

                        <ul>
                            <li v-for="deposit in auth.user.transactions.deposits" :key="deposit.id"
                                class="flex justify-between my-1 items-center">
                                {{ deposit.amount }} zł {{ deposit.date }}r.
                                <DangerButton :class="{ 'opacity-25': form.processing }"
                                              :disabled="form.processing" @click="deleteTransaction(deposit.id)">
                                    Usuń tranzakcje
                                </DangerButton>
                            </li>
                        </ul>
                    </section>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Wypłaty</h2>

                            <p class="mt-1 text-md text-gray-600">
                                Pieniądze wypłacone z konta.
                            </p>
                        </header>
                        <ul>
                            <li v-for="withdrawal in auth.user.transactions.withdrawals" :key="withdrawal.id"
                                class="flex justify-between my-1 items-center">
                                {{ withdrawal.amount }} zł {{ withdrawal.date }}r.
                                <DangerButton :class="{ 'opacity-25': form.processing }"
                                              :disabled="form.processing" @click="deleteTransaction(withdrawal.id)">
                                    Usuń tranzakcje
                                </DangerButton>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
