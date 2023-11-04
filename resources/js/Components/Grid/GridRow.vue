<script setup>
import GridCell from '@/Components/Grid/GridCell.vue';

defineProps({
    cellRow: Object,
});

const emit = defineEmits(['selectCellData']);

function handleToggleSearchModal(cellData, key) {
    if (!cellData.is_header && !cellData.selection.name) {
        emit('selectCellData', { categorySlugs: cellData.category_slugs, key });
    }
}
</script>

<template>
    <div class="flex items-center">
        <GridCell
            @click="handleToggleSearchModal(cell, i)"
            v-for="(cell, i) in cellRow"
            :cell="cell"
            :class="!cell.is_header && !cell.selection.name ? 'cursor-pointer' : ''"
        />
    </div>
</template>
