<template>
           <div>
                <div v-for='(item,index) in items'><input v-on:change="changeit(item.id)" type="checkbox" :name="item.name" :value="item.name" v-model="selectitem" checked> {{item.name}}</div>
                <form method="POST" v-on:submit="submitit">
                   <input type='text' :id='value' v-model="itemname">
                   <button type='submit'>Add {{value}}</button>
                </form>
                {{itemname}}
                {{ selectitem }}
            </div>
</template>

<script>

    export default {
       props:['value'],
        mounted() {
            console.log(this.value);
        },
        data(){
            return{
                items:[],
                selectitem:[],
                itemname:''
            }

        },
        methods:{
            submitit:function(e){
                e.preventDefault();
                axios.post('/admin',{itemname:this.itemname}).then((res)=>{
                    console.log(res.data);
                    this.items.push(res.data);
                    this.itemname='';
                });
            },
            changeit:function(x){
                axios.post('/update',{data:x}).then((res)=>{
                    console.log(res.data);
                });
            },
            getit:function(){
                axios.get('/getit').then((res)=>{
                    this.items=res.data;
                });
            },
            getselected:function(){
                axios.get('/getselected').then((res)=>{
                    this.selectitem=res.data;
                });
            }
        },
        mounted(){
            this.getit();
            this.getselected();
        }
    }
</script>