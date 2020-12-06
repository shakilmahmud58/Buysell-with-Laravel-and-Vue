<template>
           <div>
               <input type='text' size='40' v-model='itemname' placeholder="Search...">
               <div v-for="name in names">
                 <p>{{name}}</p>
               </div>
            </div>
</template>

<script>

    export default {
        updated() {
            this.getnames(this.itemname);
        },
        data(){
            return{
                itemname:'',
                names:[]
            }

        },
        methods:{
            getnames(x){
              axios.post('/productname',{name:this.itemname})
              .then(res=>{
                  this.names=res.data;
              })
            },
       }
    }
</script>