<template>
  <div>
    <div class="pcoded-main-container">
      <div class="pcoded-inner-content">
        <div class="main-body">
          <div class="page-wrapper">
            <div class="page-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex">
                        <div class="p-2 mr-auto">
                          <h4>Nueva venta</h4>
                        </div>
                        <div class="p-2">
                          <div class="dropdown-inverse dropdown open show">
                            <button
                              class="
                                btn btn-inverse
                                dropdown-toggle
                                waves-effect waves-light
                              "
                              type="button"
                              id="dropdown-7"
                              data-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="true"
                            >
                              Opciones
                            </button>
                            <div
                              class="dropdown-menu"
                              aria-labelledby="dropdown-7"
                              data-dropdown-in="fadeIn"
                              data-dropdown-out="fadeOut"
                              x-placement="bottom-start"
                              style="
                                position: absolute;
                                transform: translate3d(0px, 41px, 0px);
                                top: 0px;
                                left: 0px;
                                will-change: transform;
                              "
                            >
                              <a
                                class="dropdown-item waves-light waves-effect"
                                href="#"
                                data-toggle="modal"
                                data-target="#saveModal"
                                >Guardar para después</a
                              >
                              <a
                                class="dropdown-item waves-light waves-effect"
                                href="#"
                                data-toggle="modal"
                                data-target="#createProductModal"
                                >Crear producto</a
                              >
                              <a
                                class="dropdown-item waves-light waves-effect"
                                href="#"
                                data-toggle="modal"
                                data-target="#createClientModal"
                                >Crear cliente</a
                              >
                              <a
                                class="dropdown-item waves-light waves-effect"
                                href="#"
                                data-toggle="modal"
                                data-target="#cleanCartModal"
                                >Quitar productos</a
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-block">
                      <div class="row">
                        <!--LEFT COLUMN-->
                        <div class="col-sm-5">
                          <h4 class="sub-title">Buscar productos</h4>
                          <form>
                            <div class="form-group row">
                              <div class="col-sm-12">
                                <div class="input-group">
                                  <span class="input-group-addon input-icon"
                                    ><i class="icofont icofont-bar-code"></i
                                  ></span>
                                  <input
                                    type="text"
                                    class="
                                      form-control form-control-lg
                                      input-autofocus
                                    "
                                    title=""
                                    data-toggle="tooltip"
                                    placeholder="Inserte código de barras"
                                    v-model="barcode"
                                    id="bar-code"
                                    @focusout="barcode = null"
                                    @keyup="inputBarcode"
                                  />
                                  <!-- @focusout="barcode = null" -->
                                </div>

                                <div class="input-group">
                                  <span class="input-group-addon input-icon"
                                    ><i class="icofont icofont-search"></i
                                  ></span>
                                  <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    title=""
                                    data-toggle="tooltip"
                                    placeholder="Buscar producto"
                                    v-model="findProductInput"
                                  />

                                  <table
                                    v-if="searchProductIsActive"
                                    class="
                                      table
                                      border border-green
                                      table-hover
                                    "
                                  >
                                    <thead class="thead-green">
                                      <tr>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Precio</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>
                                          Coca-Cola light 600 ml Retornable
                                        </td>
                                        <td>$15.00</td>
                                        <td>
                                          <button
                                            type="button"
                                            class="btn btn-outline-dark"
                                          >
                                            <i
                                              class="fa fa-cart-plus"
                                              aria-hidden="true"
                                            ></i>
                                          </button>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Galleta Emperador Chocolate</td>
                                        <td>$11.00</td>
                                        <td>
                                          <button
                                            type="button"
                                            class="btn btn-outline-dark"
                                          >
                                            <i
                                              class="fa fa-cart-plus"
                                              aria-hidden="true"
                                            ></i>
                                          </button>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Agua Mineral desechable 1lt</td>
                                        <td>$25.00</td>
                                        <td>
                                          <button
                                            type="button"
                                            class="btn btn-outline-dark"
                                          >
                                            <i
                                              class="fa fa-cart-plus"
                                              aria-hidden="true"
                                            ></i>
                                          </button>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-12">
                                <div class="col-lg-12 col-xl-12">
                                  <div class="sub-title">Método de pago</div>
                                  <!-- Nav tabs -->
                                  <ul
                                    class="
                                      nav nav-tabs
                                      md-tabs
                                      tabs-left
                                      b-none
                                    "
                                    role="tablist"
                                  >
                                    <li class="nav-item">
                                      <a
                                        class="nav-link active"
                                        data-toggle="tab"
                                        href="#home5"
                                        role="tab"
                                        aria-expanded="false"
                                        >Efectivo</a
                                      >
                                      <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                      <a
                                        class="nav-link"
                                        data-toggle="tab"
                                        href="#profile5"
                                        role="tab"
                                        aria-expanded="false"
                                        >Tarjeta</a
                                      >
                                      <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                      <a
                                        class="nav-link"
                                        data-toggle="tab"
                                        href="#transfer"
                                        role="tab"
                                        aria-expanded="false"
                                        >Transferir</a
                                      >
                                      <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                      <a
                                        class="nav-link"
                                        data-toggle="tab"
                                        href="#messages5"
                                        role="tab"
                                        aria-expanded="true"
                                        >Cliente</a
                                      >
                                      <div class="slide"></div>
                                    </li>
                                  </ul>
                                  <!-- Tab panes -->
                                  <div
                                    class="
                                      tab-content
                                      tabs-left-content
                                      card-block
                                    "
                                  >
                                    <div
                                      class="tab-pane active"
                                      id="home5"
                                      role="tabpanel"
                                      aria-expanded="false"
                                    >
                                      <p class="m-0">Efectivo seleccionado</p>
                                    </div>
                                    <div
                                      class="tab-pane"
                                      id="profile5"
                                      role="tabpanel"
                                      aria-expanded="false"
                                    >
                                      <p class="m-0">Tarjeta seleccionada</p>
                                    </div>
                                    <div
                                      class="tab-pane"
                                      id="transfer"
                                      role="tabpanel"
                                      aria-expanded="false"
                                    >
                                      <p class="m-0">
                                        Estos productos serán transferidos
                                      </p>
                                    </div>
                                    <div
                                      class="tab-pane row"
                                      id="messages5"
                                      role="tabpanel"
                                    >
                                      <!-- aria-expanded="true" -->
                                      <div class="form-group">
                                        <div class="col-sm-12">
                                          <div class="input-group">
                                            <span class="input-group-addon"
                                              ><i
                                                class="icofont icofont-search"
                                              ></i
                                            ></span>
                                            <input
                                              type="text"
                                              class="form-control"
                                              placeholder="Buscar cliente"
                                              data-original-title=""
                                            />
                                          </div>

                                          <h6>
                                            Emmanuel Fernandez Rodriguez
                                            <span class="pl-2"
                                              ><a
                                                data-toggle="modal"
                                                data-target="#deleteClient"
                                                class="label label-danger btn"
                                                >X</a
                                              ></span
                                            >
                                          </h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!--END LEFT COLUMN-->

                        <!--RIGHT COLUMN-->
                        <div class="col-sm-7 mobile-inputs">
                          <div>
                            <h4 class="sub-title">Productos añadidos</h4>
                            <div class="table-sub-table">
                              <div class="card-block table-border-style">
                                <div class="table-responsive">
                                  <table
                                    class="table table-hover"
                                    v-if="basket.length > 0"
                                  >
                                    <thead>
                                      <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Opciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr
                                        v-for="product in basket"
                                        :key="product.product_id"
                                      >
                                        <td class="table-name">
                                          <div class="row">
                                            <div class="col-xl-11">
                                              <a
                                                href=""
                                                data-toggle="modal"
                                                data-target="#myModal"
                                                >{{
                                                  shortProductName(product.name)
                                                }}</a
                                              >
                                            </div>
                                          </div>
                                        </td>
                                        <td class="table-price">
                                          ${{ product.price }}
                                        </td>
                                        <td class="table-input">
                                          <input
                                            type="number"
                                            class="form-control form-control-sm"
                                            placeholder="Cantidad"
                                            :value="product.qty"
                                          />
                                        </td>
                                        <td>
                                          <div class="table-options">
                                            <a
                                              href="#"
                                              data-toggle="modal"
                                              data-target="#deleteProduct"
                                              ><i class="ti-trash"></i
                                            ></a>
                                          </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <div class="p-4" v-if="basket.length > 5">
                                    <nav aria-label="Page navigation example">
                                      <ul
                                        class="pagination justify-content-end"
                                      >
                                        <li class="page-item disabled">
                                          <a
                                            class="page-link"
                                            href="#"
                                            tabindex="-1"
                                            >Anterior</a
                                          >
                                        </li>
                                        <li class="page-item active">
                                          <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                          <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                          <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                          <a class="page-link" href="#"
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

                          <div
                            class="sell-summary pt-5"
                            v-if="basket.length > 0"
                          >
                            <div class="row">
                              <h3>
                                Total: <strong>${{ getTotal }}</strong>
                              </h3>
                            </div>
                            <div class="row pr-3">
                              <button
                                class="btn btn-success"
                                data-toggle="modal"
                                data-target="#confirmSell"
                              >
                                Pagar
                              </button>
                            </div>
                          </div>
                        </div>
                        <!--END RIGHT COLUMN-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="styleSelector"></div>
      </div>
    </div>
  </div>
