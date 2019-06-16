<template>
    <div class="col-md-8">
         <div class="card">
             <div class="card-header" v-if="currentUser.user">{{currentUser.user.name}} </div>
             <div class="card-header" v-else>Chat components</div>
                <div class="card-body"> 
                       <ul class="list-group">
                        <li class="list-group-item"   v-for="message in messages.data" :key="message.id">
                           <span>{{message.body}}</span>
                         </li>
                      </ul>
                      </div>
                <input type="text"  v-model="message" class="form-control" @keyup.enter="sentMessage">
               </div>
            </div>
        </div>
    </div>
</template> 
<script>
import {mapGetters} from 'vuex'
import InfiniteLoading from 'vue-infinite-loading';
import { setTimeout } from 'timers';
export default {
    data(){
        return {
            message : undefined
        }
    },
    components:{
        InfiniteLoading
    },
    computed:{
        ...mapGetters({
          currentUser:"users/getCurrentUser",
          messages : "message/getMessage"
        })
    },
    methods:{
        sentMessage(){
           console.log(this.message)
        },
      
    },
   
}

</script>
<style scoped>
  .scrollbable{
      overflow-y :auto;
      height: 600px;
  }
</style>