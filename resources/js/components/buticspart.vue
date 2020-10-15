<template>
           <div>
                <div v-for='(item,index) in items'><input v-on:change="changeit(item.id)" type="checkbox" :name="item.name" :value="item.name" v-model="selectitem" checked> {{item.name}}</div>
                <form v-on:submit='submitit'>
                   <input type='text' name='name' v-model="itemname"><br>
                   <input type='number' name='price' v-model="price"><br>
                   <input type='file' name='image' @change="changefile"><br>
                   <button type='submit'>Add Butics</button>
                </form>   
                {{itemname}}
            </div>
</template>

<script>

    export default {
        mounted() {
        },
        data(){
            return{
                items:[],
                selectitem:[],
                itemname:'',
                price:0,
                image:''
            }

        },
        mounted(){
            this.getit();
            this.getselected();
        },
        methods:{
            submitit:function(e){
                e.preventDefault();
                 var data = new FormData();
                 data.append('image',this.image);
                 data.append('itemname',this.itemname);
                 data.append('price',this.price);
                 axios.post('/buticspost',data,{ headers:{'Content-Type':'multipart/form-data'}}).then((res)=>{
                    this.items.push(res.data);
                    this.itemname='';
                }); 
                 
            },
            changeit:function(x){
                axios.post('/selectbutic',{data:x}).then((res)=>{
                    console.log(res.data);
                });
            },
             getit:function(){
                axios.get('/getbutic').then((res)=>{
                    this.items=res.data;
                });
            },
            changefile:function(e){        
                console.log(e.target.files[0])
                this.image=e.target.files[0];
            },
            getselected:function(){
                axios.get('/getselectedbutic').then((res)=>{
                    this.selectitem=res.data;
                });
            }
        }
    }
</script>