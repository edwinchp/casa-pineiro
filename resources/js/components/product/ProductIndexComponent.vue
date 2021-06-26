<template>
  <div class="col-sm-12" style="">
    <div class="card fb-card">
      <div class="card-header color-card">
        <i class="icofont icofont-food-basket"></i>
        <div class="d-inline-block">
          <h2>Productos</h2>

          <div class="section-header-buttons pr-5">
            <a
              href="products/create"
              class="btn btn-inverse btn-success-a"
              data-toggle="tooltip"
              data-placement="bottom"
              data-original-title="Nuevo producto"
              >Nuevo</a
            >

            <div
              v-if="stores.length > 0"
              class="dropdown-inverse dropdown open"
            >
              <button
                class="btn btn-inverse dropdown-toggle waves-effect waves-light"
                type="button"
                id="dropdown-7"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                {{ selectedStoreName }}
              </button>
              <div
                class="dropdown-menu"
                aria-labelledby="dropdown-7"
                data-dropdown-in="fadeIn"
                data-dropdown-out="fadeOut"
                x-placement="bottom-start"
                style="
                  position: absolute;
                  transform: translate3d(0px, 40px, 0px);
                  top: 0px;
                  left: 0px;
                  will-change: transform;
                "
              >
                <a
                  v-for="(store, index) in stores"
                  :key="index"
                  @click="selectStore(store)"
                  class="dropdown-item waves-light waves-effect"
                >
                  {{ store.name }}</a
                >
              </div>
            </div>

            <div v-show="false" class="dropdown-inverse dropdown open">
              <button
                class="btn btn-inverse dropdown-toggle waves-effect waves-light"
                type="button"
                id="dropdown-7"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="true"
              >
                Todos los productos
              </button>
              <div
                class="dropdown-menu"
                aria-labelledby="dropdown-7"
                data-dropdown-in="fadeIn"
                data-dropdown-out="fadeOut"
              >
                <a
                  class="dropdown-item waves-light waves-effect active"
                  href="#"
                  >Todos los productos</a
                >
                <a class="dropdown-item waves-light waves-effect" href="#"
                  >Apunto de caducar</a
                >
                <a class="dropdown-item waves-light waves-effect" href="#"
                  >Apunto de acabarse</a
                >
              </div>
            </div>

            <button v-show="false" class="btn btn-inverse">
              <i class="icofont icofont-download icofont-alt"></i>Descargar
            </button>
          </div>
        </div>
      </div>
      <div class="card-block text-center">
        <div class="row">
          <div class="col-6 b-r-default">
            <h2>{{ totalProducts }}</h2>
            <p class="text-muted">Productos</p>
          </div>
          <div class="col-6">
            <h2>{{ allProductsQty }}</h2>
            <p class="text-muted">Existentes</p>
          </div>
        </div>
      </div>
    </div>

    <div class="card pt-3 table-products-scope">
      <div class="section-header pl-3">
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

      <div class="card-block table-border-style">
        <div class="table-responsive pr-4 pl-4">
          <!--Product table-->
          <products-table-component
            :products="products"
            @miniCartChanged="miniCart = $event"
          />

          <div class="p-4" v-show="!searchIsActive">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-end">
                <li class="page-item" v-if="pagination.current_page > 1">
                  <a
                    class="page-link"
                    href="#"
                    tabindex="-1"
                    @click.prevent="changePage(pagination.current_page - 1)"
                    >Anterior</a
                  >
                </li>
                <li
                  v-for="page in pagesNumber"
                  :key="page"
                  v-bind:class="page == isActive ? 'active' : ''"
                  class="page-item"
                >
                  <a
                    class="page-link"
                    href="#"
                    @click.prevent="changePage(page)"
                    >{{ page }}</a
                  >
                </li>
                <li
                  class="page-item"
                  v-if="pagination.current_page < pagination.last_page"
                >
                  <a
                    class="page-link"
                    @click.prevent="changePage(pagination.current_page + 1)"
                    >Siguiente</a
                  >
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ProductsTableComponent from "./ProductsTableComponent.vue";
export default {
  components: { ProductsTableComponent },

  data() {
    return {
      products: [],
      allProducts: [],
      productsFound: "",
      productTimeOut: "",
      beforeEditProductName: "",
      beforeEditCpQty: "",
      miniCart: [],
      pagination: {
        total: 0,
        current_page: 0,
        per_page: 0,
        last_page: 0,
        from: 0,
        to: 0,
      },
      stores: [],
      selectedStoreId: "",
      selectedStoreName: "",
    };
  },
  computed: {
    urlEdit: function () {
      return "hello";
    },
    totalProducts: function () {
      if (this.searchIsActive) {
        return this.products.length;
      } else {
        return this.allProducts.length;
      }
    },
    allProductsQty: function () {
      if (this.searchIsActive) {
        return this.products.reduce((sum, product) => sum + product.qty, 0);
      } else {
        return this.allProducts.reduce((sum, product) => sum + product.qty, 0);
      }
    },

    isActive: function () {
      return this.pagination.current_page;
    },

    pagesNumber: function () {
      if (!this.pagination.to) {
        return [];
      }

      var from = this.pagination.current_page - 2; //TODO OFFSET
      if (from < 1) {
        from = 1;
      }

      var to = from + 2 * 2; //TODO OFFSET
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }

      var pagesArray = [];
      while (from <= to) {
        pagesArray.push(from);
        from++;
      }

      return pagesArray;
    },

    searchIsActive: function () {
      return this.productsFound.length > 2;
    },
    currentUser: {
      get() {
        return this.$store.state.currentUser.user;
      },
    },
  },

  methods: {
    findProducts: function () {
      clearTimeout(this.productTimeOut);
      if (this.searchIsActive) {
        this.productTimeOut = setTimeout(this.getSearchProducts, 800);
      } else {
        this.getProducts(1);
      }
    },

    getStores(callback) {
      axios.get("/api/user/stores").then((resp) => {
        this.stores = resp.data.stores;
        this.selectedStoreId = this.stores[0].id;
        this.selectedStoreName = this.stores[0].name;
        callback();
      });
    },

    getProducts: function (page) {
      axios
        .get("/api/products/?page=" + page, {
          params: {
            store_id: this.selectedStoreId,
          },
        })
        .then((resp) => {
          this.products = resp.data.products;
          this.pagination = resp.data.pagination;
        });
    },

    getSearchProducts: function () {
      axios
        .get("/api/products", {
          params: {
            productsFound: this.productsFound,
            store_id: this.selectedStoreId,
          },
        })
        .then((response) => {
          this.products = response.data;
          //this.pagination = response.data.pagination;
        });
    },

    getAllProducts: function () {
      axios
        .get("/api/allProducts/", {
          params: {
            store_id: this.selectedStoreId,
          },
        })
        .then((response) => {
          this.allProducts = response.data;
        });
    },

    /**
     * Each product
     */
    editProduct: function (product) {
      this.beforeEditCpQty = product.qty;
      product.editing = !product.editing;
    },
    doneEdit: function (product) {
      product.editing = "false";
    },
    cancelEdit: function (product) {
      product.qty = this.beforeEditCpQty;
      product.editing = !product.editing;
    },

    /**
     * Pagination
     */

    changePage: function (page) {
      this.pagination.current_page = page;
      this.getProducts(page);
    },

    getProductName(product) {
      let shortName = product.name.substring(0, 40);
      return shortName.length >= 40 ? shortName + "..." : shortName;
    },

    /**
     * Stores
     */
    selectStore(store) {
      this.selectedStoreId = store.id;
      this.selectedStoreName = store.name;
      this.getProducts(1);
      this.getAllProducts();
    },
  },

  created() {
    axios.defaults.headers.common["Authorization"] =
      "Bearer " + localStorage.getItem("user_token");
    this.$store.dispatch("currentUser/getUser");
    this.getStores(() => {
      this.getProducts(1);
      this.getAllProducts();
    });
  },

  mounted() {},
};
</script>

<style scoped>
.table-products-scope {
  margin-bottom: 200px;
}
</style>