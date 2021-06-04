
<template>
     <div>
		      <input type="text" class="search" v-model="search" placeholder="Search product.."/>
			
			 <!-- <slider v-show="!search" ></slider>  -->
          <HotProductList  v-show="!search">  </HotProductList>
 
		
		    <div v-show="loading" class="container"> 
            <!-- Main Product Population -->
             <div class="heading text-center">
             <h4>NEW ARRIVAL</h4>
             <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
               Sed feugiat, tellus vel tristique posuere, diam</span> 
            </div>
                         
            </div>
		<div class="arrival-block single-img-demos"> 
      <div class="item" v-for="product in productss" :key="product.id"> 
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
          <div class="item-name"> <a  v-bind:href="'/'+ product.id">{{product.name}}</a>
            <p>{{product.descripsion}}</p>
          </div>
        </div>

      </div> 
		    <div  v-show="loading"> <About/> </div>        

		</div>
      
    
</template>

<script>
import About from '../General/About'
import slider from"./Slider.vue"
import HotProductList from './HotProductList'
    export default {
        
        data () {
            return {
                products:[],  
					 loading:false,
					 search:''
            }
        },

        mounted() {
                axios.get('/api/product')
               .then( response => {
                this.products = response.data;
					 this.loading= true
            });
            
        },
        methods:{
            addtocart(product)
            {
              
               window.EventBus.$emit('addtocart',product); 
            },
           
           
        },
		           computed: {
        productss() {
      return this.products.filter(post => {
        return post.name.toLowerCase().includes(this.search.toLowerCase())
      })
    }
  },
		  components:{

        About,
		  slider,
		  HotProductList,
		  

    }
      
    }
</script>

<style >
.search
{
	    position: absolute;
		 left: 25%;
       right: 25%;
		 top: 20px;
		 z-index: 9999;
}
input[type=text] {
    border: 1px solid #ccc;  
padding: 10px;	 
  }
.arrival-block {
    /* border-top: 1px solid #d1d5db; */
    /* border-left: 1px solid #d1d5db; */
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