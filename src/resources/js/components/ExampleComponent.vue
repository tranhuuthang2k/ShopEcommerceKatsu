<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Thành Viên Đang Online Trên Hệ Thống</div>

                    <div class="card-body" v-for="user in users" :key="user.id">
                        - {{user.name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script> 
    export default {
      data()
      {
             return {
                 users: [],
             }
      },
      mounted(){

            Echo.join('my-channel')
                .here((user)=> {
                    // runs when you join, and when anyone else leaves or joins
                   this.users = user;
                    console.log(this.users);
              })
              .joining((user)=>{
                  this.users.push(user)
              })
              .leaving((user)=>{
                  this.users.splice(this.users.indexOf(user),1)
              })

                    //    Echo.private('my-channel')
                    //     .listen('UserloginEvent', (e) => {
                    //         // console.log(e);
                    //     });
          }
    }
  
</script>

