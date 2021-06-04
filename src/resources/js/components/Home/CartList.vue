<template>

    <div  class="tableCartProduct"    >

              <div class="checkcart"  v-show="cartproducts.length == 0">   <p>Bạn chưa có sản phẩm  <br> nào trong giỏ ....</p> </div>
         <div v-show="cartproducts.length !== 0">
                <table class="CartProductList" v-show=" verified ==false" border="1" >
                <tr>
                    <th>Tên Sản Phẩm</th>
                     <th>Hình ảnh</th>
                     <th>Mô Tả</th>
                    <th>Giá</th>
                    <th style="width: 20%;">Số Lượng</th>
                   <th></th>
                   
                </tr>
                <tr  v-for="(cartproduct) in cartproducts" :key="cartproduct.id">
                    <td>{{cartproduct.name}}</td>
                    
                      <td>
                          <img v-if="cartproduct.image" :src="'storage/products/' + cartproduct.image" alt="Profile Photo" style="width:100px">
                     </td>
                      <td>{{cartproduct.descripsion}}</td>
                    <td>{{formatPrice(cartproduct.price)}}</td>
                      <td>
                          <button  @click="updateCart(cartproduct, 'subtract')" class="btn" >-</button>
                               {{ cartproduct.quality}}
                          <button  @click="updateCart(cartproduct, 'add')"  class="btn">+</button>
                       </td>
                    <td><button style="background: #d63031" @click="deletecartproduct(cartproduct)" >Xóa</button></td>
                  
                     
                </tr>
                 <tr>
                     <td style="text-align: start" colspan="6">Tổng Giá Trị Đơn Hàng  : ${{formatPrice(totalOrder)}} </td>
                   
                 </tr>
                <button style="background: #fdcb6e"  @click="verified = true">THANH TOÁN</button>
                </table>
               
         </div>
          <div class="checkout" v-show="verified ">
          <div class="api-calling">
            <h2> Nhập Thông Tin Thanh Toán </h2>
            <div class="create-form">
                <div class="product-name-input">
                    <label for="">Họ Tên: </label>
                    <input type="text"  style=" margin-left: 23px;    margin-bottom: 3px;" v-model="inforpay.name">
                </div>
                <div class="product-name-input">
                    <label for="">Địa chỉ: </label>
                      <input type="text" style="  margin-left: 25px; margin-bottom: 2px;" v-model="inforpay.address">
                </div>
                  <div class="product-name-input">
                    <label for="">Gmail: </label>
                      <input type="text" style="margin-left: 32px;margin-bottom: 3px;" v-model="inforpay.gmail">
                </div>
                 <div class="product-name-input">
                      <label for="">Điện Thoại: </label>
                      <input type="text" v-model="inforpay.phone">
                </div>
                 <h5 v-for="cartproduct in cartproducts" :key="cartproduct.id"><strong>SL : {{ formatPrice(cartproduct.quality) }}</strong> - {{ cartproduct.name }}<span style="padding-left: 10px;">{{ formatPrice(cartproduct.price * cartproduct.quality) }} $</span></h5>
                <p>___________________________________________</p>
                <h5>Tổng  : ${{formatPrice(totalOrder)}} </h5>
                <div class="button-create">
                    <button @click="createProduct">OK</button> <span><button @click="verified =false">Trở Về</button></span>
                </div>
        </div>
    </div>
    </div>
    </div>
