<template>
  <div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Precio de venta</th>
          <th>Imagen</th>
          <th v-show="this.editingProduct">Nuevos</th>
          <!-- <th>Precio de compra</th> -->
          <th>Ubicación</th>
          <th>Existentes</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <!-- @foreach($products as $product)-->
        <tr v-if="products.length < 1">
          <td colspan="7">Sin productos</td>
        </tr>

        <tr v-for="(product, index) in products" :key="index">
          <td class="table-name">
            <div class="row">
              <div class="col-xl-11">
                <!-- <a :href="'products/' + product.id + '/edit'">
                </a> -->
                <a style="cursor: pointer" @click="showPicture(product)">
                  {{ shortName(product.name, 35) }}
                </a>
              </div>
            </div>
          </td>

          <!--NEW EDIT MODE-->
          <td v-if="product.editing" class="table-new-product">
            <div class="row">
              <div class="col-xl-11 wrapper">
                <!--input type="number" :value="this.new" /-->
                <product-component
                  :current_qty="product.qty"
                  @qtyChanged="sum_qty = $event"
                />
                {{}}
              </div>
            </div>
          </td>

          <!-- <td class="table-bought-product">
            <div class="row">
              <div class="col-xl-11" v-show="product.cost_price">
                ${{ product.cost_price }}
              </div>
            </div>
          </td> -->

          <td class="table-sell-product">
            <div class="row">
              <div class="col-xl-11">
                <strong>${{ product.price }}</strong>
              </div>
            </div>
          </td>

          <td>
            <a @click="showPicture(product)"
              ><img :src="product.primary_picture" alt="" class="rounded" />
            </a>
          </td>

          <td class="table-name">
            <div class="row">
              <div class="col-xl-11">
                <!-- <a :href="'products/' + product.id + '/edit'">
                </a> -->
                <a
                  v-if="product.location_id"
                  :href="'/location/' + product.location_id + '/edit'"
                  target="blank"
                >
                  {{ shortName(product.location_name, 25) }}
                </a>
              </div>
            </div>
          </td>

          <td class="table-existing-product">
            <div class="row">
              <div class="col-xl-11 existing-product">
                <!--QTY READ MODE-->
                <div v-if="product.unit" class="product-current-qty">
                  {{ product.qty + " " }}
                  <span style="font-size: 10px"
                    ><strong>{{ product.unit }}</strong></span
                  >
                </div>
                <div v-else class="product-current-qty">
                  {{ product.qty }}
                </div>
              </div>
            </div>
          </td>
          <td>
            <!--READ MODE-->
            <div v-if="!product.editing" class="table-options">
              <button
                class="btn"
                @click="addToCart(product)"
                :disabled="product.qty < 1"
              >
                <i class="ti-shopping-cart"></i>
              </button>

              <button v-show="false" class="btn" @click="editProduct(product)">
                <i class="ti-pencil-alt"></i>
              </button>
            </div>

            <!--EDIT MODE-->
            <div v-if="product.editing" class="table-options">
              <button class="btn" @click="cancelEdit(product)">
                <i class="ti-close"></i>
              </button>

              <button class="btn" @click="submitEdit(product)">
                <i class="ti-check"></i>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <product-details
      :product="selectedProduct"
      @addedToCart="addToCartFromModal"
    ></product-details>
  </div>
</template>

<script>
import productComponent from "./ProductComponent";
import ProductDetails from "./ProductDetails.vue";

