<template>
<div>
  <!-- <div v-show="loading ==true">
        <tile  loading= loading ></tile>
    </div> -->
     <div class="container" v-show="loading == false" >
       
        <NavMenu></NavMenu>
       
   <div class="single-item">
  <div class="left-set">

     <img v-if="product.image" :src="'storage/products/' + product.image" alt="Profile Photo" style="width:200px">
  </div>
  <div class="right-set">
    <div class="name"></div>
    <div class="subname" style="font-size: 20px ; margin-bottom:12px">{{product.name}}</div>
    <div class="price" style="color:red"> ${{ formatPrice(product.price)}}</div>
    <div class="description">
    <p>
    {{product.descripsion}}
    </p>
    </div>
    <button  @click="addtocart(product)">ADD TO CART</button>

    </div>
  
</div>
   <div style="    position: absolute;
    top: 75%; margin-top:10px">
        <ProductList/>     
      </div>
    </div>
</div>
   
</template>

<script>


import NavMenu from "./NavMenu.vue"
import ProductList from "../Home/ProductList"

    export default {
data () {
            return {
               id:this.$route.params.id,  
               product:[],
               loading: true,
            }
        },

        mounted() {
          axios.get('http://localhost:8080/product-detail/'+this.id).then((data)=>{
              this.product= data.data
               this.loading = false
          })
            
        },
         methods:{
           addtocart(product)
            {
               window.EventBus.$emit('addtocart',product); 
            },
               formatPrice(value) {
                    let val = (value/1).toFixed(0).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                },
           
        },
       components:{
           NavMenu,
           ProductList
          
       }
    }
    
    
  
</script>
<style >



.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}
body {
  height: 100vh;
  font-family: 'Roboto', sans-serif;
}
.single-item {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  width: 670px;
	max-width: 100%;
  border: solid 6px pink;
  border-radius: 20px;
  background: white;
  box-shadow: 10px 30px 50px -20px rgba(0, 0, 0, 0.1);
  box-sizing: border-box;
}
.left-set,
.right-set {
  position: relative;
  width: 50%;
  height: 100%;
}
.left-set {
  float: left;
	height: 450px;
	width: 320px;

	margin-top: -50px;
}
.left-set img {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  width: 300px;
  height: 300px;
}
.right-set {
  float: right;
  padding: 2rem 1rem;
  box-sizing: border-box;
}
.right-set .name,
.right-set .subname {
  font-weight: bold;
}
.right-set .name {
  font-size: 1.4rem;
  line-height: 2rem;
}
.right-set .subname {
  font-size: 0.8rem;
  line-height: 1rem;
}
.right-set .price {
  padding: 1rem 0;
  font-size: 2rem;
  font-weight: bold;
}
.right-set .description p {
  font-size: 0.9rem;
  text-align: justify;
  -webkit-hyphens: auto;
      -ms-hyphens: auto;
          hyphens: auto;
}
.right-set .color {
  margin: 1rem 0;
}
.right-set .color:after {
  content: "";
  display: block;
  clear: left;
}
.right-set .color ul li {
  width: 20px;
  height: 20px;
  border: solid 2px #aaa;
	list-style: none;
  border-radius: 4px;
  float: right;
	left: -20px;
  margin-right: 0.4rem;
  cursor: pointer;
  transition: all 0.4s ease;
}
.right-set .color ul li:nth-child(1) {
  background: #a6121e;
	margin-right: 40px;
}
.right-set .color ul li:nth-child(1):hover {
  border-color: #a6121e;
}
.right-set .color ul li:nth-child(2) {
  background: azure;
}
.right-set .color ul li:nth-child(2):hover {
  border-color: azure;
}
.right-set button {
  width: 70%;
  height: 40px;
	margin-top: 50px;
  border-radius: 20px;
	border: none;
  background: #f1c40f;
	color: white;
}



</style>