<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { headerNavItems, footerNavItems, supportNavItems } from '@/constants/navItems.js';
import Banner from '@/Components/Banner.vue';
import GridRow from '@/Components/GridRow.vue';

defineProps({
    banner: {
        type: Object,
    },
    cells: {
        type: Object,
    },
});
</script>

<template>
    <Head title="Grid" />
    
    <div class="bg-gray-50 dark:bg-gray-900 min-h-screen min-w-max flex flex-col items-center justify-center text-gray-800 dark:text-white font-sr">
        <!-- Banner -->
        <Banner
            :banner="banner"
        />
        <!-- Navbar -->
        <div class="px-4 w-full pt-4 flex justify-between items-center font-bold text-xl font-display uppercase tracking-wide">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="h-10 md:h-8">
                <path fill="#59d185" d="M16 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2zm13 0a2 2 0 0 1-2 2h-6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2zm13 0a2 2 0 0 1-2 2h-6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2zM16 27a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2zm13 0a2 2 0 0 1-2 2h-6a2 2 0 0 1-2-2v-6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2zm13 0a2 2 0 0 1-2 2h-6a2 2 0 0 1-2-2v-6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2zM16 40a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2zm13 0a2 2 0 0 1-2 2h-6a2 2 0 0 1-2-2v-6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2zm13 0a2 2 0 0 1-2 2h-6a2 2 0 0 1-2-2v-6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2z" font-family="none" font-size="none" font-weight="none" style="mix-blend-mode:normal;" text-anchor="none" transform="scale(5.33333)"></path></svg>
                <div class="ml-2 hidden md:inline dark:text-white">Grapple Grid</div>
            </div>
            <div class="flex items-center">
                <!-- Desktop nav -->
                <div class="hidden lg:flex mr-10">
                    <div class="flex items-center justify-center space-x-6 sm:space-x-8 text-sm sm:text-lg normal-case font-normal flex-wrap w-screen lg:w-auto px-4 lg:px-0">
                        <Link
                            v-for="(navItem, i) in headerNavItems"
                            :key="i"
                            :href="navItem.url"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >{{ navItem.text }}</Link
                        >
                    </div>
                </div>
                <!-- Social -->
                <a href="https://twitter.com/ImmaculateGrid" target="_blank" class="rounded-full hover:bg-gray-300 dark:hover:bg-gray-700 p-1.5 -m-1.5 mr-2 transition-colors duration-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Go to Twitter">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="h-5 w-5 md:h-7 md:w-7 text-gray-600 dark:text-gray-300">
                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                        </path>
                    </svg>
                </a>
                <button class="rounded-full hover:bg-gray-300 dark:hover:bg-gray-700 p-1.5 -m-1.5 mx-0.25 sm:mx-1 md:mx-2 transition-colors duration-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" title="Show Game Summary Modal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-5 w-5 md:h-7 md:w-7 text-gray-600 dark:text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z">
                        </path>
                    </svg>
                </button>
                <button class="rounded-full hover:bg-gray-300 dark:hover:bg-gray-700 p-1.5 -m-1.5 ml-2 md:mr-4 transition-colors duration-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" title="Show Instructions Modal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-5 w-5 md:h-7 md:w-7 text-gray-600 dark:text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="lg:hidden mt-4">
            <!-- Mobile nav -->
            <div class="flex items-center justify-center space-x-6 sm:space-x-8 text-sm sm:text-lg normal-case font-normal flex-wrap w-screen lg:w-auto px-4 lg:px-0">
                <Link
                    v-for="(navItem, i) in headerNavItems"
                    :key="i"
                    :href="navItem.url"
                    class="router-link pb-1 mb-1"
                    >{{ navItem.text }}</Link
                >
            </div>
        </div>
        <GridRow
            v-for="cellRow in cells"
            :cell-row="cellRow"
        />
        <!-- Footer -->
        <footer class="border-t dark:border-gray-950 bg-white dark:bg-gray-800 text-gray-900 text-sm w-screen py-6 flex justify-center mt-8 flex-shrink-0">
            <div class="text-center max-w-5xl px-4 sm:px-6 pb-24">
                <!-- Main links -->
                <div class="flex flex-wrap justify-center space-x-6 sm:space-x-8">
                    <Link
                        v-for="(navItem, i) in footerNavItems"
                        :key="i"
                        :href="navItem.url"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >{{ navItem.text }}</Link
                    >
                </div>
                <!-- Support links -->
                <div class="mt-4 flex flex-wrap justify-center space-x-6 sm:space-x-8 text-xs">
                    <Link
                        v-for="(navItem, i) in supportNavItems"
                        :key="i"
                        :href="navItem.url"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >{{ navItem.text }}</Link
                    >
                </div>
                <!-- Legal -->
                <div class="px-4 text-xs text-gray-400 mt-4">
                    Please note: Grapple Grid does not blah, blah, blah.
                </div>
            </div>
        </footer>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
