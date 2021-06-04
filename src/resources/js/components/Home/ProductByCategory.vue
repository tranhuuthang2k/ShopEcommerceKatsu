<template>
    <div class="container">
        <div class="row justify-content-center">
                      
                     <nave-menu> </nave-menu>
        
                    <CategoryProduct> </CategoryProduct>
      <div class="arrival-block single-img-demos"> 
        <!-- <HotProductList/> -->
		
      <div class="item" v-for="product in products" :key="product.id"> 
          <!-- Images --> 
          <img class="img-1" :src="'storage/products/' + product.image" alt=""> 
          <!-- Overlay  -->
          <div class="overlay"> 
            <!-- Price --> 
            <span class="price"><small>$</small>{{product.price}}</span>
            <div class="position-center-center"> 
                <a href="#"  @click="addtocart(product)" data-lighter="">          
                     <img class="img-1" src="https://th.bing.com/th/id/Rf54a9fa055d4ceec553b51ece7a3d0a2?rik=HyvaX4dCYexl4w&riu=http%3a%2f%2fwww.francescoalbani.com%2fmateriale%2fcart_icon.png&ehk=qnVj0LWoc4HfyerFMSsissFkA9TdjZVr%2fgQKbJnr07I%3d&risl=&pid=ImgRaw" alt=""> 

                    </a> </div>
          </div>
          <!-- Item Name -->
          <div class="item-name"> <a  v-bind:href="'/'+ product.id" >{{product.name}}</a>
            <p>{{product.descripsion}}</p>
          </div>
        </div>

      </div>
        </div>
          <div v-show="products.length ==0">
                 
          
                  <Order> </Order>
          </div>
              

    </div>
    
</template>

<script>
import NaveMenu from "./NavMenu.vue"
import CategoryProduct from "./Category_Product"
import Order from "./Order"
    export default {
        data () {
            return {
                products:[],
               
            }
        },

        mounted() {
                
                window.EventBus.$on('getcategory',(category)=>{
                          axios.get('/api/category/'+category.id)
                            .then( response=> {
                                this.products = response.data;
                                
                            });
                    
                });
        },
        methods:{
           addtocart(product)
            {
               window.EventBus.$emit('addtocart',product); 
            },
           
           
        },
        components:{
        NaveMenu,
        CategoryProduct,
        Order,

    }
      
    }
</script>

<style >
  .card-body-product 
  {
      display: flex;
     justify-content: center;
 
  }
      img {
    width: 100%;
    height: auto;
    transition: all ease-in-out ;
}
 
.img {
    width: 300px;
    height: 225px;
    position: relative;
   text-align: center;
    overflow: hidden;
}
 
.txt {
    width: 100%;
    height: 29%;
background-color: rgb(33 150 243 / 43%);
    position: absolute;
    bottom:50px;
    text-align: center;
    color: white;
    box-sizing: border-box;
    line-height:10px;
    opacity: 0;
}
.img:hover div.txt {
    opacity: 1;
    transform: translateY(50px);
    transition:ease-in-out 0.5s;
}
 
.img:hover img {
    transform: translateY(-34px);
    transition: all ease-in-out 0.5s;
 
 
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}
.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.heading
{
    margin: 0 auto;
    margin-bottom: 80px;
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: center;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.heading h4 {
    font-weight: bold;
    color: #2d3a4b;
    font-size: 26px;
    margin: 0px;
    margin-bottom: 20px;
    letter-spacing: 5px;
    display: flex;
    justify-content: center;
    margin-top: 3.5rem;
    text-transform: uppercase;
}
.heading span {
    display: inline-block;
    width: 50%;
    font-size: 14px;
    line-height: 24px;
    letter-spacing: 0.1px;
    text-align: center;
    color: #666666;
    font-family: 'Playfair Display', serif;
}
.arrival-block {
	display: flex;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
}
.arrival-block .item {
	position: relative;
	width: 25%;
	float: left;
	overflow: hidden;
	border-right: 1px solid #d1d5db;
	border-bottom: 1px solid #d1d5db;
	border-left: 1px solid #d1d5db;
	border-top: 1px solid #d1d5db;

}
.arrival-block .overlay {
	background: rgba(255,255,21,0.75);
	position: absolute;
	height: 100%;
	width: 100%;
	left: 0px;
	top: 0px;
	opacity: 0;
	-webkit-transition: 0.4s ease-in-out;
	-moz-transition: 0.4s ease-in-out;
	-ms-transition: 0.4s ease-in-out;
	-o-transition: 0.4s ease-in-out;
	transition: 0.4s ease-in-out;
}
.arrival-block .item:hover .overlay {
	opacity: 1;
}
.arrival-block .overlay a {
    height: 50px;
    width: 50px;
    display: inline-block;
    border-radius: 14%;
    text-align: center;
    line-height: 50px;
    color: #fff;
}
.arrival-block .price {
	position: absolute;
	right: 20px;
	top: -50px;
	font-size: 18px;
	font-weight: bold;
	z-index: 9;
	color: #2d3a4b;
	-webkit-transition: 0.4s ease-in-out;
	-moz-transition: 0.4s ease-in-out;
	-ms-transition: 0.4s ease-in-out;
	-o-transition: 0.4s ease-in-out;
	transition: 0.4s ease-in-out;
}
.arrival-block .price small {
	font-size: 12px;
	display: inline-block;
	vertical-align: top;
}
.arrival-block .item:hover .price {
	top: 20px;
}
.arrival-block .overlay a:hover {
	color: #52594a;
}
.arrival-block .item img {
	width: 100%;
	margin-top: 0px;
	top: 0px;
	left: 0px;
	position: relative;
	-webkit-transition: 0.4s ease-in-out;
	-moz-transition: 0.4s ease-in-out;
	-ms-transition: 0.4s ease-in-out;
	-o-transition: 0.4s ease-in-out;
	transition: 0.4s ease-in-out;
}
.arrival-block .item:hover .img-1 {
	left: 0%;
	position: relative;
  transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */

}
.arrival-block .item .img-2 {
	position: absolute;
	left: 100%;
}
.arrival-block .item:hover .img-2 {
	left: 0px;
}
.arrival-block .item-name {
	position: absolute;
	bottom: 0px;
	padding-top: 100px;
	padding-bottom: 30px;
	width: 100%;
	text-align: center;
	z-index: 9;
	background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#ffffff', GradientType=0 ); /* IE6-9 */
}
.arrival-block .item-name p {
	font-family: 'Playfair Display', serif;
	font-size: 14px;
	margin: 0px;
}
.arrival-block .item-name a {
	font-size: 22px;
	font-weight: bold;
	letter-spacing: 3px;
	color: #2d3a4b;
	text-transform: uppercase;
}
.arrival-block .item-name a:hover {
	-webkit-transition: 0.4s ease-in-out;
	-moz-transition: 0.4s ease-in-out;
	-ms-transition: 0.4s ease-in-out;
	-o-transition: 0.4s ease-in-out;
	transition: 0.4s ease-in-out;
	text-decoration: overline !important;
}
.position-center-center {
	left: 50%;
	position: absolute;
	top: 50%;
	-webkit-transform: translate(-50%, -50%);
	-moz-transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
}
.price {
    color: #FFFFFF;
    line-height: 20px;
}
</style>