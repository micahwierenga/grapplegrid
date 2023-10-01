<script setup>
import { ref, computed } from 'vue'
import { Dialog, DialogPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'

const props = defineProps({
    open: {
        type: Boolean,
        default: false,
    },
    wrestlers: Array,
});

const emit = defineEmits(['toggleSearchModal', 'selectWrestler']);

const isVisible = ref(false);
const selectedWrestler = ref(null);
const searchQuery = ref('');

const filteredWrestlers = computed(() => {
    const query = searchQuery.value.toLowerCase();

    return query === ''
        ? props.wrestlers
        : props.wrestlers.filter(wrestler => {
            return Object.values(wrestler).some(word => {
                return String(word).toLowerCase().includes(query);
            });
        });
});

function selectItem(wrestler) {
    selectedWrestler.value = wrestler;
    isVisible.value = false;
}

function handleToggleSearchModal() {
    emit('toggleSearchModal');
}

function emitSelectedWrestler() {
    emit('selectWrestler', selectedWrestler.value.slug);
}
</script>

<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="handleToggleSearchModal">
            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>
    
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild
                        as="template"
                        enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100"
                        leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <DialogPanel
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-7/12 sm:max-w-lg"
                        >
                            <section
                                :class="isVisible ? 'h-80' : 'h-20'"
                                class="py-5 px-6 transition-all duration-200 ease-linear"
                            >
                                <div
                                    @click="isVisible = !isVisible"
                                    :class="isVisible ? 'rounded-t rounded-b-none' : 'rounded'"
                                    class="flex justify-between items-center h-10 py-1 px-2 border-2 border-solid border-gray-300 text-base font-normal"
                                >
                                    <span v-if="selectedWrestler">
                                        {{ selectedWrestler.name }}
                                    </span>
                                    <span v-else>
                                        Select Wrestler
                                    </span>
                                    <svg
                                        :class="isVisible ? 'rotate-180' : 'rotate-0'"
                                        class="transition-all duration-400 ease-linear"
                                        xmlns="http://www.w3.org/2000/svg"
                                        view-box="0 0 24 24"
                                        width="24"
                                        height="24"
                                    >
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M12 10.828l-4.95 4.95-1.414-1.414L12 8l6.364 6.364-1.414 1.414z"
                                        ></path>
                                    </svg>
                                </div>
                                <div
                                    :class="isVisible ? 'max-h-96 visible' : 'invisible'"
                                    class="flex flex-col items-center py-2 pr-4 pl-2 bg-white border-2 border-solid border-gray-300 border-t-0 overflow-hidden transition-all duration-100 ease-linear"
                                >
                                    <div class="w-full pr-2">
                                        <input
                                            v-model="searchQuery"
                                            type="text"
                                            placeholder="Search"
                                            class="w-full h-7 mt-0 mr-0 mb-2 ml-2 pl-2 border-2 border-solid border-gray-300 text-base"
                                        />
                                    </div>
                                    <span v-if="filteredWrestlers.length === 0">
                                        No Wrestlers Found
                                    </span>
                                    <div class="w-full">
                                        <ul class="max-h-48 pl-2 list-none overflow-y-scroll overflow-x-hidden text-left">
                                            <li
                                                @click="selectItem(wrestler)"
                                                v-for="(wrestler, i) in filteredWrestlers"
                                                :key="`wrestler-${i}`"
                                                class="w-full p-2 bg-gray-100 border border-solid border-gray-300 text-xs cursor-pointe hover:bg-gray-500 hover:text-white hover:font-bold"
                                            >
                                                {{ wrestler.name }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto" @click="emitSelectedWrestler">Select</button>
                                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" @click="handleToggleSearchModal" ref="cancelButtonRef">Cancel</button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
