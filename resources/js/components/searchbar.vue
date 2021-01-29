<template>
           <div id="demo">
                 <form class="form-inline">
                  <input class="form-control" size='40' type="text" placeholder="Search..." v-model="itemname" v-on:blur="blurit">
                 </form>
                  <div id="results" v-if="shown" v-for="name in names">
                     <a :href='`/product${name.id}`'><div>{{name.name}}</div></a>
                  </div>
            </div>
</template>

<script>

    export default {
        updated() {
        },
        data(){
            return{
                itemname:'',
                names:[],
                shown:false
            }

        },
        watch:{
           itemname(x,y){
               if(x!=''){
                axios.post('/productname',{name:x})
               .then((res)=>{
                   this.shown=true;
                   this.names=res.data;
                   console.log(res.data);
                 })
               }
               else
               this.shown=false;

           }
        },
        methods:{
          blurit(){
              this.shown=false;
          }
       }
    }
</script>
<style scoped>
#demo{
    position:absolute;
    border-radius:8px;
    background-color:white;
}
#results{
    padding:8px;
      
}
#results:hover{
    background-color:#d4cfcf;
}
a{
    color:black;
    text-decoration:none;
}
#results:last-child{
    margin-bottom:8px;
}
.form-control:focus{
    border-color:none;
    box-shadow:none;
}
</style>