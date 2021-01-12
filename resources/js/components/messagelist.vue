<template>
   <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
             <div class="card-header">Message List</div>
             <div  class="card-body" id="body">
               <div v-for="message in messages"  class="ok"><a :href='`/message/${message.user.id}`'><div id="msg"> {{message.user.username}}</div></a></div>
             </div>
         </div>
        </div>
      </div>
   </div>
</template>

<script>

    export default {
        props:['userid'],
        mounted(){
            this.getname();            
        },
        updated(){
            Echo.private('App.User.'+this.userid)
               .notification((notification)=>{
                   this.getname(); 
               });

        
        },
        data(){
            return{
                user:'',
                messages:[],
                
            }
        },
        methods:{
           getname(){
              axios.get('/example')
                .then(res=>{
                    this.user=res.data.user;
                    this.messages=res.data.message;
                    
                });
           }, 
           getunreadmsg(x){
               let y;
               axios.get('/get'+x)
               .then(res=>{
                   if(res.data!=0)
                   y=true;
                   else 
                   y=false;
               })
               return y;
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