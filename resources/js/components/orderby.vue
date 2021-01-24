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
                 <div v-for="data in datas">
                   <div class="card bg-light">
			         <div class="card-body" style="background-color:">
                         <div  style="display:flex; flex-wrap:wrap">
                           <div style="margin-left:40px;"> <a :href="'/product'+ data.id"><img :src="data.image" width="200px" height="210px"></a></div>
				            <div style="margin-left:40px; padding-top:20px">
							    <p><span style="font-weight:bold">Product Name : </span>{{ data.name }}</p>
								<p><span style="font-weight:bold">Available Color : </span>{{ data.color }}</p>
					
								<p><span style="font-weight:bold">Price : </span>{{ data.price }}</p>
								<p><span style="font-weight:bold">Rating : </span>{{ data.rating }}</p>
                                Uploaded By : <ExampleComponent v-bind:message="data.user"></ExampleComponent>
                          </div>
                         </div>
                     </div>
                    </div>
                 </div>            
            </div>
</template>

<script>
import ExampleComponent from './ExampleComponent.vue';
    export default {
        components:{
         ExampleComponent,
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
              orderby:'asc'
          }
        },
        methods:{
           sentdata(){
               axios.post('/getdata',{type:this.type,order:this.orderby}).then(res=>{
                   this.datas=res.data;
               })
           },
       }
    }
</script>