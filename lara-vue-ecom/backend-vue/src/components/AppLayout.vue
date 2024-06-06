<template>

    <div v-if="currentUser.id" class="min-h-full bg-gray-200 flex">
        <!-- sidebar -->
        <Sidebar :class="{'-ml-[200px]': !sidebarOpened}"/>
        <!-- /sidebar -->
        <div class="flex-1">
            <Navbar @toggle-sidebar="toggleSidebar"> </Navbar>

           <!-- content -->
           <main class="p-6">
          <!--  <router-view v-if="currentUser.id"></router-view> -->
           <router-view></router-view>

          </main>
           <!--/ content -->

        </div>

        </div>

        <div v-else class="min-h-full bg-gray-200 flex items-center justify-center">
          <Spinner />

        </div>

</template>
<script setup>
import {ref,computed, onMounted, onUnmounted} from 'vue';
import Sidebar from "./Sidebar.vue";
import Navbar from "./Navbar.vue";
import store from '../store';
import Spinner from "./core/Spinner.vue";



    const { title } = defineProps({
        title: String

     })

  const sidebarOpened = ref(true);
  const currentUser = computed(()=> store.state.user.data);

  //   const emit = defineEmits(['submit'])
  function toggleSidebar(){
   // console.log("toggleSidebar");
    sidebarOpened.value = !sidebarOpened.value

  }

  onMounted( () => {
    store.dispatch('getUser')
    handleSidebarOpened();
    window.addEventListener('resize', handleSidebarOpened)

  })

  onUnmounted(()=>{
    window.removeEventListener('resize', handleSidebarOpened);

  });

 function handleSidebarOpened(){
    /*
    if(window.outerWidth <768){
        sidebarOpened.value = false
    } else {
        sidebarOpened.value = true
    }
*/
    sidebarOpened.value = window.outerWidth > 768;

 }


</script>
<style scoped>

</style>
