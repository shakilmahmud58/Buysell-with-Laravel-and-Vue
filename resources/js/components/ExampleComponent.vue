<template>
    <div>
        <span><a :href='`/message/${this.message.id}`'> {{this.message.username}}</a></span>
    </div>
</template>

<script>
    export default {
       props:['message'],
       data(){
           return {
               messages:[]
           };
       }
       
    }     
</script>
<style scoped>

</style>