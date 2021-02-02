<template>
           <div>
               <form class="form-group" v-on:submit="submitit">
                  <input class="form-control" type="text" name="name" v-model="review">
                  <button class="btn btn-sm btn-success" type="submit">Update</button>
                  <button class="btn btn-sm btn-warning" @click="cancelit">Cancel</button>
                 </form>
           </div>
</template>

<script>
import {bus} from '../app';
    export default {
        props:['data'],
        mounted()
        {
         console.log(this.data);
        },
        data(){
           return{
              review:this.data.reviews,
              id:this.data.id,
           }
        },

        methods:{
          submitit(e){
           e.preventDefault();
           axios.post('/reviewupdate',{text:this.review,id:this.id}).then(res=>{
               bus.$emit('updateit');
           })
         },
        cancelit(){
               bus.$emit('cancelit');
           },   
        }
    }
</script>