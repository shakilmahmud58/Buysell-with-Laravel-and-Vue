<template>
          <span v-if="this.user">{{this.x}}</span>
          <span v-else></span>  
</template>

<script>

    export default {
        props:['user'],
        created(){
           
            },
        mounted(){
           axios.get('/countunread')
                    .then(res=>{
                      this.x = res.data
                    })
            Echo.private('App.User.'+this.user)
               .notification((notification)=>{
                    axios.get('/countunread')
                    .then(res=>{
                      this.x = res.data
                    })
                });
              

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