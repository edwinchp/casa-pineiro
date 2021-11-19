<template>
  <div>
    <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          <h4>Crear proveedor</h4>
          <div class="card-header-left"></div>
        </div>
        <div class="card-block">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-8"></div>
            </div>
          </div>
          <div class="container ml-4">
            <div class="col-lg-6 col-md-12 col-sm-12 row pt-3">
              <label for="bar_code">Nombre de proveedor</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-truck-moving"></i>
                  </span>
                </div>
                <input
                  type="text"
                  class="form-control"
                  name="bar_code"
                  autocomplete="off"
                  v-model="supplier.name"
                />
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 row pt-3">
              <label for="brand">Nombre del surtidor</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-user-tie"></i>
                  </span>
                </div>
                <input
                  type="text"
                  class="form-control"
                  v-model="supplier.supplier_name"
                />
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 row pt-3">
              <label for="brand">Número de telefono</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-phone-square-alt"></i>
                  </span>
                </div>
                <input
                  type="text"
                  class="form-control"
                  v-model="supplier.phone_number"
                />
              </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 pt-3">
              <label for="visit_day">Día de visita</label>
              <select
                class="custom-select mr-sm-2"
                id="inlineFormCustomSelect"
                v-model="supplier.visit_day"
              >
                <!-- :disabled="!isActive || !isAdmin" -->
                <option
                  v-for="day in days"
                  :key="day"
                  :value="day"
                  :selected="day == supplier.visit_day"
                >
                  {{ day }}
                </option>
              </select>
            </div>

            <div v-show="false" class="col-lg-6 col-md-12 col-sm-12 row pt-3">
              <label for="brand">Crédito autorizado</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                  </span>
                </div>
                <input type="text" class="form-control" name="brand" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-row pt-4"></div>

              <div class="form-row">
                <div class="form-group col-md-4"></div>
              </div>
            </div>
          </div>

          <div class="options ml-5">
            <div class="form-row pt-3">
              <div class="p-1">
                <button
                  class="btn btn-success"
                  @click="saveSupplier"
                  :disabled="!supplier.name.length > 0 && !supplier.name != ''"
                >
                  Guardar
                </button>
              </div>

              <div class="p-1">
                <button class="btn btn-secondary">Cancelar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      supplier: {
        store_id: 1, /////////// CHANGE THIS
        name: "",
        phone_number: "",
        visit_day: "",
      },

      days: [
        "Lunes",
        "Martes",
        "Miércoles",
        "Jueves",
        "Viernes",
        "Sábado",
        "Domingo",
      ],
    };
  }, // end data

  methods: {
    saveSupplier() {
      axios
        .post("/api/supplier", this.supplier)
        .then((response) => {
          window.location.href = "/supplier/" + response.data.id + "/edit";
        })
        .catch((error) => {
          alert("Ingrese los valores requeridos");
          alert(error);
        });
    },
  }, // end methods
};
</script>

<style>
</style>