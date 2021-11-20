<template>
  <div>
    <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="row">
          <div class="col-md-6">
            <div class="card-header">
              <h4>{{ supplier.name }}</h4>
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
                  <div class="col-lg-12 col-sm-12">
                    <div class="row pt-3">
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
                          autocomplete="off"
                          v-model="supplier.supplier_name"
                        />
                      </div>

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
                          autocomplete="off"
                          v-model="supplier.phone_number"
                        />
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
                    </div>
                    <div class="mt-3" v-show="false">
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

                  <div class="col-lg-6 col-sm-12">
                    <div class="sabrita" id="sabrita">
                      <img
                        class="card-img-top rounded-circle"
                        src="/images/sabritas.png"
                        alt=""
                        width="20px"
                      />
                    </div>
                  </div>
                </div>
              </div>

              <div class="options ml-3">
                <div class="form-row pt-3">
                  <div class="p-1">
                    <button class="btn btn-success" @click="updateSupplier">
                      Guardar
                    </button>
                  </div>

                  <div class="p-1">
                    <button class="btn btn-secondary">Atrás</button>
                  </div>

                  <div class="p-1">
                    <button class="btn btn-danger">Eliminar</button>
                  </div>

                  <div class="p-1" v-show="false">
                    <button class="btn btn-primary">Imágenes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 pt-5">
            <div class="section-header">
              <div class="col-xl-6">
                <div class="input-group search-box">
                  <span class="input-group-addon" id="name"
                    ><i class="icofont icofont-search"></i
                  ></span>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Buscar..."
                    v-model="productsFound"
                    @keyup="findProducts"
                  />
                </div>
              </div>
            </div>
            <div class="mr-3">
              <table class="table table-hover table-responsive">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Existentes</th>
                    <th>Precio de venta</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="product in products" :key="product.id">
                    <td>
                      {{ product.name }}
                    </td>
                    <td>
                      <div v-if="product.unit" class="product-current-qty">
                        {{ product.qty + " " }}
                        <span style="font-size: 10px"
                          ><strong>{{ product.unit }}</strong></span
                        >
                      </div>
                      <div v-else class="product-current-qty">
                        {{ product.qty }}
                      </div>
                    </td>
                    <td>
                      {{ "$" + product.price }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import ProductsTableComponent from "../product/ProductsTableComponent.vue";
export default {
  props: ["supplier_id"],
  components: { ProductsTableComponent },
  data() {
    return {
      supplier: {
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
      products: [],
      productsFound: "",
      productTimeOut: "",
    };
  }, // end data

  methods: {
    findSupplier() {
      axios.get("/api/supplier/" + this.supplier_id).then((response) => {
        this.supplier = response.data;
      });
    },

    updateSupplier() {
      axios
        .put("/api/supplier/" + this.supplier_id, this.supplier)
        .then((response) => {
          if (response.status == 200)
            this.$fire({
              title: "¡Listo!",
              text: "Proveedor actualizado",
              type: "success",
              timer: 2500,
            });
        })
        .catch((error) => {
          this.$fire({
            title: "Upps!",
            text: "Algo salió mal: " + error,
            type: "danger",
            timer: 2500,
          });
        });
    },

    getProducts(page) {
      axios
        .get("/api/products/?page=" + page, {
          params: {
            store_id: 1,
            supplier_id: 7,
          },
        })
        .then((response) => {
          this.products = response.data.products;
        });
    },

    getSearchProducts() {
      axios
        .get("/api/products/", {
          params: {
            productsFound: this.productsFound,
            store_id: 1,
            supplier_id: 7,
          },
        })
        .then((response) => {
          this.products = response.data;
        });
    },

    findProducts() {
      clearTimeout(this.productTimeOut);
      if (this.searchIsActive) {
        this.productTimeOut = setTimeout(this.getSearchProducts, 800);
      } else {
        this.getProducts(1);
      }
    },
  }, // end methods

  computed: {
    searchIsActive() {
      return this.productsFound.length > 2;
    },
  },

  created() {
    this.findSupplier();
    this.getProducts(1);
  },
};
</script>

<style scoped>
#sabrita {
  width: 200px;
  margin-top: 20px;
  margin-left: 180px;
}

@media (max-width: 600px) {
  #sabrita {
    margin-left: 60px;
  }
}

.table {
  font-size: 12px;
}
</style>