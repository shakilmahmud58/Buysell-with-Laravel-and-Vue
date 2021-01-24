<template>

<div class="body" >
     <div ref="demo" class="back" >
        <p v-for="(message,index) in messages" v-bind:class="{from:getclass(message.from),to:getclassto(message.from)}">{{message.text}}{{ message.from }}</p>
     </div><br>
     <div class="text">
     <form v-on:submit="submitit" class="form-inline">
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
       this.scrollto();
       this.scrolltolast();
       this.read();
       this.getall();
       this.listen();
       this.notilisten();
    },
   updated(){
      this.read();
      this.scrolltolast();
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
            });
        },
        scrollto(){
          
        },
        scrolltolast(){
            this.$refs.demo.scrollTop=this.$refs.demo.scrollHeight;
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
p{
   margin:1px;
   max-width:70%;
}
.back{
   max-height:300px;
   overflow-y:auto;
   font-family:"Times New Roman",Times,serif;
   font-size:18px;
}
.from{
   background-color:skyblue;
   padding:3px;
   margin-bottom:10px;
   margin-top:10px;
   padding-left:10px;
   padding-right:10px;
   border-radius:5px;
   float:right;
   clear:both;
   display:block;
}
.to{
   background-color:white;
   padding:3px;
   padding-left:10px;
   padding-right:10px;
   border:solid grey 1px;
   border-radius:5px;
   float:left;
   clear:both;
}
.box{
   width:85%;
   box-sizing:border-box;
   border-bottom:2px solid #ccc;
   border-right:2px solid #ccc;
   border-radius:4px;
}

.btn{
   
   border-radius:4px;
   background-color:#ccc;
   font-weight:bold;
   color:black;
}
</style>