export default {
  components: { ProductDetails },
  props: ["products", "store_id"],

  data() {
    return {
      editingProduct: false,
      current_qty: 0,
      sum_qty: 0,
      miniCart: [],
      receivedProducts: null,
      selectedProduct: {},
    };
  },

  methods: {
    addToCartFromModal() {
      this.addToCart(this.selectedProduct);
    },

    shortName(name, maxLength) {
      if (name == null) {
        return name;
      }
      let short = name.substring(0, maxLength);
      if (short.length < name.length) {
        return short + "...";
      } else {
        return short;
      }
    },

    editProduct(product) {
      this.editingProduct = !product.editing;
      product.editing = !product.editing;
      this.new_qty = 0;
      this.current_qty = product.qty;
    },

    cancelEdit(product) {
      this.editingProduct = false;
      product.editing = false;
      this.new_qty = 0;
      this.current_qty = 0;
    },

    addToCart(product) {
      // When product "A" is added first time.
      if (this.miniCart.length < 1 && product.qty > 0) {
        this.pushToMiniCart(product, 1);

        //this.miniCart.push({"originalQty": "product.qty"});
        //Object.assign({originalQty: product.qty}, this.miniCart);
        this.$emit("miniCartChanged", this.miniCart);
        this.$root.$emit("sharingCart", this.miniCart);
        return; // When cart is empty, add product "A", emit, and skip rest of the logic.
      }

      // Determine if product "A" is already added.
      let duplicate = false;
      for (var i = 0; i < this.miniCart.length; i++) {
        if (this.miniCart[i].product_id === product.id) {
          duplicate = true;
        }
      }

      console.log("this.miniCart.length: " + this.miniCart.length);
      console.log("duplicate: " + duplicate);
      console.log("product.qtyy>0: " + product.qty > 0);

      // If product "A" is already added, increase cart qty and decrease current product "A" qty.
      if (duplicate && product.qty > 0) {
        console.log("duplicate found");
        for (var i = 0; i < this.miniCart.length; i++) {
          if (this.miniCart[i].product_id === product.id) {
            this.miniCart[i].qty = this.miniCart[i].qty + 1;
            product.qty--;
          }
        }
      }

      // If product "B" has not been added before.
      if (!duplicate && product.qty > 0) {
        this.pushToMiniCart(product, 1);
      }

      // Alert the user that he/she la está cagando.
      // trigger warning when there are no products
      if (product.qty == 0) {
        this.fireWarning("Sin productos");
      }

      console.log("-------------------------------");
      this.$emit("miniCartChanged", this.miniCart);
      this.$root.$emit("sharingCart", this.miniCart);
    },

    pushToMiniCart(product, qty) {
      console.log("pushing to car with qty of: " + qty);
      this.miniCart.push({
        product_id: product.id,
        store_id: this.store_id,
        name: product.name,
        qty: qty,
        current_qty: product.qty,
        price: product.price,
        status: 1,
      });
      product.qty--;
    },

    waitForProducts() {
      if (this.products.length < 1) {
        setTimeout(() => {
          console.log("Waiting for products in ProductsTableComponent");
          this.waitForProducts();
        }, 400);
      } else {
        //this.receivedProducts = this.products;
      }
      //console.log('Picture: ' + this.products[5].picture.path);
    },

    fireWarning(message) {
      this.$fire({
        title: "Advertencia",
        text: message,
        type: "warning",
        timer: 3000,
      });
    },

    showPicture(product) {
      this.selectedProduct = product;
      this.$fire({
        title: product.name,
        footer:
          '<a href="products/' + product.id + '/edit">Editar producto</a>',
        imageUrl: product.primary_picture,
        imageWidth: 250,
        html:
          '<ul class="list-group"><li class="list-group-item d-flex justify-content-between align-items-center">Precio<span><strong>$' +
          product.price +
          "</strong></span></li></ul>",
        imageAlt: "Custom image",
        imageClass: "img-responsive",
      });
    },
  },

  computed: {
    sumQty() {
      return (this.sum_qty = this.current_qty + this.new_qty);
    },
  },

  mounted() {
    this.waitForProducts();
  },
};
</script>

<style scoped>
.wrapper input {
  width: 80px;
  text-align: center;
  font-size: 20px;
}

table img {
  cursor: pointer;
  max-height: 45px;
}
</style>