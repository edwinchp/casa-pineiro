<template>
  <div class="col-sm-12">
    <div class="card fb-card">
      <div class="card-header color-card">
        <i class="icofont icofont-food-basket"></i>
        <div class="d-inline-block">
          <h2>Productos</h2>

          <div class="section-header-buttons pr-5">
            <a
              href="product.create.html"
              class="btn btn-inverse btn-success-a"
              data-toggle="tooltip"
              data-placement="bottom"
              data-original-title="Nuevo producto"
              >Nuevo</a
            >

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

            <button
              class="btn btn-inverse"
              data-target="#miniCartModal"
              data-toggle="modal"
            >
              <i class="icofont icofont-cart icofont-alt"></i>Carrito
              <label class="badge badge-danger">{{
                getTotalQtyMiniCart
              }}</label>
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

    <div
      class="modal fade"
      id="miniCartModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Sub Total</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(product, p) in miniCart" :key="p">
                  <th scope="row">{{ shortProductName(product.name) }}</th>
                  <td>${{ product.price }}</td>
                  <td>
                    <button @click="reduceCartQty(product)">-</button>
                    {{ product.qty }}
                    <button @click="addCartQty(product)">+</button>
                  </td>
                  <td>${{ product.price * product.qty }}</td>
                  <td>
                    <button @click="removeFromCart(product)">X</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancelar
            </button>
            <form action="" @submit="checkoutCart(miniCart)">
              <button
                @click.prevent="checkoutCart(miniCart)"
                type="submit"
                data-dismiss="modal"
                class="btn btn-danger btn-icon-split"
              >
                <span class="icon text-white-50">
                  <i class="fas fa-trash"></i>
                </span>
                <span class="text">Pagar ${{ getTotalPriceMiniCart }}</span>
              </button>
            </form>
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
        return this.products.reduce((sum, product) => sum + product.cp_qty, 0);
      } else {
        return this.allProducts.reduce(
          (sum, product) => sum + product.cp_qty,
          0
        );
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

    /**
     * MINI CART
     */
    getTotalQtyMiniCart() {
      let total = 0;
      for (var i = 0; i < this.miniCart.length; i++) {
        total = total + this.miniCart[i].qty;
      }
      return total;
    },

    getTotalPriceMiniCart() {
      let total = 0;
      for (var i = 0; i < this.miniCart.length; i++) {
        total = total + this.miniCart[i].qty * this.miniCart[i].price;
      }
      return total;
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

    getProducts: function (page) {
      axios.get("/api/products/?page=" + page).then((resp) => {
        this.products = resp.data.products.data;
        this.pagination = resp.data.pagination;
      });
    },

    getSearchProducts: function () {
      axios
        .get("api/allProducts", {
          params: {
            productsFound: this.productsFound,
          },
        })
        .then((response) => {
          this.products = response.data;
          //this.pagination = response.data.pagination;
        });
    },

    getAllProducts: function () {
      axios.get("api/allProducts/").then((response) => {
        this.allProducts = response.data;
      });
    },

    /**
     * Each product
     */
    editProduct: function (product) {
      this.beforeEditCpQty = product.cp_qty;
      product.editing = !product.editing;
    },
    doneEdit: function (product) {
      product.editing = "false";
    },
    cancelEdit: function (product) {
      product.cp_qty = this.beforeEditCpQty;
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
     * Mini Cart
     */

    shortProductName(product) {
      let short = product.substring(0, 20);
      short = short.length >= 20 ? short + "... " : short;
      return short;
    },

    addCartQty(product) {
      product.qty = product.qty + 1;
    },

    reduceCartQty(product) {
      product.qty = product.qty - 1;
      if (product.qty == 0) {
        this.removeFromCart(product);
      }
    },

    removeFromCart(product) {
      this.miniCart.splice(
        this.miniCart.findIndex((a) => a.product_id === product.product_id),
        1
      );
    },

    checkoutCart(miniCart) {
      // axios({
      //   method: 'POST',
      //   url: 'api/sales',
      //   data: this.miniCart
      // });

      axios.post("api/sales", miniCart).then(
        (response) => {
          //this.miniCart = []
          this.miniCart.splice(0, this.miniCart.length);
        },
        (error) => {
          console.log(error);
        }
      );
    },
  },

  created() {
    this.getProducts(1);
    this.getAllProducts();
  },

  mounted() {},
};
</script>

<style scoped>
.table-products-scope {
  margin-bottom: 200px;
}
</style>