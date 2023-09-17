<script setup>
import GridCell from '@/Components/GridCell.vue';

defineProps({
    cellRow: Object,
});
</script>

<template>
    <div class="flex items-center">
        <GridCell
            v-for="cell in cellRow"
            :cell="cell"
        />
    </div>
</template>
