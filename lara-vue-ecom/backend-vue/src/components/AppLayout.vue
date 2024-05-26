<template>

    <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

          Part Of The Layout!!
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <router-view></router-view>

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
