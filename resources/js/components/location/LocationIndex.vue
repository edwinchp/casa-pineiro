<template>
  <div class="col-sm-12" style="">
    <div class="card fb-card">
      <div class="card-header" id="fondo">
        <div class="float-left" id="carrito">
          <i class="icofont icofont-location-pin"></i>
        </div>
        <div class="d-inline-block">
          <h2>Ubicación</h2>

          <a
            class="btn btn-danger btn-success-a a-primary mb-1"
            href="location/create"
          >
            Nuevo</a
          >

          <store-dropdown
            @storeIdChanged="storeIdChanged"
            dropdown-type="danger"
          ></store-dropdown>
        </div>
      </div>
    </div>

    <div class="card pt-3 table-products-scope">
      <div class="section-header">
        <!-- <div class="input-group search-box">
            <span class="input-group-addon" id="name"
              ><i class="icofont icofont-search"></i
            ></span>
          </div>-->
        <div class="container-fluid mt-3">
          <div class="row ml-5 pl-3">
            <location-card
              v-for="location in locations"
              :key="location.id"
              :location="location"
            ></location-card>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LocationCard from "./LocationCard.vue";
import StoreDropdown from "../layouts/StoreDropdown.vue";
export default {
  components: {
    LocationCard,
    StoreDropdown,
  },

  data() {
    return {
      locations: [],
      selectedStoreId: "",
    };
  },

  methods: {
    async getLocations() {
      const params = {
        params: {
          store_id: this.selectedStoreId,
        },
      };
      const request = await axios.get("/api/location", params);
      this.locations = request.data;
    },

    storeIdChanged(event) {
      this.selectedStoreId = event;
      this.getLocations();
    },
  },

  created() {
    this.getLocations();
  },
};
</script>

<style scoped>
#carrito {
  margin-top: 20px;
}
#carrito i {
  background-color: #fc6180;
  font-size: 35px;
}
.card {
  color: black;
}
#fondo {
  background-image: radial-gradient(
    circle at 25.87% 43.53%,
    #f6c7bc 0,
    #ffbdb9 16.67%,
    #f8bbc0 33.33%,
    #fdbecb 50%,
    #e4b4c4 66.67%,
    #daafc3 83.33%,
    #d8adc8 100%
  );
}
.a-primary {
  color: white;
  text-decoration: none;
}
.a-primary:hover {
  color: white;
  text-decoration: none;
  cursor: pointer;
}
</style>