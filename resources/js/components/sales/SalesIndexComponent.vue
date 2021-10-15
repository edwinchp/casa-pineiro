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
                      <div class="card-header" id="fondo">
                        <div class="float-left" id="carrito">
                          <i class="icofont icofont-money"></i>
                        </div>

                        <div class="d-inline-block">
                          <h2>Ventas</h2>

                          <button
                            class="btn btn-primary"
                            data-toggle="tooltip"
                            data-placement="bottom"
                            data-original-title="Nuevo producto"
                          >
                            <a href="sales/basket" class="a-primary">Nuevo</a>
                          </button>

                          <store-dropdown
                            @storeIdChanged="selectedStoreId"
                          ></store-dropdown>

                          <filter-dropdown
                            @filterChanged="selectedFilter"
                          ></filter-dropdown>

                          <button v-show="false" class="btn btn-inverse">
                            <i class="icofont icofont-download icofont-alt"></i
                            >Descargar
                          </button>
                        </div>
                      </div>
                      <div class="card-block text-center">
                        <div class="row">
                          <div class="col-4 b-r-default">
                            <h2>{{ getSalesData.sales_total }}</h2>
                            <p class="text-muted">Ventas</p>
                          </div>
                          <div class="col-4 b-r-default">
                            <h2>{{ getSalesData.products_qty_sold }}</h2>
                            <p class="text-muted">Productos vendidos</p>
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
                      <div class="table-products-scope">
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
                                  <th>ID</th>
                                  <!-- <th>Cantidad</th> -->
                                  <!-- <th>Precio Unit</th> -->
                                  <th>Precio Total</th>
                                  <!-- <th>Cliente</th> -->
                                  <!-- <th>Recibido</th>
                                  <th>Cambio</th> -->
                                  <th>Vendedor</th>
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
                                          data-toggle="modal"
                                          data-target="#sale-details"
                                          @click="selectedSaleId = sale.id"
                                          href="#"
                                          >{{ sale.id }}</a
                                        >
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">
                                          ${{ getRoundedDigit(sale.total) }}
                                        </div>
                                      </div>
                                    </div>
                                  </td>

                                  <!-- <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">
                                          {{ sale.customer_id }}
                                        </div>
                                      </div>
                                    </div>
                                  </td> -->

                                  <!-- <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">
                                          ${{ getRoundedDigit(sale.received) }}
                                        </div>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">
                                          ${{ getRoundedDigit(sale.change) }}
                                        </div>
                                      </div>
                                    </div>
                                  </td> -->

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">
                                          <a href="#">
                                            {{ sale.user_name }}
                                          </a>
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
                                        data-original-title="Editar"
                                        @click="deleteSale(sale.id)"
                                        ><i class="ti-trash"></i
                                      ></a>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
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
    <sale-details :sale_id="selectedSaleId"></sale-details>
  </div>
</template>

<script>
import StoreDropdown from "../layouts/StoreDropdown.vue";
import PaginationComponent from "../layouts/PaginationComponent.vue";
import FilterDropdown from "../layouts/FilterDropdown.vue";
import SaleDetails from "../sales/SaleDetails.vue";

export default {
  components: {
    PaginationComponent,
    StoreDropdown,
    FilterDropdown,
    SaleDetails,
  },

  data() {
    return {
      sales: [],
      salesData: {},
      salesToFind: "",
      searchTimeout: "",
      store_id: null,
      pagination: {},
      selectedFilterName: "weekly",
      selectedSaleId: 0,
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
      const params = {
        params: {
          store_id: this.store_id,
          filter: this.selectedFilterName,
          user_input: this.salesToFind,
        },
      };

      axios.get("/api/sales/?page=1", params).then((resp) => {
        this.sales = resp.data.sales.data;
        this.pagination = resp.data.pagination;
        this.salesData = resp.data.sales_data;
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

    getRoundedDigit(floatNum) {
      if (floatNum != null) return parseFloat(floatNum).toFixed(2);
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

    deleteSale(id) {
      this.$fire({
        title: "¿Estás seguro?",
        text: "La venta número " + id + " se borrará definitivamente.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, borrar!",
        cancelButtonText: "Cancelar",
        focusCancel: true,
      }).then((result) => {
        if (typeof result.value !== "undefined")
          axios.delete("api/sales/" + id).then((resp) => {
            if (resp.status == 200) {
              this.$fire({
                title: "¡Listo!",
                text: "Eliminado con éxito",
                type: "success",
                timer: 2500,
              });
              this.getSales(1);
            }
          });
      });
    },
  },

  watch: {
    store_id() {
      this.getSales(1);
      this.salesToFind = "";
    },

    selectedFilterName() {
      //this.getSales(1);
      this.findSales();
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

<style scoped>
#carrito {
  margin-top: 20px;
}
#carrito i {
  background-color: 4680ff;
  font-size: 35px;
}
#fondo {
  background-image: linear-gradient(
    105deg,
    #d2c9ff 0,
    #bcc1fd 25%,
    #9ab8ff 50%,
    #7dabf1 75%,
    #4370d3 100%
  );

  color: black;
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

