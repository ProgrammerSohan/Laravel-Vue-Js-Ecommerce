<template>

    <div class="min-h-full flex">
        <!-- sidebar -->
        <div class="w-[200px] bg-blue-700">
           Sidebar

        </div>
        <!-- /sidebar -->
        <div class="flex-1">
            <header class="h-8 shadow bg-white">
                Header
            </header>

           <!-- content -->
           <main>
            <router-view></router-view>

          </main>
           <!--/ content -->

        </div>

        </div>

</template>
<script setup>
/*
export default {
    name:'AppLayout'

}*/

    const { title } = defineProps({
        title: String

     })
  //   const emit = defineEmits(['submit'])


</script>
<style scoped>

</style>
