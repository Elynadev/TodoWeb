<script setup>
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-red-100 pt-6 sm:justify-center sm:pt-0"
    >
        <div>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                MySECRET
            </h2>

        </div>

        <div
            class="mt-6 w-full overflow-hidden bg-red-200 px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
