<template>
   <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
             <div class="card-header">Notifications</div>
             <div  class="card-body" id="body">
               <div v-for="noti in reviews"  class="ok" @click="readit(noti.id)"><a :href='`/product${noti.data.data.buysell_id}`'><div id="msg">New review on product {{ noti.data.product}} by {{noti.data.name}} </div></a></div>
             </div>
         </div>
        </div>
      </div>
   </div>

</template>

<script>

    export default {
        props:['user'],
        created(){
           
            },
        mounted(){
           this.getnoti();
        },
        updated(){
            Echo.private('App.User.'+this.user)
               .notification((notification)=>{
                    axios.get('/reviewnoti')
                    .then(res=>{
                      this.reviews= res.data;
                    })
                });
        },
        data(){
            return{
                reviews:[]
            }
        },
        methods:{
         getnoti(){
            axios.get('/reviewnoti')
            .then(res=>{
                console.log(res.data);
                this.reviews = res.data;
             })
         },
         readit(x){
             axios.post('/readit',{id:x})
             .then(res=>{
            
             })
              
         }
       }
    }
</script>
<style scoped>
#msg{
    background-color:#f2f2f2;
    padding:8px;
    border-bottom:solid grey 1px;
}
#body{
    background-color:#e6e6e6;

}
a{
    color:black;
    text-decoration:none;
}
#msg:hover{
   background-color:#e6e6e6;
}
</style>