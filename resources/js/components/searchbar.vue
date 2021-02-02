<template>
           <div id="searchbar" >
                 <form class="form-inline">
                  <input id="form" class="form-control" size='40' type="text" placeholder="Search..." v-on:keyup="changeit"  v-on:blur="blurit">
                 </form>
                 <div  v-if="shown">
                  <div id="results" v-for="(name , index) in names" v-on:mouseleave="leaveit" v-on:click="clickit(name.name)" v-on:mouseover="overit(name.name)" :key="index">
                     <a :href='`/search/${name.name}`'><div>{{name.name}}</div></a>
                  </div>
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
                shown:false,
                x:''
            }

        },
        watch:{
               
        },
        methods:{
            clickit(x){
              document.getElementById('form').value=x;
              this.shown=false;
            },
            changeit(e){
              var x = e.target.value;
              this.itemname=x;
              if(x!=''){
                axios.post('/productname',{name:x})
                 .then((res)=>{
                    this.shown=true;
                    this.names=res.data;
    
                 })
              }
              else{
                  this.shown=false;
              }
              
            },
            leaveit(x){
              document.getElementById('form').value=this.itemname;
            },
          overit(x){
              document.getElementById('form').value=x;
          },

          blurit(){
            setTimeout(()=>{this.shown=false;},500)
          },
       }
    }
</script>
<style scoped>
#searchbar{
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