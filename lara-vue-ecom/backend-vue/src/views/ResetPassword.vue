
<template>

        <GuestLayout title="Set new password">
        <form class="space-y-6" action="#" method="POST">
          <div>
            <label for="new-password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
            <div class="mt-2">
              <input id="new-password" name="password" type="password" required="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="New Password" />
            </div>
          </div>

          <div class="mt-2">
            <label for="password-repeat" class="block text-sm font-medium leading-6 text-gray-900">Repeat Password</label>
            <input id="password-repeat" name="password_repeat" type="password" required="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Repeat Password" />
          </div>
          <div class="flex items-center justify-between">
            <div class="text-sm">

                <router-link :to="{name: 'login'}" class="font-semibold text-indigo-600 hover:text-indigo-500">Go Back To Login</router-link>
                </div>

         </div>


          <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
          </div>
        </form>
    </GuestLayout >
  </template>
  <script setup>
    //import {LockClosedIcon} from '@heroicons/vue/solid'
    import GuestLayout from '../components/GuestLayout.vue';
</script>

<style scoped>

</style>
