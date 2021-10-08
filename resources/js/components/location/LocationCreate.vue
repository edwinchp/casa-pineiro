<template>
  <div>
    <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          <h4>Crear ubicación</h4>
          <div class="card-header-left"></div>
        </div>
        <div class="card-block">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-8"></div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6 col-sm-12">
                <div class="row pt-3">
                  <label for="bar_code">Nombre</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-database"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      name="bar_code"
                      autocomplete="off"
                      v-model="location.name"
                    />
                  </div>

                  <label for="brand">Descripción</label>
                  <div class="input-group">
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="5"
                      v-model="location.description"
                    ></textarea>
                  </div>

                  <store-dropdown
                    @storeIdChanged="storeIdChanged"
                  ></store-dropdown>
                </div>
              </div>
            </div>
          </div>

          <div class="options ml-3">
            <div class="form-row pt-3">
              <div class="p-1">
                <button class="btn btn-success" @click="createLocation">
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
import StoreDropdown from "../layouts/StoreDropdown.vue";
export default {
  components: { StoreDropdown },

  data() {
    return {
      location: {
        name: "",
        store_id: "",
        description: "",
      },

      successTimeout: "",
    };
  },

  methods: {
    createLocation() {
      axios.post("/api/location", this.location).then((resp) => {
        if (resp.status == 201) {
          location.replace("/location/" + resp.data.id + "/edit");
        }
      });
    },
    storeIdChanged($event) {
      this.location.store_id = $event;
    },
  },
};
</script>

<style>
</style>