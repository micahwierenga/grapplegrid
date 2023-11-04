<script setup>
import { computed } from 'vue';

const props = defineProps({
    cell: Object,
});

const selectionBackground = computed(() => {
    return !props.cell.is_header && props.cell.selection.name
        ? props.cell.selection.is_correct
            ? 'bg-green-300'
            : 'bg-red-300'
        : '';
});
</script>

<template>
    <div
        v-if="cell.is_header"
        class="flex items-center justify-center w-20 sm:w-36 md:w-48 h-24 sm:h-36 md:h-48 border text-center"
    >
        {{ cell.category_name }}
    </div>
    <div
        v-else
        :class="selectionBackground"
        class="flex items-center justify-center w-20 sm:w-36 md:w-48 h-24 sm:h-36 md:h-48 border text-center"
    >
        {{ cell.selection.name ?? '' }}
    </div>
</template>