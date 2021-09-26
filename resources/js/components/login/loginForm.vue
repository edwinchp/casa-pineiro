<template>
  <div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="hidden" name="_token" :value="csrf">
      <input
        type="email"
        class="form-control"
        id="exampleInputEmail1"
        aria-describedby="emailHelp"
        placeholder="Enter email"
        v-model="user.email"
      />
      <small id="emailHelp" class="form-text text-muted"
        >We'll never share your email with anyone else.</small
      >
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input
        type="password"
        class="form-control"
        id="exampleInputPassword1"
        placeholder="Password"
        v-model="user.password"
      />
    </div>
    <button type="submit" class="btn btn-primary" @click="login">Submit</button>
  </div>
</template>

<script>
export default {
  //computed: {
  // user: {
  //   get() {
  //     return this.$store.state.currentUser.user;
  //   },
  // },
  //  },

  data: () => ({
    user: {
      email: "",
      password: "",
    },
    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
  }),

  methods: {
    login() {
      this.$store.dispatch("currentUser/loginUser", this.user);
      //axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("user_token");
    },
  },
};
</script>

<style>
</style>