</template>
<script>
export default {
   
     data () {
            return {
                cartproducts:[],
                 totalOrder:0,  
                  verified: false,
                  inforpay: {
                    name: '',
                    address:'',
                    phone:'',
                    gmail:'',
                   
                }
                   
         
            }
        },  
   mounted()
    {
  
         
             if(localStorage.getItem('products'))
             {
                  this.cartproducts = JSON.parse(localStorage.getItem('products'));
             }

        window.EventBus.$on('addtocart',(product)=>{
     
         if(this.cartproducts.indexOf(product) !==-1)
                {
                 this.$alert(" sản phẩm này  đã có trong giỏ hàng");
                   return;
                }

               
               this.$fire({
                    type: 'success',
                    title: 'Đã Thêm Sản Phẩm vào giỏ hàng',
                    text: 'Nhấn Vào Giỏ Hàng của bạn để kiểm tra',
                    }).then(r => {
                    console.log(r.value);
                    });    
            this.cartproducts.push(product);
            this.saveCats();
            
        });
              
        
    },

    methods:{
      formatPrice(value) {
        let val = (value/1).toFixed(0).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    },

         deletecartproduct(cartproduct)
            {
                var indexP =this.cartproducts.indexOf(cartproduct);
                this.cartproducts.splice(indexP,1);
                //  console.log(this.cartproducts.length);
                this.saveCats();
                
            },
             calCart()
            {
               let totalOrder=0;
               this.cartproducts.forEach( (product) => {
                   totalOrder += product.price * product.quality;
                   console.log(totalOrder);
               });
               this.totalOrder = totalOrder;
        
            },
             updateCart(cartproduct, updateType)
             {
                  for (let i = 0; i < this.cartproducts.length; i++)
                  {
                        if (this.cartproducts[i].id === cartproduct.id)
                        {
                          if (updateType === 'subtract')
                          {
                              if (this.cartproducts[i].quality > 1)
                              {
                                    this.cartproducts[i].quality--;
                                    console.log('-');
                              }
                          }
                          else {
                                  this.cartproducts[i].quality++;
                                     console.log('+');
                                }
                           break;      
                        }
                  }
                  this.saveCats();
             },
              saveCats() {
                const parsed = JSON.stringify(this.cartproducts);
                localStorage.setItem('products', parsed);
             },
             createProduct() {
              if(!this.inforpay.name && !this.inforpay.address && !this.inforpay.phone && !this.inforpay.gmail )
              {
                this.$alert('Thông Tin thanh toán không được để trống');
                  this.verified = false;
                return;
              }
                axios.post('/checkout', 
                {
                    name: this.inforpay.name,
                    address:  this.inforpay.address,
                    phone:  this.inforpay.phone,
                    gmail: this.inforpay.gmail,
                    productOrders : JSON.stringify(this.cartproducts),
                   
                })
                .then(response => {
           
                    this.$fire({
                    type: 'success',
                    title: 'Đặt Hàng Thành Công',
                    }).then(r => {
                       window.location ='/'
                    });    
                  localStorage.clear();
                  this.inforpay ="";
                  this.verified = false;
                  this.cartproducts ="";

                })
                .catch(error => {
                    console.log(error)
                })
            }
             
    },
       watch: {
        cartproducts: {
            handler(){
             this.calCart();
             
            }, 
            deep: true,
            immediate:true,
        },
     }
        
}
</script>
<style>
.checkcart{
    z-index: 100;
    background: #fff;
    padding: 8px 17px;
    position: absolute;
    right: 30px;
    box-shadow: 2px 2px 6px 0 rgba(0, 0, 0, 0.3);
    color: red;
}
.checkout {
    background: #fff;
    box-shadow: 1px 1px 6px 0 rgb(0 0 0 / 30%);
    top: 25%;
    padding: 84px -26px;
    color: red;
    z-index: 1;
    position: absolute;
    width: 55%;
    right: 3px;
    left: 25%;
    padding-left: 10px;
    z-index: 9999;
    transform: scale(1.2);
    border: 1px solid #d63031;


}
  h3 {
    position: absolute;
    top: -17px;
    color: rgb(93, 73, 73);
    font-family: sans-serif;
    font-size: 17px;
    margin-left: 150px;
  }
  span {
    float: right;
  }

.CartProductList{
    width: 38%;
    text-align: center;
    margin: 0px auto;
    position: absolute;
     background: rgb(55,72,82);
    margin-left: -25px;
    /* right: auto; */
    right: 0;
    top: 130px;
    z-index: 9999 ;


}
.btn {
  transition-duration: 0.4s;
}

.btn:hover {
  background-color: #4CAF50; /* Green */
  color: white;
}
</style>