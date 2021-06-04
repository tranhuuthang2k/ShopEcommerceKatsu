<template>
<div>
      <nav class="nav">
                       
                            <h2 class="nav__header"><a style="text-decoration: none; color: red;" href="http://localhost:8080/">SHOP KATSU</a> </h2>              

                            <a  class="btn blue"  href="/category"> Danh Mục Sản Phẩm</a>
                                                          

                            <div class="nav__cart">
                            <button  @click="showCart = !showCart"  class="button button2">
                                 Giỏ Hàng của bạn
                            
                            </button>
                            <div    v-show="showCart" class="cart-dropdown">

                              <CartList></CartList>
                            </div>
                          
                            </div>
                             
        
        </nav>
         <!-- <slider></slider> -->

    </div>    
</template>
<script>
// import slider from"./Slider.vue"
import CartList from "./CartList.vue"
export default {


     data () {
            return {
                 cartproducts:[],
                 showCart : false,
                 totalcart: 0,
                //  categories:[],
            }
        },
        methods:{
        },

         mounted(){
         },

    components:{
           CartList,
          //  slider,
       },
     
}

</script>

<style >

.btn {
  cursor: pointer;
  border-radius: 5px;
  text-decoration: none;
  padding: 5px;
  font-size: 20px;
  transition: .3s;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -o-transition: .3s;
  display: inline-block;
}

.btn:hover {
  cursor: url(http://cur.cursors-4u.net/symbols/sym-1/sym46.cur), auto;
}
.blue {
  color: #55acee;
  border: 2px #55acee solid;
}


.nav {
    align-items: center;
    color: white;
    display: flex;
    justify-content: space-between;
    padding: 2rem;
    height: 1px;
    box-shadow: 2px 2px 12px rgba(191, 171, 171, 0.22);
}
.nav__header {
  color: #8a1313;
}
.button {
    padding: 5px 1px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

.button2 {
    background-color: white;
    color: black;
    border: 2px solid #0a0a0a;
    border-radius: 10px;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

</style>