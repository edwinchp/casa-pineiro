<template>
  <div>
    <nav
      class="
        navbar navbar-expand-lg navbar-light
        bg-light
        fixed-top
        align-items-center
      "
    >
      <a href="/" class="logo d-flex flex-row align-items-center"
        >Ferretería<span class="pl-2 pr-1"> Cable</span
        ><img src="/images/layouts/cable-de-energia-flip.png" alt=""
      /></a>

      <button
        v-if="basket.length > 0"
        class="btn btn-outline-success my-2 my-sm-0"
        data-toggle="modal"
        data-target="#basketModal"
      >
        Carrito
        <span class="badge badge-warning">{{ getTotalQtyBasket }}</span>
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
        <a href="/sales/create">
          <button type="button" class="btn btn-primary">Nueva Ventas</button></a
        >
        <a href="/products/create">
          <button type="button" class="btn btn-success">
            Nuevo Producto
          </button></a
        >
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a
              v-if="userInformation"
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              {{ userInformation.user.name }}
            </a>

            <div
              class="dropdown-menu my-profile"
              aria-labelledby="navbarDropdown"
            >
              <a v-if="isAdmin" href="/register"
                ><i class="icofont icofont-user dropdown-item">
                  Crear usuario
                </i></a
              >
              <div v-if="isAdmin" class="dropdown-divider"></div>
              <a href="/sales"
                ><i class="icofont icofont-money dropdown-item"> Ventas</i></a
              >
              <a href="/products"
                ><i class="icofont icofont-food-basket dropdown-item">
                  Productos</i
                ></a
              >
              <a href="/location"
                ><i class="icofont icofont-location-pin dropdown-item">
                  Ubicación</i
                ></a
              >
              <a href="/supplier"
                ><i class="icofont icofont-truck-alt dropdown-item">
                  Proveedores</i
                ></a
              >
              <a href="#" data-toggle="modal" data-target="#logoutModal"
                ><i class="icofont icofont-exit dropdown-item">
                  Cerrar sesión</i
                ></a
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
            <h5 class="modal-title" id="exampleModalLabel">¿Cerrar sesión?</h5>
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
            Seleccione "Cerrar sesión" a continuación si está listo para
            finalizar su sesión actual.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancelar
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
      id="basketModal"
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
                <tr v-for="(product, p) in basket" :key="p">
                  <th scope="row">{{ shortProductName(product.name) }}</th>
                  <td>${{ product.price }}</td>
                  <td>
                    <button
                      class="btn btn-dark btn-sm btn-td"
                      @click="reduceProductQty(product)"
                    >
                      -
                    </button>
                    {{ product.qty }}
                    <button
                      class="btn btn-dark btn-sm btn-td"
                      @click="addProductQty(product)"
                      :disabled="product.qty >= product.current_qty"
                    >
                      +
                    </button>
                  </td>
                  <td>${{ getSubTotal(product.price, product.qty) }}</td>
                  <td>
                    <button
                      class="btn btn-danger btn-sm btn-td btn-td-delete"
                      @click="removeProductFromCart(product)"
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
                      ><strong>Total: ${{ getTotalPriceBasket }}</strong></span
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
                      <!-- <form action="" @submit="checkoutBasket(basket)">
                        <button
                          @click.prevent="checkoutBasket(basket)"
                          type="submit"
                          data-dismiss="modal"
                          class="btn btn-success"
                        >
                          <span class="text"
                            ><strong
                              >Pagar ${{ getTotalPriceBasket }}</strong
                            ></span
                          >
                        </button>
                      </form> -->

                      <pay-button
                        :basket="basket"
                        :total="getTotalPriceBasket"
                        :received="getReceived"
                        :change="getChange"
                        :allowPayment="allowPayment"
                        @paymentSuccess="paymentSuccess"
                        :textSize="16"
                        :store_id="userInformation.user.stores[0].id"
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
import { userInformationMixin } from "../mixins/userInformationMixin";
import { basketMixin } from "../mixins/basketMixin";

export default {
  components: { PayButton },

  mixins: [userInformationMixin, basketMixin],

  data() {
    return {
      basket: [],
      customers: null,
      customer_id: null,
      showContent: false,
      windowWidth: window.innerWidth,
      tableClasses: "",

      received: "",
      allowPayment: false,
      change: "",
      //userInformation: {},
    };
  },

  computed: {
    /**
     * MINI CART
     */
    getTotalQtyBasket() {
      let total = 0;
      for (var i = 0; i < this.basket.length; i++) {
        total = total + this.basket[i].qty;
      }
      return total;
    },

    getTotalPriceBasket() {
      let total = 0;
      for (var i = 0; i < this.basket.length; i++) {
        total = total + this.basket[i].qty * this.basket[i].price;
      }
      return parseFloat(total).toFixed(2);
    },

    getReceived() {
      return this.received;
    },

    getChange() {
      if (
        parseFloat(this.getReceived) >= parseFloat(this.getTotalPriceBasket)
      ) {
        this.change =
          parseFloat(this.getReceived) - parseFloat(this.getTotalPriceBasket);
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

    // getUserInformation() {
    //   axios.get("/api/user-information/").then((response) => {
    //     this.userInformation = response.data;
    //   });
    // },

    shortProductName(product) {
      let short = product.substring(0, 30);
      short = short.length >= 30 ? short + "... " : short;
      return short;
    },

    getSubTotal(price, qty) {
      return parseFloat(price * qty).toFixed(2);
    },

    checkoutBasket(basket) {
      basket.forEach((product) => {
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
      this.basket.splice(0, this.basket.length);
      // get the total of items of this.basket
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
      this.basket = [];
      document.getElementById("closeModal").click();
      setTimeout(() => {
        location.reload();
      }, 2500);
    },
  },

  mounted() {
    this.$root.$on("sharingCart", (data) => {
      this.basket = data;
    });

    this.$root.$on("clearCart", (data) => {
      this.basket.splice(0, this.basket.length);
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
    //this.getUserInformation();
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

.collapse {
  margin-right: 3rem;
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

.logo img {
  width: 17px;
  height: 17px;
  transform: scaleY(1);
}

.logo {
  font-size: 1.6rem;
  font-weight: bolder;
  color: rgb(68, 66, 66);
  margin-right: 2rem;
}

.logo span {
  color: black;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-menu {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 10%;
  border-radius: 1rem;
  margin-top: -3px;
}

.dropdown-menu a {
  color: rgb(41, 40, 40);
  padding: 15px 15px;
  text-decoration: none;
  display: block;
  width: 13rem;
}

.dropdown-menu a i {
  padding-right: 0;
  text-align: left;
}

.dropdown-menu a:hover {
  background-color: #a8a4a4;
}
.dropdown-menu i:hover {
  background-color: #a8a4a4;
}

.dropdown:hover .dropdown-menu {
  display: block;
}

.btn-primary {
  border-radius: 0.5rem;
  margin-left: 0;
}

.btn-primary a {
  color: white;
}

.btn-success {
  border-radius: 0.5rem;
  margin-left: 0.5rem;
}

.btn-success a {
  color: white;
}
</style>