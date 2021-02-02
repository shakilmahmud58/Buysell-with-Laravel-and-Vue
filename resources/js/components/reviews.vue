<template>
           <div>
           <form v-on:submit="submitreviews" v-if="this.userid">
                <textarea class="form-control" style="width:250px" cols="30" rows="2"  v-model="text" placeholder="Type Your Reviews"></textarea>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div v-else>
               You must have to <a href="/login">login</a> for share a review for this product
            </div>
               <div v-show="msg">No reviews available </div>
               <div id="review" v-for="review in reviews">
                <p>{{review.reviews}}</p>
                <span v-if="userid==review.user_id">
                <button class="btn btn-sm btn-primary" @click="editit(review.id)">Edit</button>
                <button class="btn btn-sm btn-danger" @click="deleteitem(review.id)">Delete</button>
                </span>
                <h6 v-else>...by {{review.useremail}}</h6>
                </br>
                <reviewedit v-if="editform" :data="review"></reviewedit>
               </div>
            </div>
</template>

<script>
import {bus} from '../app';
import reviewedit from './reviewpanel.vue';
    export default {
        components:{
            reviewedit,
        },
        props:['productid','userid'],
        created(){
           bus.$on('cancelit',()=>{
               this.editform=false;
           });
           bus.$on('updateit',()=>{
               this.editform=false;
           });
        },
        mounted() { 
           this.getreviews();
           this.listen();
           console.log(this.userid);
           this.notilisten();
        },
        updated(){

            this.getreviews();
        },
        data(){
            return{
               text:'',
               msg :false,
               reviews:[],
               editform:false
            }
        },
        methods:{
            submitreviews(e){
                e.preventDefault();
                axios.post("/storereviews",{review:this.text,productid:this.productid})
                .then(res=>{
                  this.text='';
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
            notilisten(){
               Echo.private('App.User.'+this.userid)
                  .notification((notification)=>{
                      console.log(notification.type);
              });
            },
            getreviews(){

                axios.get('/getreviews/'+this.productid).then(res=>{  
                   if(res.data.length==0){
                       this.msg=true;
                   }
                        this.reviews = res.data;  
                   
                })
            },
            editit(x){
              alert(x);
              this.editform=true;
            },
            deleteitem(x){
              axios.post('/deletereview',{id:x})
              .then(res=>{
    
              })
            },
            
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