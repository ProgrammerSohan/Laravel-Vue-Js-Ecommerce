<template>

    <div class="w-[200px] bg-indigo-700 text-white py-4 px-2">

        <router-link :to="{name: 'app.dashboard'}"
        class="flex items-center py-1 px-2 rounded transition-colors hover:bg-black/30 font-light">
            <span class="mr-2 text-gray-300">
                <HomeIcon class="w-5" />
            </span>
            <span class="text-sm">
                Dash of Sohan
            </span>
        </router-link>


     </div>

</template>
<script setup>
//import {HomeIcon} from '@heroicons/vue/solid';
import {HomeIcon} from '@heroicons/vue/outline';

</script>
<style scoped>

</style>
