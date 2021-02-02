<template>
           <div>
                <form class="form-group" enctype="multipart/form-data" v-on:submit="submitit">
                  Product Name: <input class="form-control" type="text" name="name" v-model="name">
                  Color: <input class="form-control" type="text" name="color" v-model="color">
                  Description: <input class="form-control" type="text" name="description" v-model="des">
                  Price: <input class="form-control" type="number" name="price" v-model="price">
                  <input type="file" name="image" @change="imagechange"> </br></br>
                  <button class="btn btn-success" type="submit">Update</button>
                  <button class="btn btn-warning" @click="cancelit">Cancel</button>
                 </form>
           </div>
</template>

<script>
import {bus} from '../app';
    export default {
        props:['data'],
        mounted()
        {

        },
        data(){
           return{
               name: this.data.name,
               color:this.data.color,
               des: this.data.description,
               price:this.data.price,
               image:null,      
           }
        },

        methods:{
         submitit(e){
           e.preventDefault();
           let data = new FormData();
           data.append('image',this.image);
           data.append('name',this.name);
           data.append('color',this.color);
           data.append('des',this.des);
           data.append('price',this.price);
           data.append('pid',this.data.id);
           axios.post('/productupdate', data).then(res=>{
               bus.$emit('update');
           })
         },
         imagechange(e){
             this.image= e.target.files[0];
             console.log(this.image);
         },
        cancelit(){
               bus.$emit('cancel');
           },
        }
    }
</script>