<template>
   <div class="body" data-spy="scroll" data-target="">
    <div v-bind:class="{back:true}">
     <p v-for="(message,index) in messages" v-bind:class="{from:getclass(message.from),to:getclassto(message.from)}">{{message.text}}{{ message.from }}</p>
     </div><br><br>
     <div class=text>
     <form v-on:submit=submitit class="form-inline">
        <label for ="text"></label>
        <input class="form-control box" v-model="text" type="text" id="text" name="text" placeholder="Type your text">
        <button type="submit" class="btn">Send</button>  
      </form> 
      </div>
   </div>
</template>
<script>

   export default{
 
    props:['to','from'],  
    data(){
       return{
          text:'',
          messages:[] 
       };
    },
    mounted(){
       alert(document.body.scrollHeight);
       this.read();
       this.getall();
       this.listen();
       this.notilisten();
    },
   updated(){
      this.read();
    },
    methods:{ 
       getclass(x){
          if(x!=this.to)
          return true;
          else
          return false;
       },
       read(){
         axios.get('/readnotification'+this.to)
           .then((res)=>{
              console.log('Read it');
           });
       },
       getclassto(x){
          if(x==this.to)
          return true;
          else
          return false;
       },
        submitit(e){
           e.preventDefault();
           axios.post('/message/'+this.to,{
              text : this.text
            })
           .then((res)=>{ 
              this.text ='';
              this.messages.push(res.data);
              
          });
        },
        listen(){
             Echo.private('message_'+this.from)
              .listen('MessageSent',(data)=>{
                  this.messages.push(data.data);
                });
            },
        notilisten(){
           Echo.private('App.User.'+this.from)
            .notification((notification)=>{
               alert('New message from'+notification.data.from);
            });
        },   
        getall(){
           axios.get('/message/'+this.to +'/get')
           .then((res)=>{
              this.messages = res.data;
           })
        }
    }
 }
</script>
<style scoped>
.back{
   max-height:350px;
   overflow-y:auto;
   font-family:"Times New Roman",Times,serif;
   font-size:18px;
}
.from{
   background-color:skyblue;
   padding:10px;
   border-radius:5px;
   float:right;
   clear:both;
   display:block;
}
.to{
   background-color:white;
   padding:10px;
   border:solid grey 1px;
   border-radius:5px;
   float:left;
   clear:both;
}
.box{
   width:150px;
   box-sizing:border-box;
   border-bottom:2px solid #ccc;
   border-right:2px solid #ccc;
   border-radius:4px;
}
.box:focus{
   
   width:85%;
   color:black;

}
.btn{
   
   border-radius:4px;
   background-color:#ccc;
   font-weight:bold;
   color:black;
}
</style>