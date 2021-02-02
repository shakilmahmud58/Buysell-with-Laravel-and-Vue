<template>
           <div>
		    <div class="form-inline p-2 justify-content-center">
                <label for="orderby">ORDER BY</label>
                <select class="form-control" id="orderby" v-model="type">
                   <option value="created_at">Uploaded Time</option>
                   <option value="rating">Rating</option>
                   <option value="price">Price</option>
                   <option value="name">Product Name</option>
                 </select>
		         <select class="form-control" name="order" id="order" v-model="orderby">
    		       <option value="asc">ASC</option>
                   <option value="desc">DESC</option>
		         </select>
                 </div>
                 <br>
                 <div v-for="(data, index) in datas" :key="index">
                   <div class="card bg-light">
			         <div class="card-body" style="background-color:">
                         <div  style="display:flex; flex-wrap:wrap">
                           <div style="margin-left:40px;"> <a :href="'/product'+ data.id"><img :src="data.image" width="200px" height="210px"></a></div>
				            <div style="margin-left:40px; padding-top:20px">
							    <p><span style="font-weight:bold">Product Name : </span>{{ data.name }}</p>
                                <p><span style="font-weight:bold">Short Description : </span>{{ data.description }}</p>
								<p><span style="font-weight:bold">Available Color : </span>{{ data.color }}</p>
					
								<p><span style="font-weight:bold">Price : </span>{{ data.price }}</p>
								<p><span style="font-weight:bold">Rating : </span>{{ data.rating }}</p>
                                <span v-if="user">
                                   <span v-if="user!==data.user.id">
                                     Uploaded By :<ExampleComponent v-bind:message="data.user"></ExampleComponent>
                                   </span>
                                   <div v-else>
                                      <button class="btn btn-info" v-on:click="editit(data.id)">Edit</button>
                                      <button class="btn btn-danger" v-on:click="deleteit(data.id)">Delete</button>
                                      <span v-if="data.id===clickon && editform">
                                        <Panel :data="data"></Panel>
                                      </span>
                                   </div>
                                </span>
                          </div>
                         </div>
                     </div>
                    </div>
                 </div>            
            </div>
</template>

<script>
import {bus} from '../app';
import ExampleComponent from './ExampleComponent.vue';
import Panel from './controlpanel.vue';
    export default {
        components:{
         ExampleComponent,
         Panel
        },
        created(){
         bus.$on('update',()=>{
           this.editform = false;
         });
         bus.$on('cancel',()=>{
           this.editform = false;
         })
        },
        mounted(){
             this.sentdata();

        },
        updated() {
           this.sentdata();    

        },
        props:['user'],
        data(){
          return{
              datas:[],
              type:'created_at',
              orderby:'asc',
              editform:false,
              clickon:''
          }
        },
        methods:{
           sentdata(){
               axios.post('/getdata',{type:this.type,order:this.orderby}).then(res=>{
                   this.datas=res.data;
               })
           },
           editit(x){
               this.editform=true;
               this.clickon=x;
           },
           deleteit(x){
              const sure = confirm('Do you really want to delete this item');
              if(sure){
                  axios.post('/deleteitem',{id:x}).then(res=>{
                })
              }
           },
       }
    }
</script>