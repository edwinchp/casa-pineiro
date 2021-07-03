<template>
  <div id="sales-index">
    <div class="pcoded-main-container">
      <div class="pcoded-inner-content">
        <div class="main-body">
          <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="col-sm-12" style="">
                    <div class="card fb-card">
                      <div class="card-header color-card">
                        <i class="icofont icofont-food-basket"></i>
                        <div class="d-inline-block">
                          <h2>Ventas</h2>

                          <div class="section-header-buttons pr-5">
                            <a
                              href="product.create.html"
                              class="btn btn-inverse btn-success-a"
                              data-toggle="tooltip"
                              data-placement="bottom"
                              data-original-title="Nuevo producto"
                              >Nuevo</a
                            >

                            <store-dropdown
                              @storeIdChanged="selectedStoreId"
                            ></store-dropdown>

                            <filter-dropdown
                              @filterChanged="selectedFilter"
                            ></filter-dropdown>

                            <button v-show="false" class="btn btn-inverse">
                              <i
                                class="icofont icofont-download icofont-alt"
                              ></i
                              >Descargar
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="card-block text-center">
                        <div class="row">
                          <div class="col-4 b-r-default">
                            <h2>{{ getSalesData.products_sold }}</h2>
                            <p class="text-muted">Productos</p>
                          </div>
                          <div class="col-4 b-r-default">
                            <h2>{{ getSalesData.products_qty_sold }}</h2>
                            <p class="text-muted">Productos en cantidad</p>
                          </div>
                          <div class="col-4">
                            <h2>${{ getSalesData.sold_price }}</h2>
                            <p class="text-muted">Total</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--CARD-->
                    <div class="card pt-3">
                      <!--SEARCH BOX-->
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
                                v-model="salesToFind"
                                @keyup="findSales"
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
                                  <th>Cantidad</th>
                                  <th>Precio Unit</th>
                                  <th>Precio Total</th>
                                  <th>Cliente</th>
                                  <th>Vendido por</th>
                                  <th>Hora</th>
                                  <th>Opciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="(sale, index) in sales" :key="index">
                                  <td class="table-name">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <a
                                          :href="
                                            '/products/' +
                                            sale.product_id +
                                            '/edit'
                                          "
                                          target="_blank"
                                          >{{
                                            shortAttribute(sale.name, 25)
                                          }}</a
                                        >
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">{{ sale.qty }}</div>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">${{ sale.price }}</div>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">
                                          ${{ sale.qty * sale.price }}
                                        </div>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">
                                          {{ sale.customer_id }} Genérico
                                        </div>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">
                                          {{ sale.user_id }} Juan Chi
                                        </div>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-8">
                                        <div class="">
                                          {{ getCreatedAt(sale) }}
                                        </div>
                                      </div>
                                    </div>
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
                              </tbody>
                            </table>
                            <pagination-component
                              :pagination="pagination"
                              @pageChanged="setNewPage"
                            ></pagination-component>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
import PaginationComponent from "../layouts/PaginationComponent.vue";
import FilterDropdown from "../layouts/FilterDropdown.vue";

export default {
  components: { PaginationComponent, StoreDropdown, FilterDropdown },

  data() {
    return {
      sales: [],
      salesData: {},
      salesToFind: "",
      searchTimeout: "",
      store_id: null,
      pagination: {},
      selectedFilterName: "weekly",
    };
  },

  methods: {
    /**
     * SALES
     */
    getSales(page) {
      const params = {
        params: {
          store_id: this.store_id,
          filter: this.selectedFilterName,
        },
      };

      axios.get("/api/sales/?page=" + page, params).then((resp) => {
        this.sales = resp.data.sales.data;
        this.pagination = resp.data.pagination;
        this.salesData = resp.data.sales_data;
      });
    },

    getCreatedAt(sale) {
      let date = new Date(sale.created_at);
      let months = [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic",
      ];
      return (
        date.getDate() +
        "-" +
        months[date.getMonth()] +
        "-" +
        date.getFullYear() +
        " " +
        date.getHours() +
        ":" +
        date.getMinutes() +
        ":" +
        date.getSeconds()
      );
    },

    /**
     * SEARCH
     */

    findSales() {
      clearTimeout(this.searchTimeout);
      if (this.searchContainsChars) {
        this.searchTimeout = setTimeout(this.getFoundSales, 800);
      } else {
        this.getSales(1);
      }
    },

    getFoundSales() {
      axios
        .get("api/allSales", {
          params: {
            userInput: this.salesToFind,
          },
        })
        .then((resp) => {
          this.sales = resp.data;
        });
    },

    /**
     * PAGINATION
     */

    /**
     * GENERIC
     */
    shortAttribute(att, limit) {
      if (att.length <= limit) {
        return att.substring(0, limit);
      }
      return att.substring(0, limit) + "...";
    },

    selectedStoreId($event) {
      this.store_id = $event;
    },

    waitStoreId() {
      if (this.store_id == null) {
        setTimeout(() => {
          console.log("Wating for store_id in SalesIndexComponent");
          this.waitStoreId();
        }, 800);
      } else {
        console.log("store_id = " + this.store_id);
        this.getSales(1);
      }
    },

    setNewPage(event) {
      this.getSales(event);
    },

    selectedFilter(event) {
      this.selectedFilterName = event;
    },
  },

  watch: {
    store_id() {
      this.getSales(1);
    },

    selectedFilterName() {
      this.getSales(1);
    },
  },

  computed: {
    searchContainsChars() {
      return this.salesToFind.length > 2;
    },

    getSalesData() {
      return this.salesData;
    },
  },

  created() {
    axios.defaults.headers.common["Authorization"] =
      "Bearer " + localStorage.getItem("user_token");

    this.waitStoreId();
  },
};
</script>

<style>
</style>