<template>
    <div class="container">
        <Menu>  </Menu>
        <NavMenu></NavMenu>
        <Order> </Order>
   
    </div>
</template>

<script>

import Menu from "../General/Menu.vue"
import NavMenu from "./NavMenu.vue"
import Order from "./Order.vue"

    export default {

       components:{
           Menu,
           NavMenu,
           Order,
       }
    }
    
    
  
</script>
