
<template>


        <GuestLayout title="Request New Password">
        <form class="space-y-6" action="#" method="POST">
          <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
            <div class="mt-2">
              <input id="email" name="email" type="email" autocomplete="email" required="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
          </div>

         <div class="flex items-center justify-between">
            <div class="text-sm">

                <router-link :to="{name: 'login'}" class="font-semibold text-indigo-600 hover:text-indigo-500">Remember Your Password?</router-link>
                </div>

         </div>


          <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
          </div>
        </form>
        </GuestLayout>


  </template>
  <script setup>

import GuestLayout from '../components/GuestLayout.vue';
</script>

<style scoped>

</style>
