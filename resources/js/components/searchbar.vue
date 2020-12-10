<template>
           <div>
              <form v-on:submit=submitit>
               <input type='text' size='40' v-model='itemname' placeholder="Search...">
              </form> 
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
                names:[]
            }

        },
        methods:{
            submitit(){
              axios.post('/productname',{name:this.itemname})
              .then(res=>{
                  this.names=res.data;
              })
            },
       }
    }
</script>