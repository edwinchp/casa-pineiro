<template>
  <div>
    <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          <h4>Nuevo producto</h4>
          <div class="card-header-left"></div>
        </div>
        <div class="card-block">
          <div class="row">
            <div class="col-md-12">
              <div class="form-row">
                <div class="col-md-8">
                  <label for="name">Nombre</label>
                  <input
                    type="text"
                    class="form-control"
                    name="name"
                    value=""
                    v-model="product.name"
                  />
                </div>

                <div class="col-md-3 offset-1 product-picture">
                  <div class="form-group">
                    <img src="" class="img-thumbnail" alt="..." />
                  </div>
                </div>
              </div>

              <div class="form-row pt-3">
                <div class="col-md-4">
                  <label for="bar_code">Código de barras</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-barcode"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      name="bar_code"
                      autocomplete="off"
                    />
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="brand">Marca</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-circle"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      name="brand"
                      autocomplete="off"
                    />
                  </div>
                </div>
                <br />
              </div>

              <div class="form-row pt-4">
                <div class="col-md-4">
                  <label for="cp_price">Precio al público</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-dollar-sign"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      name="cp_price"
                      autocomplete="off"
                    />
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="cp_price">Precio de compra</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-search-dollar"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      name="cp_price"
                      autocomplete="off"
                    />
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="qty">Cantidad</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-boxes"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      name="qty"
                      autocomplete="off"
                    />
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-4">
                  <label for="cp_offer_price">Precio de oferta</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-certificate"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      name="cp_offer_price"
                      value="sssss"
                      autocomplete="off"
                    />
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="cp_offer_duration">Días en oferta</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-calendar-alt"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      name="cp_offer_duration"
                      value="sssssss"
                      autocomplete="off"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-row">
                <div class="form-group pl-1">
                  <label for="description">Descripción</label>
                  <textarea
                    name="description"
                    id=""
                    cols="40"
                    rows="5"
                    class="form-control"
                  >
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quam unde culpa! Quas, sint mollitia ipsa rerum libero quos consequatur animi reprehenderit hic voluptatibus quasi quo ex repellat porro exercitationem!
                </textarea
                  >
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="location">Ubicación</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-map-marker-alt"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      name="location"
                      autocomplete="off"
                    />
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="delivery_option">Opción de envío</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-truck"></i
                      ></span>
                    </div>
                    <select
                      name="delivery_option"
                      id=""
                      class="form-control custom-select"
                    >
                      <option value="0">Seleccionar...</option>
                      <option value="1">Recoger en tienda</option>
                      <option value="2">Entrega a domicilio</option>
                      <option value="3">Sistema de apartado</option>
                    </select>
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="delivey_cost">Costo de envío</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-dolly"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      name="delivey_cost"
                      autocomplete="off"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="options">
              <div class="form-row pt-3">
                <div class="p-1">
                  <button class="btn btn-success" @click="saveProduct">
                    Guardar
                  </button>
                </div>

                <div class="p-1">
                  <a href="/" class="btn btn-secondary">Cancelar</a>
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
export default {
  data() {
    return {
      product: {
        name: "Coca cola",
      },
    };
  },

  methods: {
    saveProduct() {
      const params = {
        name: this.product.name,
      };

      axios.post("/api/products", params).then((resp) => {
        window.location.href = "/products";
      });
    },
  },

  created() {
    axios.defaults.headers.common["Authorization"] =
      "Bearer " + localStorage.getItem("user_token");
  },
};
</script>

<style>
</style>