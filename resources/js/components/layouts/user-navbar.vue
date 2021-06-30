<template>
  <div>
    <nav
      class="
        navbar navbar-expand-md navbar-dark
        topbar
        shadow
        fixed-top
        navbar-default
      "
      style="margin-bottom: 300px; background-color: white"
    >
      <!-- Sidebar Toggle (Topbar) -->
      <button
        id="sidebarToggleTop"
        class="btn btn-link d-md-none rounded-circle mr-3"
      >
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="searchDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div
            class="
              dropdown-menu dropdown-menu-right
              p-3
              shadow
              animated--grow-in
            "
            aria-labelledby="searchDropdown"
          >
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control bg-light border-0 small"
                  placeholder="Search for..."
                  aria-label="Search"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!--CART-->

        <li class="nav-item dropdown pt-2">
          <button class="" data-target="#miniCartModal" data-toggle="modal">
            <i class="icofont icofont-cart icofont-alt"></i>Carrito
            <label class="badge badge-danger">{{ getTotalQtyMiniCart }}</label>
          </button>
        </li>

        <!---END CART-->

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="userDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
            <img
              class="img-profile rounded-circle"
              src="https://source.unsplash.com/QAB-WJcbgJk/60x60"
            />
          </a>
          <!-- Dropdown - User Information -->
          <div
            class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown"
          >
            <a class="dropdown-item" href="#">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-700"></i>
              Perfil
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-store-alt fa-sm fa-fw mr-2 text-gray-700"></i>
              Casa Pineiro
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-store fa-sm fa-fw mr-2 text-gray-700"></i>
              Tendejón Evelyn
            </a>
            <a class="dropdown-item" href="">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-700"></i>
              Todos los productos
            </a>
            <div class="dropdown-divider"></div>
            <a
              class="dropdown-item"
              href="#"
              data-toggle="modal"
              data-target="#logoutModal"
            >
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Cerrar sesión
            </a>
          </div>
        </li>
      </ul>
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
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
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
export default {
  data() {
    return {
      miniCart: [],
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
      return total;
    },
  },

  methods: {
    shortProductName(product) {
      let short = product.substring(0, 30);
      short = short.length >= 30 ? short + "... " : short;
      return short;
    },

    addCartQty(product) {
      product.qty = product.qty + 1;
      this.$root.$emit("shareCart", this.miniCart);
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
      miniCart.forEach((product) => {
        axios.post("/api/sales", product).then((response) => {
          console.log(response);
        });
      });
      this.miniCart.splice(0, this.miniCart.length);
    // get the total of items of this.miniCart 
    },

    logout() {
      axios.post("/logout").then((resp) => {
        console.log("resp: " + resp);
        localStorage.setItem("user_token", "");
        window.location.href = "login";
      });
    },
  },

  mounted() {
    this.$root.$on("sharingCart", (data) => {
      this.miniCart = data;
    });
  },
};
</script>

<style>
</style>