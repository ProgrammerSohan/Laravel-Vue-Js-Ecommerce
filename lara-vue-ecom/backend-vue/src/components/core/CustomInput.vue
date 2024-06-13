<template>

</template>
<script setup>
import {computed} from "vue";

const props = defineProps({
    modelValue: [String, Number, File],
    label: String,
    type: {
        type: String,
        default: 'text'
    },
    name: String,
    required: Boolean,
    prepend: {
        type: String,
        default: ''
    },
    append:{
        type: String,
        default: ''

    }
})

const inputClasses = computed(()=>{
    const cls = [`block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm`,];

   if(props.append && !props.prepend) {
        cls.push(`rounded-l-md`)
   }else if(props.prepend && !props.append){
     cls.push(`rounded-r-md`)
   }else if(!props.prepend && !props.append){
     cls.push('rounded-md')
   }
   return cls.join(' ')

})

const emit = defineEmits(['update:modelValue','change'])


</script>
<style scoped>

</style>
