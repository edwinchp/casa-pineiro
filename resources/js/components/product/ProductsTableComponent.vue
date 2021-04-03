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
                <div v-if="!product.editing" class="product-current-qty">
                  {{ product.cp_qty }}
                </div>

                <!--QTY EDIT MODE-->
                <div v-if="product.editing" class="wrapper">
                  <input
                    type="number"
                    :value="product.cp_qty"
                    @keyup.enter="doneEdit(product)"
                  />
                </div>

                <!--<div v-if="!product.editing" class="product-item">
                  <input
                    class="form-control"
                    type="number"
                    v-model="product.cp_qty"
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
                <input type="number" :value="this.newQty" />
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
            <!--READ MODE-->
            <div v-if="!product.editing" class="table-options">
              <button
                class="btn"
                data-toggle="tooltip"
                data-placement="bottom"
                data-original-title="Añadir al carrito"
              >
                <i class="ti-shopping-cart"></i>
              </button>

              <button
                class="btn"
                data-toggle="tooltip"
                data-placement="bottom"
                data-original-title="Editar"
                @click="editProduct(product)"
              >
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
export default {
  props: ["products"],

  data() {
    return {
      editingProduct: false,
      newQty: 0,
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
    },

    cancelEdit(product) {
      this.editingProduct = false;
      product.editing = false;
    },
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