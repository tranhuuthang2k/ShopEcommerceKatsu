<template>
<div>
    <div class="categorymenu">
              <ul class="menu" v-for="category in categories" :key="category.id">
                <li><a  @click="getcategory(category)" >{{category.name}}</a></li>
     
             </ul>

         
    </div>
   <h1 v-show="title.length !==0" ref="title" >Danh Mục : {{this.title}} </h1> 
</div>
   
   
</template>
<script>


export default {


     data () {
            return {
                 categories:[],
                 title : '',
            }
        },
        methods:{
          getcategory(category)
            {
                 this.$refs.title = category.name;
                 this.title=this.$refs.title;
                 window.EventBus.$emit('getcategory',category); 
            
            },
        },

         mounted(){

                axios.get('/api/categorylist' )
            .then( response=> {
                this.categories = response.data;
            }); 
         },

    components:{
         
       },
     
}

</script>

<style >
.categorymenu{
  display: flex;
  justify-content: center;
  box-shadow: 2px 2px 12px rgba(191, 171, 171, 0.18);
}

.menu, .menu ul{
    list-style: none;
    margin: 0;
    padding: 0;
    font-size: 17px;


}
.menu{
    position: relative;
}
.menu ul{
    height: 0;
    left: 0;
    overflow: hidden;
    position: absolute;
    top: 42px;
}
.menu li{
    float: left;
    position: relative;
}
.menu li a{
    border: 1px solid transparent;
    display: block;
    line-height: 20px;
    padding: 10px 20px;
    text-decoration: none;
    cursor: pointer;
}
.menu li:hover > a{
    background: #FF6103;
    color: #FFF;
}
.menu li:hover ul.subs{
    height: auto;
    width: 130px;
}
.menu ul li{
    width: 100%;
}
.menu ul li a{
    background-color: #00688B;
    border-top: 1px solid #ffffff;
    color: #fff;
    line-height: 1px;
    padding: 5px 20px;
}
.menu li:hover ul li a{
    line-height: 22px;
}
</style>