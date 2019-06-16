+<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <strong>Laravel Vue JS Infinite Scroll - ItSolutionStuff.com</strong>
          </div>

          <div class="card-body">
              <infinite-loading direction="top" @infinite="infiniteHandler"></infinite-loading>
            <div>
              <p v-for="item in list">{{item.body}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axois from "axios";
import message from "./message";
import user from "./user";
import { constants } from "crypto";
export default {
  components: {
    message,
    user
  },
  data() {
    return {
      list: [],
      page: 1,
      lastPage: 1
    };
  },
  methods: {
    infiniteHandler($state) {
      if (this.page <= this.lastPage) {
        axois.get("/message/1?page=" + this.page).then(response => {
          this.lastPage = response.data.last_page;
          this.list.push(...response.data.data);
          
          $state.loaded();
        });

        this.page = this.page + 1;
      }else{
          $state.complete();
      }
    }
  }
};
</script>
