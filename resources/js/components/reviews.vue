<template>
           <div>
           <form v-on:submit="submitreviews" v-if="this.userid">
                <textarea class="form-control" style="width:250px" cols="30" rows="2"  v-model="text" placeholder="Type Your Reviews"></textarea>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div v-else>
               You must have to <a href="/login">login</a> for share a review for this product
            </div>

            {{this.msg}}
               <div id="review" v-for="review in reviews">
                <p>{{review.reviews}}</p>
                <h6>...by {{review.useremail}}</h6>
               </div>
              
            </div>
</template>

<script>

    export default {
        props:['productid','userid'],
        mounted() {
           this.getreviews();
           this.listen();
           console.log(this.productid);
        },
        updated(){
         
        },
        data(){
            return{
               text:'',
               msg : '',
               reviews:[]
            }

        },
        methods:{

            submitreviews(e){
                e.preventDefault();
                axios.post("/storereviews",{review:this.text,productid:this.productid})
                .then(res=>{
                  this.text='';
                  console.log('ok'+res.data);
                })
            },
            listen(){
             Echo.channel('product'+this.productid)
              .listen('SendMessage',(data)=>{
                  console.log(data.data.reviews);
                  this.msg='';
                  this.reviews.unshift(data.data);
                })
            },
            getreviews(){
                axios.get('/getreviews/'+this.productid).then(res=>{    
                
                  if(res.data.length===0){
                      this.msg = 'No reviews available';
                  }
                  else{
                      this.reviews = res.data;
                      this.msg='';
                  }
                   
                })
            }

       }
    }
</script>
<style scoped>
#review{
    width:250px;
    border-bottom: solid black 1px;
    padding:15px;
}
h6{
    text-align:right;
}
</style>