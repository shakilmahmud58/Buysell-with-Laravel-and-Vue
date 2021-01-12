<template>
          <span v-if="this.user">{{this.x}}</span>
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