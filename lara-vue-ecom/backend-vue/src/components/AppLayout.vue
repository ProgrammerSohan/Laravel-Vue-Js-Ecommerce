<template>

    <div class="min-h-full bg-gray-200 flex">
        <!-- sidebar -->
        <Sidebar :class="{'-ml-[200px]': !sidebarOpened}"/>
        <!-- /sidebar -->
        <div class="flex-1">
            <TopHeader @toggle-sidebar="toggleSidebar"> </TopHeader>

           <!-- content -->
           <main class="p-6">
           <router-view></router-view>

          </main>
           <!--/ content -->

        </div>

        </div>

</template>
<script setup>
import {ref} from 'vue';
import Sidebar from "./Sidebar.vue";
import TopHeader from "./TopHeader.vue";


    const { title } = defineProps({
        title: String

     })

  const sidebarOpened = ref(true);

  //   const emit = defineEmits(['submit'])
  function toggleSidebar(){
   // console.log("toggleSidebar");
    sidebarOpened.value = !sidebarOpened.value

  }


</script>
<style scoped>

</style>
