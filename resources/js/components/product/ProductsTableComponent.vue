<template>
  <div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Existentes</th>
          <th v-show="this.editingProduct">Nuevos</th>
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
        <tr v-if="products.length < 1">
          <td colspan="7">Sin productos</td>
        </tr>

        <tr v-for="(product, index) in products" :key="index">
          <td class="table-name">
            <div class="row">
              <div class="col-xl-11">
                <a :href="'products/' + product.id + '/edit'">
                  {{ shortProductName(product.name) }}
                </a>
              </div>
            </div>
          </td>

          <td class="table-existing-product">
            <div class="row">
              <div class="col-xl-11 existing-product">
                <!--QTY READ MODE-->
                <div class="product-current-qty">
                  {{ product.qty }}
                </div>

                <!--<div v-if="!product.editing" class="product-item">
                  <input
                    class="form-control"
                    type="number"
                    v-model="product.qty"
                    @keyup.enter="doneEdit(product)"
                    @blur="doneEdit(product)"
                    @keyup.esc="cancelEdit(product)"
                  />
                </div>-->
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

          <td class="table-bought-product">
            <div class="row">
              <div class="col-xl-11" v-show="product.cost_price">
                ${{ product.cost_price }}
              </div>
            </div>
          </td>

          <td class="table-sell-product">
            <div class="row">
              <div class="col-xl-11">
                <strong>${{ product.price }}</strong>
              </div>
            </div>
          </td>

          <td>
            <a href="#!" data-toggle="modal" data-target="#myModal"
              ><img
                :src="product.primary_picture"
                alt=""
                class="img-40 rounded"
              />
            </a>
          </td>
          <td>
            <!--READ MODE-->
            <div v-if="!product.editing" class="table-options">
              <button class="btn" @click="addToCart(product)">
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
  </div>
</template>

<script>
import productComponent from "./ProductComponent";

export default {
  props: ["products", "store_id"],

  data() {
    return {
      editingProduct: false,
      current_qty: 0,
      sum_qty: 0,
      miniCart: [],
      receivedProducts: null,
    };
  },

  methods: {
    shortProductName(product) {
      let shortName = product.substring(0, 35);
      return product.length >= 35 ? shortName + "..." : shortName;
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
      if (product.qty < 1) {
        alert("No hay más productos.");
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
</style>