<template>
    <div id="app1">
       <h3>This is the Footer for</h3>
       <span v-for="friend in friends">{{friend}}</span>
       {{friends.length}}
       <button v-on:click="clickme">Click Me</button>
    </div>
</template>

<script>
    export default {
        props:{
            friends:{
                type:Array,
                required:true
            }
        },
        mounted() {
            console.log('Component mounted footer.')
        },
        methods:{
            clickme:function(){
               this.$emit('clickme','you clicked the button');
            }
        }

    }
</script>
<style scoped>
#app1{
    background-color:yellow;
    text-align:center;
}
</style>


mounted(){
          this.getmessages();
       },
       methods:{
            getmessages(){
                axios.get('/check')
                .then((response)=>{
                 this.messages=response.data;
            })
           .catch(function(error){
              console.log(error);
           })
         },
     
       }