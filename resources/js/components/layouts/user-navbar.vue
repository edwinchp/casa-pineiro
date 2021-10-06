<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="/">Casa Pineiro</a>

      <button
        v-if="miniCart.length > 0"
        class="btn btn-outline-success my-2 my-sm-0"
        data-toggle="modal"
        data-target="#miniCartModal"
      >
        Carrito
        <span class="badge badge-warning">{{ getTotalQtyMiniCart }}</span>
      </button>

      <button
        @click="showContent = !showContent"
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div
        class="collapse navbar-collapse"
        v-bind:class="{ show: showContent }"
      >
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Mi perfil
            </a>
            <div
              class="dropdown-menu my-profile"
              aria-labelledby="navbarDropdown"
            >
              <a class="dropdown-item" href="/sales">Ventas</a>
              <a class="dropdown-item" href="/products">Productos</a>
              <a class="dropdown-item" href="/customers">Clientes</a>
              <div class="dropdown-divider"></div>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="modal"
                data-target="#logoutModal"
                >Cerrar sesión</a
              >
            </div>
          </li>
        </ul>
      </div>

      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
    </nav>
    <!-- End of Topbar -->

    <!-- Logout Modal-->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
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
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <button class="btn btn-primary" href="" @click="logout">
              Cerrar sesión
            </button>

            <form
              id="logout-form"
              action=""
              method="POST"
              class="d-none"
            ></form>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="miniCartModal"
      tabindex="-20"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
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
            <table
              class="table"
              :class="tableClasses"
              style="table-layout: auto"
            >
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
                    <button
                      class="btn btn-dark btn-sm btn-td"
                      @click="reduceCartQty(product)"
                    >
                      -
                    </button>
                    {{ product.qty }}
                    <button
                      class="btn btn-dark btn-sm btn-td"
                      @click="addCartQty(product)"
                      :disabled="product.qty >= product.current_qty"
                    >
                      +
                    </button>
                  </td>
                  <td>${{ getSubTotal(product.price, product.qty) }}</td>
                  <td>
                    <button
                      class="btn btn-danger btn-sm btn-td btn-td-delete"
                      @click="removeFromCart(product)"
                    >
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <div class="col-md-6" v-show="false">
              <span>Cliente</span>
              <select name="select" class="form-control">
                <option @click="customer_id = null" value="G">Genérico</option>
                <option
                  v-for="customer in customers"
                  :key="customer.id"
                  @click="customer_id = customer.id"
                >
                  {{ customer.name }}
                </option>
              </select>
            </div>
            <div class="d-flex justify-content-end">
              <div class="sell-summary pt-">
                <div class="d-flex justify-content-end">
                  <div class="input-group mb-3 mr-3">
                    <div class="input-group-prepend">
                      <h6 class="mr-4 mt-2"><strong>Efectivo: </strong></h6>
                      <span class="input-group-text">$</span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      v-model="received"
                    />
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <div class="input-group mb-3 mr-3">
                    <div class="input-group-prepend">
                      <h6 class="mr-4 mt-2"><strong>Cambio: </strong></h6>
                      <span class="input-group-text">$</span>
                    </div>
                    <input
                      disabled
                      type="text"
                      class="form-control"
                      :value="getChange"
                    />
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <div class="input-group mb-3 mr-3">
                    <span class="text"
                      ><strong
                        >Total: ${{ getTotalPriceMiniCart }}</strong
                      ></span
                    >
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <div
                    class="btn-toolbar mr-2"
                    role="toolbar"
                    aria-label="Toolbar with button groups"
                  >
                    <div
                      class="btn-group mr-2"
                      role="group"
                      aria-label="First group"
                    >
                      <!-- <form action="" @submit="checkoutCart(miniCart)">
                        <button
                          @click.prevent="checkoutCart(miniCart)"
                          type="submit"
                          data-dismiss="modal"
                          class="btn btn-success"
                        >
                          <span class="text"
                            ><strong
                              >Pagar ${{ getTotalPriceMiniCart }}</strong
                            ></span
                          >
                        </button>
                      </form> -->

                      <pay-button
                        :basket="miniCart"
                        :total="getTotalPriceMiniCart"
                        :received="getReceived"
                        :change="getChange"
                        :allowPayment="allowPayment"
                        @paymentSuccess="paymentSuccess"
                        :textSize="16"
                      >
                      </pay-button>
                    </div>
                    <div
                      class="btn-group mr-2"
                      role="group"
                      aria-label="Second group"
                    >
                      <button
                        id="closeModal"
                        class="btn btn-secondary"
                        type="buuton"
                        data-dismiss="modal"
                      >
                        Cancelar
                      </button>
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
import PayButton from "../sales/PayButton.vue";
export default {
  components: { PayButton },

  data() {
    return {
      miniCart: [],
      customers: null,
      customer_id: null,
      showContent: false,
      windowWidth: window.innerWidth,
      tableClasses: "",

      received: "",
      allowPayment: false,
      change: "",
    };
  },

  computed: {
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
      return parseFloat(total).toFixed(2);
    },

    getReceived() {
      return this.received;
    },

    getChange() {
      if (
        parseFloat(this.getReceived) >= parseFloat(this.getTotalPriceMiniCart)
      ) {
        this.change =
          parseFloat(this.getReceived) - parseFloat(this.getTotalPriceMiniCart);
        this.allowPayment = true;
        return this.change;
      } else {
        return "";
      }
    },
  },

  methods: {
    getCustomers() {
      axios.get("/api/customer/").then((response) => {
        console.log(response);
        this.customers = response.data;
      });
    },

    shortProductName(product) {
      let short = product.substring(0, 30);
      short = short.length >= 30 ? short + "... " : short;
      return short;
    },

    addCartQty(product) {
      product.qty = product.qty + 1;
      this.$root.$emit("cartUpdated", product.product_id);
    },

    reduceCartQty(product) {
      product.qty = product.qty - 1;
      this.$root.$emit("cartUpdated", product.product_id);
      if (product.qty == 0) {
        this.removeFromCart(product);
      }
    },

    removeFromCart(product) {
      this.miniCart.splice(
        this.miniCart.findIndex((a) => a.product_id === product.product_id),
        1
      );
      if (this.miniCart.length < 1) {
        location.reload();
      }
    },

    getSubTotal(price, qty) {
      return parseFloat(price * qty).toFixed(2);
    },

    checkoutCart(miniCart) {
      miniCart.forEach((product) => {
        const formData = new FormData();

        formData.append("product_id", product.product_id);
        formData.append("store_id", product.store_id);
        formData.append("qty", product.qty);
        formData.append("price", product.price);
        formData.append("status", 1);
        if (this.customer_id) formData.append("customer_id", this.customer_id);

        axios
          .post("/api/sales", formData)
          .then((response) => {
            if (response.status === 201) {
              console.log("Pago exitoso");
            }
            console.log(response);
          })
          .catch((error) => {
            alert("No fue posible realizar el pago. Intente nuevamente");
            location.reload();
            console.log(error);
          });
      });
      this.miniCart.splice(0, this.miniCart.length);
      // get the total of items of this.miniCart
    },

    logout() {
      axios.post("/logout").then((resp) => {
        console.log("resp: " + resp);
        localStorage.setItem("user_token", "");
        window.location.href = "/login";
      });
    },

    onResize() {
      this.windowWidth = window.innerWidth;
    },

    updateTable(width) {
      if (width < 993) {
        this.tableClasses = "table-responsive";
      } else {
        this.tableClasses = "";
      }
    },

    paymentSuccess() {
      this.miniCart = [];
      document.getElementById("closeModal").click();
      setTimeout(() => {
        location.reload();
      }, 2500);
    },
  },

  mounted() {
    this.$root.$on("sharingCart", (data) => {
      this.miniCart = data;
    });

    this.$nextTick(() => {
      window.addEventListener("resize", this.onResize);
    });
  },

  watch: {
    windowWidth(newWidth, oldWidth) {
      this.updateTable(newWidth);
    },
  },

  created() {
    axios.defaults.headers.common["Authorization"] =
      "Bearer " + localStorage.getItem("user_token");
    this.getCustomers();
    this.updateTable(this.windowWidth);
  },
};
</script>

<style scoped>
@media (min-width: 768px) {
  .my-profile {
    margin-left: -70px;
  }

  table {
    table-layout: fixed;
  }
}

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