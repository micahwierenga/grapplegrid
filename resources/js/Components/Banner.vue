<script setup>

defineProps({
    banner: {
        type: Object,
        default: {},
    },
});
</script>

<template>
    <div class="p-2 sm:p-3 bg-yellow-100 w-screen text-center text-gray-800 text-xs sm:text-sm">{{ banner.introText }}
        <a :href="banner.url" class="text-blue-600 underline">{{ banner.mainText }}</a>!
    </div>
</template>