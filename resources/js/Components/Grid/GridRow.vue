<script setup>
import GridCell from '@/Components/Grid/GridCell.vue';

defineProps({
    cellRow: Object,
});

const emit = defineEmits(['selectCellData']);

function handleToggleSearchModal(cellData, key) {
    emit('selectCellData', { categories: cellData.categories, key });
}
</script>

<template>
    <div class="flex items-center">
        <GridCell
            v-for="(cell, i) in cellRow"
            :cell="cell"
            @click="handleToggleSearchModal(cell, i)"
        />
    </div>
</template>
