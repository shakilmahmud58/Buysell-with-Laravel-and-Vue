<template>
           
</template>

<script>
import {bus} from '../app';
    export default {
        created(){
            axios.get('/notify')
             .then((res)=>{
                      bus.$emit('bus',res.data);
             });
        },
        mounted() {
            this.notilisten();
            
        },
        updated() {

        },
        props:['user','message'],
        data(){
            return{

            }

        },
        methods:{
            notilisten(){
              Echo.private('App.User.'+this.user)
               .notification((notification)=>{
                  axios.get('/notify')
                       .then((res)=>{
                      bus.$emit('bus',res.data);
                       });
                       
            });
        },        
           
       }
    }
</script>