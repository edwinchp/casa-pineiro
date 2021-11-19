<template>
  <div class="col-sm-12" style="">
    <div class="card fb-card">
      <div class="card-header" id="fondo">
        <div class="float-left" id="carrito">
          <i class="icofont icofont-truck-alt"></i>
        </div>
        <div class="d-inline-block">
          <h2>Proveedores</h2>

          <a href="supplier/create" class="btn color-nuevo a-primary">Nuevo</a>

          <store-dropdown @storeIdChanged="selectedStoreId = $event">
          </store-dropdown>
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
            <supplier-card
              v-for="supplier in suppliers"
              :key="supplier.id"
              :id="supplier.id"
              :name="supplier.name"
              :visit-day="supplier.visit_day"
            ></supplier-card>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SupplierCard from "./SupplierCard.vue";
import StoreDropdown from "../layouts/StoreDropdown.vue";
export default {
  components: {
    SupplierCard,
    StoreDropdown,
  },

  data() {
    return {
      suppliers: [],
      selectedStoreId: null,
    };
  }, // end data

  methods: {
    getSuppliers() {
      var p = {
        params: {
          store_id: this.selectedStoreId, // CHANGE THIS !!!!!!!!!!!!!!!!!!!!
        },
      };
      axios.get("/api/supplier", p).then((response) => {
        this.suppliers = response.data;
      });
    },

    waitStoreId() {
      if (this.selectedStoreId == null) {
        setTimeout(() => {
          console.log("Waiting for selectedStoreId in SupplierIndex");
          this.waitStoreId();
        }, 800);
      } else {
        console.log("selectedStoreId = " + this.selectedStoreId);
        this.getSuppliers();
      }
    },
  }, // end methods

  created() {
    this.waitStoreId();
  },
};
</script>

<style scoped>
#carrito {
  margin-top: 20px;
}
#carrito i {
  background-color: rgba(187, 74, 8, 0.87);
  font-size: 35px;
}
#fondo {
  background-image: radial-gradient(
    circle at -14.8% 50%,
    #fffff2 0,
    #fffce4 16.67%,
    #fff2d6 33.33%,
    #ffe7c7 50%,
    #fcdcb9 66.67%,
    #fad1ad 83.33%,
    #f9c7a2 100%
  );
}

.color-nuevo {
  background-color: rgba(187, 74, 8, 0.87);
  color: white;
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