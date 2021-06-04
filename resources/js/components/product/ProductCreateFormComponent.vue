<template>
  <div>
    <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          <h4>Nuevo producto</h4>
          <div class="card-header-left"></div>
        </div>
        <div class="card-block">
          <div class="col-md-12">
            <div class="row">
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
              <div class="col-md-4">
                <img
                  v-show="imageUrl"
                  :src="imageUrl"
                  class="img-thumbnail"
                  alt="..."
                />
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-8">
                <div class="row pt-3">
                  <div class="col-md-6">
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
                        v-model="product.bar_code"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
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
                        v-model="product.brand"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <input
                  type="file"
                  style="display: none"
                  ref="fileInput"
                  @change="onFileSelected"
                />
                <button @click="$refs.fileInput.click()">Subir imagen</button>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
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
                      v-model="product.price"
                      required
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
                      v-model="product.cost_price"
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
                      v-model="product.qty"
                    />
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="delivery_option">Tienda</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-store"></i
                      ></span>
                    </div>
                    <select
                      name="delivery_option"
                      id=""
                      class="form-control custom-select"
                    >
                      <option @click="clearStore">Seleccionar...</option>
                      <option
                        v-for="(store, index) in stores"
                        :key="index"
                        @click="selectStore(store)"
                      >
                        {{ store.name }}
                      </option>
                    </select>
                  </div>
                </div>

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
                      v-model="product.offer_price"
                    />
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="cp_offer_duration">Oferta termina</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-calendar-alt"></i
                      ></span>
                    </div>
                    <input
                      type="date"
                      class="form-control"
                      name="cp_offer_duration"
                      value="sssssss"
                      autocomplete="off"
                      v-model="product.offer_ends"
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
                    cols="60"
                    rows="5"
                    class="form-control"
                    v-model="product.description"
                  >
                  </textarea>
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
        name: "Coca cola from Vue",
        bar_code: "666-Vue",
        brand: "Vue Brand",
        price: "54",
        qty: "67",
        description: "Description from Vue",
        cost_price: 2,
        offer_price: 2,
        offer_ends: null,
      },
      stores: [],
      selectedStoreId: "",
      imageUrl: null,
      imageFile: null,
    };
  },

  computed: {
    isFormValidated() {
      return (
        (this.selectedStoreId &&
          this.product.name.trim() &&
          this.product.qty.trim() &&
          this.product.price.trim()) !== ""
      );
    },
  },

  methods: {
    saveProduct() {
      if (this.isFormValidated) {
        const formData = new FormData();
        formData.append("name", this.product.name);
        formData.append("bar_code", this.product.bar_code);
        formData.append("brand", this.product.brand);
        formData.append("price", this.product.price);
        formData.append("cost_price", this.product.cost_price); // CHANGE THIS IN THE FUTURE!!!!!!!!!1
        formData.append("qty", this.product.qty);
        formData.append("description", this.product.description);
        formData.append("store_id", this.selectedStoreId);
        formData.append("picture_1", this.imageFile, this.imageFile.name);

        axios.post("/api/products", formData).then((resp) => {
          //window.location.href = "/products";
          console.log(resp);
        });
      }
    },

    getStores() {
      axios.get("/api/user/stores").then((resp) => {
        this.stores = resp.data.stores;
      });
    },

    selectStore(store) {
      this.selectedStoreId = store.id;
    },

    clearStore() {
      this.selectedStoreId = "";
    },

    onFileSelected(event) {
      console.log(event);
      //let theFile = event.target.files[0];

      this.imageFile = event.target.files[0];
      this.imageUrl = URL.createObjectURL(this.imageFile);
    },
  },

  created() {
    axios.defaults.headers.common["Authorization"] =
      "Bearer " + localStorage.getItem("user_token");
    this.getStores();
  },
};
</script>

<style>
</style>