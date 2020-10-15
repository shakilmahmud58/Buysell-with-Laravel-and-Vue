<template>
   <div>
    <div v-bind:class="{back:true}">
     <p v-for="(message,index) in messages" v-bind:class="{from:getclass(message.from),to:getclassto(message.from)}">{{message.text}}{{ message.from }}</p>
     </div><br><br>
     <div class=text>
     <form v-on:submit=submitit action="/getmessage" method="POST">
        <label for ="text"></label>
        <input class="box" v-model="text" size="50" type="text" id="text" name="text">
        <button type="submit" class="btn btn-success">Send</button>  
      </form> 
      </div>
   </div>
</template>
<script>

   export default{
 
    props:['to'],  
    data(){
       return{
          text:'',
          messages:[] 
       };
    },
    mounted(){
       this.getall();
    },
    methods:{ 
       getclass(x){
          if(x!=this.to)
          return true;
          else
          return false;
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
           .then((response)=>{
              this.messages.push(response.data);
              this.text ='';
              
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
   overflow-y:scroll;
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

form{

  position:absolute;
  bottom:0px;
  right:50px
}
.box{
border:none;
border-bottom:2px solid cadetblue;

}
</style>