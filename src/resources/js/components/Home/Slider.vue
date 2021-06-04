<template>
<div  v-show="loading === true" style="margin-top:10px">
    <div id="slider">
      <div  id="slideholder"  v-for="(slider) in sliders" :key="slider.id" >
                <img v-if="slider.image" :src="'storage/images/'+ sliders[active-1].image"   >  
      </div>
      <div class="button-click">
          <button @click="prev()" class="btn-next">prev</button>
           <button @click="next()" class="btn-prev">Next </button>

      </div>
     </div>
    <div id="total">
      <div id="indicators" >
          <div v-for="(dot,index) in TotalSlide" :key="index"  @click="jump(index) "     
              :class="{ active: ++index === active }"
           >
          </div>
  
      </div>
  </div>
</div>  
</template>

<script>
export default {
      data () {
            return {
                TotalSlide:[],
                sliders:[],
                active:1,
                loading:false
            }
        },
created () {
    setInterval(() => {
      if(this.active === this.TotalSlide )
    {
      this.active=0
    }
    this.active +=1
    
    }, 3000)
},
 mounted() {
 
            console.log('Component mounted.');
                axios.get('/api/slide')
            .then( response=> {
                // handle success
                this.sliders = response.data;
                this.TotalSlide=this.sliders.length;
                this.loading=true;
            });
        },
         methods: {
           jump(index) {
                 this.active =index;
                //  alert(index)
                // console.log(ok)
                  // console.log(this.$refs.OK);
            }, 
           next()
           {   
               if( this.active === this.TotalSlide)
               {
                  this.active =0
               }
                 this.active +=1

           } ,
           prev()
           {
                if( this.active === 1)
               {
                  this.active = this.TotalSlide
               }
               else
               {
                    this.active -=1
               }
              

           }
         }


}
</script>

<style>
.active{
   background: #ebebeb;
}

#slider
{   
    margin-top: 10px;
    width: 961px;
      height: 341px;
    border: 1px solid #ebebeb;
    position: relative;
    margin: 0px auto;
    overflow: hidden;

}
/* slideholder */
#slideholder
{
    width: 3000px;
    position: absolute;
    top: 0;
    left: 0;
    transition: left 0.5s ease-in;
    display: inline-table;
     z-index: -1;
     box-shadow: #95afc0;
}
#slideholder> img
{
      width: 961px;
      height: 341px;
      border: 1px solid green;
      display: inline-block;
}
#indicators {

    z-index: 1;
    text-align: center;
    margin-top: -28px;
    position: relative;


}
#indicators div
{
    width: 10px;
    height: 10px;
    border-radius: 50% ;
    border: 1px solid #ebebeb;
    display: inline-block;
    margin: 0px auto;
    margin-left: 5px;
}



#total
{
    width: 500px;
    /* height: 500px; */
    margin: 0px auto;
}
.button-click
{
   
    display: none;
}
.btn-next,.btn-prev{
    background: #95afc0;
    border: none;
    width: 50px;
    height: 50px;
    color: white;
    cursor: pointer;

}
#slider:hover > .button-click
{
    display: block;
    display: flex;
    justify-content: space-between;
    margin-top: 15%;
    
}
</style>