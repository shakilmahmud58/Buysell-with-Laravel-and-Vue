<template>
          <span v-if="this.user" >
          <span v-if="this.x" class="badge badge-danger">{{this.x}}</span>
          <span v-else></span>
          </span>
          <span v-else></span>  
</template>

<script>
import {bus} from '../app';
    export default {
        created(){
            bus.$on('bus',(data)=>{
                this.x=data;
            })
        },
        props:['user'],
        mounted(){
         
        },
        updated(){
        
        },
        data(){
            return{
              x:'',
            }

        },
        methods:{
         
       }
    }
</script>
<style scoped>
span{
}
</style>