</template>

<script>
import BarcodeFinder from "./BarcodeFinder.vue";
export default {
  components: { BarcodeFinder },

  data() {
    return {
      barcode: null,
      product: {},
      basket: [],
      selectedStoreId: 1,

      timeOutBarcode: "",
      total: 0,
      findProductInput: "",
    };
  },

  methods: {
    searchByBarcode: function () {
      axios
        .get("/api/products/barcode-search", {
          params: {
            store_id: this.selectedStoreId,
            barcode: this.barcode,
          },
        })
        .then((response) => {
          console.log("response.data");
          console.log(response.data);
          if (response.data !== "") {
            this.product = response.data;
            this.addToBasket(this.product);
          }
        });
    },

    inputBarcode() {
      clearTimeout(this.timeOutBarcode);
      if (this.getBarcode.length > 3)
        this.timeOutBarcode = setTimeout(this.searchByBarcode, 10);
    },

    pushToBasket(product, qty) {
      console.log("pushing to car with qty of: " + qty);
      this.basket.push({
        product_id: product.id,
        store_id: this.selectedStoreId,
        name: product.name,
        qty: qty,
        current_qty: product.qty,
        price: product.price,
        status: 1,
      });
      product.qty--;
    },

    addToBasket(product) {
      // When product "A" is added first time.
      if (this.basket.length < 1 && product.qty > 0) {
        this.pushToBasket(product, 1);
        this.barcode = null;
        return;
      }

      let productInBacket = {};
      let duplicate = false;

      for (var i = 0; i < this.basket.length; i++) {
        if (this.basket[i].product_id === product.id) {
          productInBacket = this.basket[i];
          duplicate = true;
        }
      }

      console.log("this.miniCart.length: " + this.basket.length);
      console.log("duplicate: " + duplicate);
      console.log("product.qtyy>0: " + product.qty > 0);

      // If product "A" is already added, increase cart qty and decrease current product "A" qty.
      if (duplicate && productInBacket.qty != product.qty) {
        console.log("duplicate found");
        for (var i = 0; i < this.basket.length; i++) {
          if (this.basket[i].product_id === product.id) {
            this.basket[i].qty = this.basket[i].qty + 1;
            //this.basket[i].current_qty--;
            //product.qty--;
          }
        }
      }

      // If product "B" has not been added before.
      if (!duplicate && product.qty > 0) {
        this.pushToBasket(product, 1);
      }

      if (productInBacket.qty == product.qty) {
        alert("No hay más productos.");
      }

      this.barcode = null;
      //this.product = {};
    },

    shortProductName(product) {
      let short = product.substring(0, 30);
      short = short.length >= 30 ? short + "... " : short;
      return short;
    },
  }, // end methods

  computed: {
    getBarcode() {
      return this.barcode;
    },

    getTotal() {
      let total = 0;
      for (var i = 0; i < this.basket.length; i++) {
        total = total + this.basket[i].qty * this.basket[i].price;
      }
      return parseFloat(total).toFixed(2);
    },

    searchProductIsActive: function () {
      return this.findProductInput.length > 2;
    },
  },

  // watch: {
  //   barcode() {
  //     this.searchByBarcode();
  //   },
  // },

  // created() {
  //   this.getProducts();
  // },
};
</script>

<style>
</style>