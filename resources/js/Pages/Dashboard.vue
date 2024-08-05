<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';

defineProps({user: Object})
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Bilans konta</h2>

                            <p class="mt-1 text-md text-gray-600">
                                {{ user.balance }} zł
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
                    </section>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Wpłaty</h2>

                            <p class="mt-1 text-md text-gray-600">
                                Pieniądze wpłacone na konto.
                            </p>
                        </header>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
