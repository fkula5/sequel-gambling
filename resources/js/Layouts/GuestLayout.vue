<script setup></script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center bg-[#1e1e1e] items-center pt-6 sm:pt-0 ">
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg"
        >
            <div class="gap-[5px] text-center">
                <h1 class="text-white text-[34px] font-semibold  leading-[50px]">Witaj ponownie
                </h1>
                <p class="text-white text-base font-normal leading-7">Mam nadzieję, że stracisz jak
                    najwięcej pieniędzy
                </p>
            </div>
            <slot/>
        </div>
    </div>
</template>
