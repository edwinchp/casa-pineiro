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
                          <!-- <div class="dropdown-inverse dropdown open show">
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
                          </div> -->
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
                                    @keyup="seachProducts"
                                  />
                                  <div class="container">
                                    <div class="row">
                                      <div class="col-12">
                                        <div class="stable-responsive">
                                          <table
                                            v-if="
                                              searchProductIsActive &&
                                              productsFound.length > 0
                                            "
                                            class="
                                              table
                                              users
                                              table-hover table-responsive
                                            "
                                          >
                                            <thead class="thead-green">
                                              <tr id="tablita">
                                                <th scope="col">Producto</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Cantidad</th>
                                                <th></th>
                                              </tr>
                                            </thead>

                                            <tbody>
                                              <tr
                                                v-for="product in productsFound"
                                                :key="product.id"
                                              >
                                                <td
                                                  data-toggle="tooltip"
                                                  data-placement="bottom"
                                                  :title="product.name"
                                                >
                                                  {{
                                                    shortProductName(
                                                      product.name
                                                    )
                                                  }}
                                                </td>

                                                <td>${{ product.price }}</td>
                                                <td>
                                                  <div
                                                    v-if="product.unit"
                                                    class="product-current-qty"
                                                  >
                                                    {{
                                                      product.original_qty + " "
                                                    }}
                                                    <span
                                                      style="font-size: 10px"
                                                      ><strong>{{
                                                        product.unit
                                                      }}</strong></span
                                                    >
                                                  </div>
                                                  <div
                                                    v-else
                                                    class="product-current-qty"
                                                  >
                                                    {{ product.original }}
                                                  </div>
                                                </td>

                                                <td>
                                                  <button
                                                    @click="
                                                      addToBasket(product)
                                                    "
                                                    type="button"
                                                    class="btn btn-outline-dark"
                                                    :disabled="
                                                      product.status !== 'A'
                                                    "
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
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!--<div class="form-group row">
                              <div class="col-sm-12">
                                <div class="col-lg-12 col-xl-12">
                                  <div class="sub-title">Método de pago</div>
                                   Nav tabs 
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
                                  <! Tab panes 
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
                                      <! aria-expanded="true" 
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
                            </div>-->
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
                                        <td
                                          class="table-name"
                                          data-toggle="tooltip"
                                          data-placement="bottom"
                                          :title="product.name"
                                        >
                                          <div class="row">
                                            <div class="col-xl-11">
                                              <a
                                                :href="
                                                  '/products/' +
                                                  product.product_id +
                                                  '/edit'
                                                "
                                                target="blank"
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
                                          <div class="form-group row">
                                            <div class="col-sm-12">
                                              <div class="input-group">
                                                <button
                                                  class="
                                                    btn btn-dark btn-sm btn-td
                                                  "
                                                  @click="
                                                    reduceProductQty(product)
                                                  "
                                                >
                                                  -
                                                </button>
                                                <button
                                                  class="
                                                    btn btn-dark btn-sm btn-td
                                                  "
                                                  @click="
                                                    addProductQty(product)
                                                  "
                                                  :disabled="
                                                    product.qty >=
                                                    product.current_qty
                                                  "
                                                >
                                                  +
                                                </button>
                                                <input
                                                  type="text"
                                                  class="form-control"
                                                  id="inlineFormInputGroupUsername"
                                                  placeholder="Cantidad"
                                                  v-model="product.qty"
                                                />
                                                <div
                                                  class="input-group-prepend"
                                                >
                                                  <div
                                                    v-if="product.unit"
                                                    class="input-group-text"
                                                  >
                                                    {{ product.unit }}
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            placeholder="Cantidad"
                                            v-model="product.qty"
                                            size="3"
                                            name="qty"
                                            id="qty"
                                          />
                                          <label for="qty">{{
                                            product.unit
                                          }}</label> -->

                                          <!-- <quantity-input :product="product"></quantity-input> -->
                                        </td>
                                        <td>
                                          <div class="table-options">
                                            <a
                                              href="#"
                                              data-toggle="modal"
                                              data-target="#deleteProduct"
                                              @click="removeFromBasket(product)"
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
                          <div class="d-flex justify-content-end">
                            <div
                              class="sell-summary pt-5"
                              v-if="basket.length > 0"
                            >
                              <div class="d-flex justify-content-end">
                                <div class="input-group mb-3 mr-3">
                                  <div class="input-group-prepend">
                                    <h6 class="mr-4 mt-2">
                                      <strong>Efectivo: </strong>
                                    </h6>
                                    <span class="input-group-text">$</span>
                                  </div>
                                  <input
                                    type="text"
                                    class="form-control"
                                    aria-label="Amount (to the nearest dollar)"
                                    v-model="received"
                                  />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="sell-change" v-if="basket.length > 0">
                            <div class="row mr-2">
                              <h5 class="text-right">
                                Cambio: <strong>${{ getChange }}</strong>
                              </h5>
                            </div>
                          </div>

                          <div class="sell-summary" v-if="basket.length > 0">
                            <div class="row mr-1" v-show="false">
                              <h3 class="text-right">
                                Total: <strong>${{ getTotal }}</strong>
                              </h3>
                            </div>

                            <div class="row mr-3">
                              <pay-button
                                :basket="basket"
                                :total="getTotal"
                                :received="getReceived"
                                :change="getChange"
                                :allowPayment="allowPayment"
                                @paymentSuccess="paymentSuccess"
                                :store_id="userInformation.user.stores[0].id"
                              ></pay-button>
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
import PayButton from "../PayButton.vue";
import { basketMixin } from "../../mixins/basketMixin";
export default {
  components: { BarcodeFinder, PayButton },
  mixins: [basketMixin],

  data() {
    return {
      barcode: null,
      product: {},
      basket: [],
      selectedStoreId: 1,

      timeOutBarcode: "",
      findProductTimeout: "",
      total: 0,
      findProductInput: "",
      productsFound: [],
      received: "",
      allowPayment: false,
      change: "",

      userInformation: {},
    };
  },

  methods: {
    searchByBarcode: function () {
      axios
        .get("/api/products/barcode-search", {
          params: {
            store_id: this.selectedStoreId,
            barcode: this.barcode,
            allStores: true,
          },
        })
        .then((response) => {
          console.log("response.data");
          console.log(response.data);
          if (response.data !== "") {
            this.product = response.data;
            this.product.original_qty = response.data.qty;
            this.addToBasket(this.product);
          }
        });
    },

    inputBarcode() {
      clearTimeout(this.timeOutBarcode);
      if (this.getBarcode.length > 3)
        this.timeOutBarcode = setTimeout(this.searchByBarcode, 250);
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
        unit: product.unit,
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

      // trigger warning when there are no products
      if (product.qty == 0) {
        this.fireWarning("Sin productos");
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
      if (duplicate && product.qty > 0) {
        console.log("duplicate found");
        for (var i = 0; i < this.basket.length; i++) {
          if (this.basket[i].product_id === product.id) {
            this.basket[i].qty = this.basket[i].qty + 1;
            //this.basket[i].current_qty--;
            product.qty--;
          }
        }
      }

      // If product "B" has not been added before.
      if (!duplicate && product.qty > 0) {
        this.pushToBasket(product, 1);
      }

      this.barcode = null;
      //this.product = {};
    },

    shortProductName(product) {
      let short = product.substring(0, 15);
      short = short.length >= 15 ? short + "... " : short;
      return short;
    },

    async getFoundProducts() {
      const url = "/api/products";
      const response = await axios
        .get(url, {
          params: {
            store_id: 1,
            productsFound: this.findProductInput,
            allStores: true,
          },
        })
        .then((resp) => {
          this.productsFound = resp.data;
          this.productsFound.forEach((product) => {
            product.original_qty = product.qty;
          });
        });
      //let data = await response.json();
      //console.log("aaaaaaaaaaaaaaaaaaaaaaaaaaasync getFoundProducts()")
      //console.log(data)
      return;
    },

    seachProducts() {
      if (this.searchProductIsActive) {
        clearTimeout(this.findProductTimeout);
        this.findProductTimeout = setTimeout(this.getFoundProducts, 500);
      }
      //this.getFoundProducts();
    },

    removeFromBasket(product) {
      this.basket.splice(
        this.basket.findIndex((a) => a.product_id === product.product_id),
        1
      );
      // if (this.miniCart.length < 1) {
      //   location.reload();
      // }
    },

    paymentSuccess() {
      this.basket = [];
      this.received = "";
      this.allowPayment = false;
      this.change = "";
      this.productsFound = [];
      this.findProductInput = "";
    },

    fireWarning(message) {
      this.$fire({
        title: "Advertencia",
        text: message,
        type: "warning",
        timer: 2500,
      });
    },

    getUserInformation() {
      axios.get("/api/user-information/").then((response) => {
        this.userInformation = response.data;
      });
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

    getReceived() {
      return this.received;
    },

    getChange() {
      if (parseFloat(this.getReceived) >= parseFloat(this.getTotal)) {
        this.change = this.getReceived - this.getTotal;
        this.allowPayment = true;
        return parseFloat(this.change).toFixed(2);
      } else {
        this.allowPayment = false;
        return "";
      }
    },
  },

  // watch: {
  //   barcode() {
  //     this.searchByBarcode();
  //   },
  // },

  created() {
    this.getFoundProducts()
      .then((r) => {
        console.log("huevos");
        console.log(r);
      })
      .catch((error) => {
        console.log("huevos con erros");
        console.log(error);
      });

    this.getUserInformation();
  },
};
</script>

<style scoped>
.btn-td {
  font-size: 20px;
  margin: 10px;
  text-align: center;
  margin: 0px 10px;
}
.btn-td-delete {
  font-size: 15px;
}
</style>

