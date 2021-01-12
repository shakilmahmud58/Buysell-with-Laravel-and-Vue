<template>
    
        <span><a :href='`/message/${this.message.id}`'> {{this.message.username}}</a></span>
</template>

<script>
    export default {
       props:['message'],
       created(){

       },
       mounted(){
       },
       updated(){

       },
       data(){
           return {
           };
       },
       methods:{
       }
       
    }     
</script>
<style scoped>

</style>