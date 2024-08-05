<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';

defineProps({auth: Object})
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
            <div class="flex gap-5">
                <button>Wpłać</button>
                <button>Wypłać</button>
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
                            <ul>
                                <li v-for="deposit in auth.deposits" :key="deposit.id">
                                    {{ deposit.amount }} zł {{ deposit.date }}
                                </li>
                            </ul>
                        </header>
                    </section>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Wpłaty</h2>

                            <p class="mt-1 text-md text-gray-600">
                                Pieniądze wpłacone na konto.
                            </p>
                            <ul>
                                <li v-for="withdraw in auth.withdraws" :key="withdraw.id">
                                    {{ withdraw.amount }} zł {{ withdraw.date }}
                                </li>
                            </ul>
                        </header>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
