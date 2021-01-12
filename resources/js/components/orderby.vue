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
			         <div class="card-body" style="height:250px;background-color:">
                           <p style="float:left;clear:both;"> <a :href="'/product'+ data.id"><img :src="data.image" width="150px" height="210px"></a></p>
				            <div style="text-align:left;margin-left:300px;border-left:solid black 1px;padding-left:15px;">
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
</template>

<script>
import ExampleComponent from './ExampleComponent.vue';
    export default {
        components:{
         ExampleComponent,
        },
        mounted(){
             this.getdata();
            console.log(this.type + this.orderby);
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
            getdata(){
               axios.post('/',{type:this.type,order:this.orderby}).then(res=>{
                   this.datas=res.data;

               })
           },
           sentdata(){
               axios.post('/getdata',{type:this.type,order:this.orderby}).then(res=>{
                   this.datas=res.data;
               })
           },
       }
    }
</script>