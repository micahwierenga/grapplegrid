<script setup>

defineProps({
    cell: Object|String,
});
</script>

<template>
    <div class="flex items-center justify-center w-20 sm:w-36 md:w-48 h-24 sm:h-36 md:h-48 border">
        {{ cell && cell.hasOwnProperty('selection') ? cell.selection : cell }}
    </div>
</template>