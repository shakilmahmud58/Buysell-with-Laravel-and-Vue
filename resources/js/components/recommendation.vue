<template>
           <div>
		         <div v-for="data in datas">
                   <div class="card bg-light">
			         <div class="card-body" style="height:50px;padding:12px">
                          	    <p><span style="font-weight:bold"></span><a :href="'/product'+ data.buysell.id">{{ data.buysell.name }}</a></p>
                     
                     </div>
                    </div><br>
                 </div>            
            </div>
</template>

<script>
    export default {
        mounted(){
             this.getdata();
        },
        updated() {    

        },
        data(){
          return{
              datas:[],

          }
        },
        methods:{
            getdata(){
               axios.get('/recommendation').then(res=>{
                   this.datas = res.data;
               })
           },
           
       }
    }
</script>