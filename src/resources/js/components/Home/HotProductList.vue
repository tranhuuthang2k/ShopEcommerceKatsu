<template>
<div>
    <div v-show="loading ==false">
        <tile  loading= loading ></tile>
    </div>
	 <div v-show="loading==true" class="container"> 
            <!-- Main Product Population -->
             <div class="heading text-center">
             <h4>popular products</h4>
             <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. 
               Sed feugiat, tellus vel tristique posuere, diam</span> 
            </div>
                       
            </div>
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
    
</template>

<script>
    export default {
        
        data () {
            return {
                products:[],
					 loading:false,

            }
        },
         
        mounted() {
            console.log('Component mounted.');
                axios.get('/api/hot-product')
            .then( response=> {
                // handle success
                this.products = response.data;
                this.loading =true
             });

        },
        methods:{
          addtocart(product)
            {       
               window.EventBus.$emit('addtocart',product); 
            },
        },
       
    }
    
</script>
<style >

</style>