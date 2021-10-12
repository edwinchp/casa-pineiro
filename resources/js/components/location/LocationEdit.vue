<template>
  <div>
    <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          <h4>{{ locationData.name }}</h4>
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
                      v-model="locationData.name"
                    />
                  </div>

                  <label for="brand">Descripción</label>
                  <div class="input-group">
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="5"
                      v-model="locationData.description"
                    ></textarea>
                  </div>

                  <store-input-dropdown
                    @storeIdChanged="storeIdChanged"
                    :currentStoreId="locationData.store_id"
                  ></store-input-dropdown>
                </div>
              </div>

              <div class="col-lg-6 col-sm-12">
                <!-- <div class="anaquel" id="anaquel">
                  <img
                    class="card-img-top rounded"
                    src="/images/vidriera.jpg"
                    alt=""
                    width="20px"
                  />
                </div> -->
                <div class="carousel-margen">
                  <carousel
                    :foreign_key="location.id"
                    type="L"
                    img-w="400"
                    img-h="350"
                  ></carousel>
                </div>
              </div>
            </div>
          </div>

          <div class="options ml-3">
            <div class="form-row pt-3">
              <div class="p-1">
                <button class="btn btn-success" @click="saveLocation">
                  Guardar
                </button>
              </div>

              <div class="p-1">
                <a class="m-1 btn btn-secondary" href="/location">Atrás</a>
              </div>

              <div class="p-1">
                <button class="btn btn-danger">Eliminar</button>
              </div>

              <div class="p-1">
                <upload-picture
                  :foreign_key="location.id"
                  type="L"
                ></upload-picture>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import StoreInputDropdown from "../layouts/StoreInputDropdown.vue";
import UploadPicture from "../layouts/UploadPicture.vue";
import Carousel from "../layouts/Carousel.vue";

export default {
  props: ["location"],

  components: { StoreInputDropdown, UploadPicture, Carousel },

  data() {
    return {
      locationData: this.location,
      selectedStoreId: this.location.id,
    };
  },

  methods: {
    saveLocation() {
      axios
        .put("/api/location/" + this.locationData.id, this.locationData)
        .then((resp) => {
          if (resp.status == 200) {
            this.$fire({
              title: "¡Listo!",
              text: "Actualizado con éxito",
              type: "success",
              timer: 2000,
            });
          }
        })
        .catch((error) => {
          this.$fire({
            title: "Upps!",
            text: "Error al guardar, intente nuevamente",
            type: "error",
            timer: 5000,
          });
        });
    },

    storeIdChanged(event) {
      this.locationData.store_id = event;
      this.selectedStoreId = event;
    },
  },
};
</script>

<style scoped>
#anaquel {
  width: 200px;
  margin-left: 180px;
  margin-top: 20px;
}
#anaquel img {
  height: 250px;
  width: 200px;
}

@media (max-width: 600px) {
  #anaquel {
    margin-left: 80px;
  }
}

.carousel-margen {
  margin-left: 130px;
}
</style>