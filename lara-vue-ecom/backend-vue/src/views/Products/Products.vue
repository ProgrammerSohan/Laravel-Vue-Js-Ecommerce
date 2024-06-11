<template>
   <!--   <pre>{{products.data}}</pre> -->
     <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Products</h1>
        <button type="submit"
        class="flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
>
Add new Product
</button>
 </div>

 <ProductModal />
  <ProductsTable />
 </template>



<script setup>
import ProductsTable from './ProductsTable.vue';
import ProductModal from './ProductModal.vue';

/*
import {computed, onMounted, ref} from "vue";
import store from "../../store/index.js";
//import Spinner from "../../components/core/Spinner.vue";
import {PRODUCTS_PER_PAGE} from "../../constants.js";
//import TableHeaderCell from "../../components/core/Table/TableHeaderCell.vue";

const perPage = ref(PRODUCTS_PER_PAGE)
const search = ref('')
const products = computed(()=>store.state.products)
const sortField = ref('updated_at')
const sortDirection = ref('desc')*/

/*
onMounted(()=>{
    getProducts();
})*/
/*
function getProducts(url = null){
    store.dispatch('getProducts',{
        url,
        sort_field: sortField.value,
        sort_direction: sortDirection.value,
        search: search.value,
        perPage: perPage.value

    })
}
*/
/*
function getForPage(ev, link){
    if(!link.url || link.active){
       // ev.preventDefault();
       return

    }
    getProducts(link.url)

}

function sortProduct(field){
    //debugger;
    if(sortField.value == field){
        if(sortDirection.value == 'asc'){
        sortDirection.value = 'desc';
    }else {
        sortDirection.value = 'asc';
    }
     }else {
         sortField.value = field;
        sortDirection.value = 'asc'
    }

    getProducts();
}*/

</script>
<style scoped>

</style>
