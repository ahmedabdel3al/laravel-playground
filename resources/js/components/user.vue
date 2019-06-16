<template>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">User Component</div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item"   v-for="user in users" :key="user.id" :class="{'active':currentUser.id==user.id  }">
            <span @click="SetCurrentUser(user)">{{user.name}}</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters,mapMutations} from "vuex";
export default {
  created() {
    this.getUsers();
  },
  computed: {
    ...mapGetters({ users: "users/getUsers" , currentUser:"users/getCurrentUser" } )
  },
  methods: {
    ...mapActions({
      getUsers: "users/setUsers",
      getMessage:"message/getMessage"
    }),
    ...mapMutations({
         setUser: "users/setUser"
    }),
    SetCurrentUser(user) {
      this.getMessage(user)
       this.setUser({user})
    }
  }
};
</script>
<style lang="scss">
</style>
