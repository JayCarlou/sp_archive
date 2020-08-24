<template>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{action.toUpperCase()}} USER</h5>
          <button @click="reset" type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form :action="`user_management/${action}`" method="GET">
            <input type="hidden"  v-model="users.id" class="form-control" name="id" />
            <div class="form-group">
              <label for="name">Name</label>
              <input
                type="text"
                v-model="users.name"
                class="form-control"
                name="name"
                id="name"
                :disabled="action == 'delete'"
                required
                autocomplete="off"
              />
            </div>
            <div class="form-group">
              <label for="email">Username</label>
              <input
                type="text"
                class="form-control"
                name="email"
                id="email"
                v-model="users.email"
                :disabled="action == 'delete'"
                required
                autocomplete="off"
              />
            </div>
            <div class="form-group">
              <label for="password" v-if="action == 'add'">Password</label>
              <input
                type="password"
                class="form-control"
                name="password"
                id="password"
                v-if="action == 'add'"
                :disabled="action == 'delete'"
                required
                autocomplete="off"
              />
            </div>
            
            <div class="form-group">
              <button
                v-if="action == 'edit'"
                @click="submit('edit')"
                class="btn btn-primary float-right"
              >Submit Changes</button>
              <button
                v-else-if="action == 'delete'"
                @click="submit('delete')"
                class="btn btn-danger float-right"
              >Delete User</button>
              <button v-else @click="submit('save')" class="btn btn-primary float-right">Save User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["users", "action", "reset"],
  data() {
    return {};
  },
  created() {
    console.log($);
  },
  methods: {},
  computed: {}
};
</script>

<style scoped>
</style>