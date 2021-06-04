<template>
    <div>      
            <Slider/>
             <!-- <HotProductList> </HotProductList> -->
             <ProductList> </ProductList>

    </div>
</template>
<script>
// import HotProductList from './HotProductList.vue'
import ProductList from "./ProductList.vue"
import Slider from "./Slider.vue"
export default {
    components:{
        ProductList,
        // HotProductList,
        Slider

    }
}
</script>
<style >

</style>