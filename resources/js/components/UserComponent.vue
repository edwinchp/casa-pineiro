<template>
  <div class="col-md-12">
    <!-- DataTales Example -->
    <div class="card shadow mb-1">
      <div class="card-header d-flex">
        <div class="p-2 bd-highlight">
          <h6 class="m-3 font-weight-bold text-primary">Usuarios</h6>
        </div>

        <div class="p-2 py-3">
          <div class="input-group">
            <input
              type="text"
              id="search-products"
              class="form-control bg-light border-0 small"
              placeholder="Buscar..."
              aria-label="Search"
              aria-describedby="basic-addon2"
            />
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="ml-auto p-2 py-3 bd-highlight">
          <a href="#" class="btn btn-primary">
            <span class="text">Nuevo</span>
          </a>
        </div>
      </div>

      <div id="user-create">
        <user-create-component></user-create-component>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-bordered"
            id="dataTable"
            width="100%"
            cellspacing="0"
          >
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Imagen</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <user-table-component
                v-for="user in users"
                :key="user.id"
                :user="user"
              ></user-table-component>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      users: [
        {
          id: 1,
          name: "Edwincito",
        },
      ],
    };
  },
};
</script>