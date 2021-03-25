<template>
  <div class="col-sm-12">
    <div class="card fb-card">
      <div class="card-header color-card">
        <i class="icofont icofont-food-basket"></i>
        <div class="d-inline-block">
          <h2>Productos</h2>
          products found: {{ productsFound }}

          <div class="section-header-buttons pr-5">
            <a
              href="product.create.html"
              class="btn btn-inverse btn-success-a"
              data-toggle="tooltip"
              data-placement="bottom"
              data-original-title="Nuevo producto"
              >Nuevo</a
            >

            <div class="dropdown-inverse dropdown open">
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

            <button class="btn btn-inverse">
              <i class="icofont icofont-download icofont-alt"></i>Descargar
            </button>
          </div>
        </div>
      </div>
      <div class="card-block text-center">
        <div class="row">
          <div class="col-3 b-r-default">
            <h2>{{ totalProducts }}</h2>
            <p class="text-muted">Productos</p>
          </div>
          <div class="col-3 b-r-default">
            <h2>{{ allProductsQty }}</h2>
            <p class="text-muted">Existentes</p>
          </div>
          <div class="col-3 b-r-default">
            <h2>55</h2>
            <p class="text-muted">Apunto de caducar</p>
          </div>
          <div class="col-3">
            <h2>15</h2>
            <p class="text-muted">Apunto de acabarse</p>
          </div>
        </div>
      </div>
    </div>

    <div class="card pt-3">
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
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Existentes</th>
                <th>Nuevos</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Imagen</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <!--
              <tr>
                <td class="table-name">
                  <div class="row">
                    <div class="col-xl-11">
                      <a href="product.edit.html"> Cheetos bolitas 30g </a>
                    </div>
                  </div>
                </td>

                <td class="table-existing-product">
                  <div class="row">
                    <div class="col-xl-11 existing-product">
                      <div class="product-current-qty">105</div>
                      <div class="add-existing">
                        <div class="arrow">
                          <i class="ti-arrow-right"></i>
                        </div>
                        <div class="new-product-sum">119</div>
                      </div>
                    </div>
                  </div>
                </td>

                <td class="table-new-product">
                  <div class="row">
                    <div class="col-xl-11">
                      <input class="form-control" type="number" value="14" />
                    </div>
                  </div>
                </td>

                <td class="table-bought-product">
                  <div class="row">
                    <div class="col-xl-11">
                      <input class="form-control" type="number" value="6" />
                    </div>
                  </div>
                </td>

                <td class="table-sell-product">
                  <div class="row">
                    <div class="col-xl-11">
                      <input class="form-control" type="number" value="9" />
                    </div>
                  </div>
                </td>

                <td>
                  <a href="assets/images/bolitas.jpg"
                    ><img
                      src="assets/images/bolitas.jpg"
                      target="_blank"
                      class="img-40 rounded"
                    />
                  </a>
                </td>
                <td>
                  <div class="table-options">
                    <a
                      href="#"
                      data-toggle="tooltip"
                      data-placement="bottom"
                      data-original-title="Guardar cambios"
                      ><i class="ti-check"></i
                    ></a>
                    <a
                      href="#"
                      data-toggle="tooltip"
                      data-placement="bottom"
                      data-original-title="Cancelar"
                      ><i class="ti-close"></i
                    ></a>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="table-name">
                  <div class="row">
                    <div class="col-xl-11">
                      <a href="product.edit.html">Ruffles queso 40g</a>
                    </div>
                  </div>
                </td>

                <td class="table-existing-product">
                  <div class="row">
                    <div class="col-xl-11 existing-product">
                      <div class="product-current-qty">4</div>
                    </div>
                  </div>
                </td>

                <td class="table-new-product">
                  <div class="row">
                    <div class="col-xl-11">
                      <input
                        class="form-control"
                        type="text"
                        value=""
                        data-toggle="tooltip"
                        data-placement="bottom"
                        data-original-title="Edite este producto para usar esta opción"
                        disabled
                      />
                    </div>
                  </div>
                </td>

                <td class="table-bought-product">
                  <div class="row">
                    <div class="col-xl-11">$12</div>
                  </div>
                </td>

                <td class="table-sell-product">
                  <div class="row">
                    <div class="col-xl-11">
                      <strong>$14</strong>
                    </div>
                  </div>
                </td>

                <td>
                  <a href="#!" data-toggle="modal" data-target="#myModal"
                    ><img
                      src="assets/images/ruffles.jpg"
                      alt=""
                      class="img-40 rounded"
                    />
                  </a>
                </td>
                <td>
                  <div class="table-options">
                    <a
                      href="#"
                      data-toggle="tooltip"
                      data-placement="bottom"
                      data-original-title="Añadir al carrito"
                      ><i class="ti-shopping-cart"></i
                    ></a>
                    <a
                      href="#"
                      data-toggle="tooltip"
                      data-placement="bottom"
                      data-original-title="Editar"
                      ><i class="ti-pencil-alt"></i
                    ></a>
                  </div>
                </td>
              </tr>

              -->

              <!-- @foreach($products as $product)-->

              <tr v-for="(product, index) in products" :key="index">
                <td class="table-name">
                  <div class="row">
                    <div class="col-xl-11">
                      <a :href="'products/' + product.id + '/edit'">{{
                        product.name
                      }}</a>
                    </div>
                  </div>
                </td>

                <td class="table-existing-product">
                  <div class="row">
                    <div class="col-xl-11 existing-product">
                      <div v-if="product.editing" class="product-current-qty">
                        {{ product.cp_qty }}
                      </div>

                      <div v-if="!product.editing" class="product-item">
                        <input
                          class="form-control"
                          type="number"
                          v-model="product.cp_qty"
                          @keyup.enter="doneEdit(product)"
                          @blur="doneEdit(product)"
                          @keyup.esc="cancelEdit(product)"
                        />
                      </div>
                    </div>
                  </div>
                </td>

                <td class="table-new-product">
                  <div class="row">
                    <div class="col-xl-11">
                      <input
                        class="form-control"
                        type="text"
                        value=""
                        data-toggle="tooltip"
                        data-placement="bottom"
                        data-original-title="Edite este producto para usar esta opción"
                        disabled
                      />
                    </div>
                  </div>
                </td>

                <td class="table-bought-product">
                  <div class="row">
                    <div class="col-xl-11">$12</div>
                  </div>
                </td>

                <td class="table-sell-product">
                  <div class="row">
                    <div class="col-xl-11">
                      <strong>${{ product.cp_price }}</strong>
                    </div>
                  </div>
                </td>

                <td>
                  <a href="#!" data-toggle="modal" data-target="#myModal"
                    ><img
                      :src="'images/products/' + product.picture_1"
                      alt=""
                      class="img-40 rounded"
                    />
                  </a>
                </td>
                <td>
                  <div class="table-options">
                    <a
                      href="#"
                      data-toggle="tooltip"
                      data-placement="bottom"
                      data-original-title="Añadir al carrito"
                      ><i class="ti-shopping-cart"></i
                    ></a>
                    <button
                      href="#"
                      data-toggle="tooltip"
                      data-placement="bottom"
                      data-original-title="Editar"
                      @click="editProduct(product)"
                    >
                      <i class="ti-pencil-alt"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

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
export default {
  data() {
    return {
      products: [],
      allProducts: [],
      productsFound: "",
      productTimeOut: "",
      beforeEditProductName: "",
      beforeEditCpQty: "",
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
      return this.allProducts.length;
    },
    allProductsQty: function () {
      return this.allProducts.reduce((sum, product) => sum + product.cp_qty, 0);
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

    searchIsActive: function(){
      return this.productsFound.length > 2
    }
  },

  methods: {
    findProducts: function () {
      if (this.searchIsActive) {
        clearTimeout(this.productTimeOut);
        this.productTimeOut = setTimeout(this.getSearchProducts, 500);
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
  },

  created() {
    this.getProducts(1);
    this.getAllProducts();
  },

  mounted() {},
};
</script>