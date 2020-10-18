<template>
  <div class="form-group p-4">
    <form action="" v-on:submit.prevent="newUser()">
      <div class="row pt-3">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <input
            type="text"
            class="form-control form-control-user"
            placeholder="Nombre"
            v-model="name"
          />
        </div>
        <div class="col-sm-6">
          <input
            type="text"
            class="form-control form-control-user"
            id="exampleLastName"
            placeholder="Apellidos"
            v-model="lastName"
          />
        </div>
      </div>

      <div class="row pt-3">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <input
            type="text"
            class="form-control form-control-user"
            placeholder="Correo"
            v-model="email"
          />
        </div>
        <div class="col-sm-6">
          <input
            type="text"
            class="form-control form-control-user"
            placeholder="Contraseña"
            v-model="password"
          />
        </div>
      </div>

      <div class="row pt-3">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <button type="submit" href="#" class="btn btn-primary">
            <span class="text">Crear</span>
          </button>
        </div>
      </div>
    </form>
  </div>
</template>


<script>
export default {
  data() {
    return {
      id: "",
      name: "",
      lastName: "",
      email: "",
      password: "",
    };
  },
  methods: {
    newUser() {
      const params = {
        name: this.name,
        lastName: this.lastName,
        email: this.email,
        password: this.password,
      };


      axios.post("/apiUsers", params).then((response) => {
        console.log(response);
        const user = response.data;
        this.$emit("new", user);
      });

       // Clear inputs
      (this.name = ""),
        (this.lastName = ""),
        (this.email = ""),
        (this.password = "");
    },
  },
};
</script>