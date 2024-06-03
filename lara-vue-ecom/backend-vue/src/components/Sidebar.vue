<template>

    <div class="w-[200px] transition-all bg-indigo-700 text-white py-4 px-2">

        <router-link :to="{name: 'app.dashboard'}"
        class="flex items-center p-2 rounded transition-colors hover:bg-black/30 mb-2">
            <span class="mr-2 text-gray-300">
                <HomeIcon class="w-5" />
            </span>
            <span class="text-lg">
                Dash of Sohan
            </span>
        </router-link>

        <router-link :to="{name: 'app.dashboard'}"
        class="flex items-center p-2 rounded transition-colors hover:bg-black/30 mb-2">
            <span class="mr-2 text-gray-300">
                <ViewListIcon class="w-5" />
            </span>
            <span class="text-lg">
               Products
            </span>
        </router-link>

        <router-link :to="{name: 'app.dashboard'}"
        class="flex items-center p-2 rounded transition-colors hover:bg-black/30 mb-2">
            <span class="mr-2 text-gray-300">
                <UsersIcon class="w-5" />
            </span>
            <span class="text-lg">
                Users
            </span>
        </router-link>

        <router-link :to="{name: 'app.dashboard'}"
        class="flex items-center p-2 rounded transition-colors hover:bg-black/30 mb-2">
            <span class="mr-2 text-gray-300">
                <ChartBarIcon class="w-5" />
            </span>
            <span class="text-lg">
               Reports
            </span>
        </router-link>


     </div>

</template>
<script setup>
//import {HomeIcon} from '@heroicons/vue/solid';
import {HomeIcon, UsersIcon, ViewListIcon, ChartBarIcon} from '@heroicons/vue/outline';

</script>
<style scoped>

</style>
