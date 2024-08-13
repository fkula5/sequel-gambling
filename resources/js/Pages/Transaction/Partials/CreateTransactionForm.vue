<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import NumberInput from "@/Components/NumberInput.vue";
import {useForm} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import SelectInput from "@/Components/SelectInput.vue";

const form = useForm({
    amount: 0,
    type: '',
});

const createTransaction = () => {
    form.post(route('transactions.store'), {
        onFinish: () => form.reset('amount', 'type'),
    });
}
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Tranzakcja</h2>

            <p class="mt-1 text-sm text-gray-600">
                Update your account's profile information and email address.
            </p>
        </header>

        <form class="mt-6 space-y-6" @submit.prevent="createTransaction">
            <div>
                <InputLabel for="amount" value="Ilość"/>

                <NumberInput id="amount" v-model="form.amount" class="mt-1 block w-full" required/>

                <InputError :message="form.errors.amount" class="mt-2"/>
            </div>

            <div>
                <InputLabel for="type" value="Typ"/>

                <SelectInput v-model="form.type" class="mt-1 block w-full" required>
                    <option value="withdrawal">Wypłata</option>
                    <option value="deposit">Wpłata</option>
                </SelectInput>

                <InputError :message="form.errors.type" class="mt-2"/>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Wykonaj tranzakcje</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Wykonaj tranzakcje</p>
                </Transition>
            </div>
        </form>
    </section>
</template>

