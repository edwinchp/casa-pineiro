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
                <input-text
                  :inputText="product.name"
                  @inputChanged="nameChanged($event)"
                  :inputField="inputFields.name"
                  iconClass="fas fa-square"
                ></input-text>
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
                Crea el producto para añadir una imagen
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-row pt-4">
                <div class="col-md-4">
                  <label for="qty">Precio</label>
                  <input-text
                    :inputText="product.price"
                    @inputChanged="priceChanged($event)"
                    :inputField="inputFields.price"
                    iconClass="fas fa-dollar-sign"
                  ></input-text>
                </div>

                <div class="col-md-4">
                  <label for="cp_price">Precio de compra</label>
                  <input-text
                    :inputText="product.cost_price"
                    @inputChanged="costPriceChanged($event)"
                    :inputField="inputFields.cost_price"
                    iconClass="fas fa-dollar-sign"
                  ></input-text>
                </div>

                <div class="col-md-4">
                  <label for="qty">Cantidad</label>
                  <input-text
                    :inputText="product.qty"
                    @inputChanged="qtyChanged($event)"
                    :inputField="inputFields.qty"
                    iconClass="fas fa-boxes"
                  ></input-text>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <!-- <label for="delivery_option">Tienda</label> -->
                  <store-dropdown
                    @storeIdChanged="selectedStoreId = $event"
                  ></store-dropdown>

                  <!-- <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-store"></i
                      ></span>
                    </div>
                    <select
                      name="delivery_option"
                      id=""
                      class="form-control custom-select"
                      :class="inputFields.store.class"
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
                    <div class="invalid-feedback">
                      {{ inputFields.store.feedback }}
                    </div> -->
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
</template>

<script>
import InputText from "../layouts/InputText.vue";
import StoreDropdown from "../layouts/StoreDropdown.vue";
export default {
  components: { InputText, StoreDropdown },
  inputOk: {},
  data() {
    return {
      product: {
        name: "",
        bar_code: "",
        brand: "",
        price: "",
        qty: "",
        description: "",
        cost_price: "",
        offer_price: "",
        offer_ends: null,
        picture_link: "",
      },
      stores: [],
      selectedStoreId: "",
      imageUrl: null,
      imageFile: null,
      inputFields: {
        name: {
          class: "",
          feedback: "",
        },
        bar_code: {
          class: "",
          feedback: "",
        },
        price: {
          class: "",
          feedback: "",
        },
        cost_price: {
          class: "",
          feedback: "",
        },
        qty: {
          class: "",
          feedback: "",
        },
        store: {
          class: "",
          feedback: "",
        },
        offer_price: {
          class: "",
          feedback: "",
        },
        offer_ends: {
          class: "",
          feedback: "",
        },
        picture_link: {
          class: "",
          feedback: "",
        },
      },
    };
  },

  computed: {},

  methods: {
    saveProduct() {
      //      this.$emit('wrong-data', wrongInput)
      this.isDataValided();
      if (this.formErrors() <= 0) {
        const formData = new FormData();
        formData.append("name", this.product.name);
        formData.append("bar_code", this.product.bar_code);
        formData.append("brand", this.product.brand);
        formData.append("price", this.product.price);
        formData.append("cost_price", this.product.cost_price); // CHANGE THIS IN THE FUTURE!!!!!!!!!1
        formData.append("qty", this.product.qty);
        formData.append("description", this.product.description);
        formData.append("store_id", this.selectedStoreId);
        formData.append("picture_link", this.product.picture_link);
        if (this.imageFile)
          formData.append("picture", this.imageFile, this.imageFile.name);

        axios.post("/api/products", formData).then((response) => {
          window.location.href = "/products/" + response.data.id + "/edit";
        });
      }
    },

    formErrors() {
      let errors = 0;
      let keys = Object.keys(this.inputFields);
      keys.forEach((key) => {
        if (this.inputFields[key].class.length > 0) {
          errors++;
        }
      });
      return errors;
    },

    getStores() {
      axios.get("/api/user/stores").then((resp) => {
        this.stores = resp.data.stores;
      });
    },

    selectStore(store) {
      this.selectedStoreId = store.id;
      this.inputFields.store.class = "";
      this.inputFields.store.feedback = "";
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

    isDataValided() {
      if (this.product.name.trim() == "") {
        this.inputFields.name.class = "is-invalid";
        this.inputFields.name.feedback = "Ingrese un nombre válido";
      }

      if (this.product.price == "" || isNaN(this.product.price)) {
        this.inputFields.price.class = "is-invalid";
        this.inputFields.price.feedback = "Ingrese un precio válido";
      }

      if (isNaN(this.product.cost_price)) {
        this.inputFields.cost_price.class = "is-invalid";
        this.inputFields.cost_price.feedback =
          "Ingrese un precio de compra válido";
      }

      if (this.product.qty == "" || isNaN(this.product.qty)) {
        this.inputFields.qty.class = "is-invalid";
        this.inputFields.qty.feedback = "Ingrese una cantidad válida";
      }

      if (this.selectedStoreId == "") {
        this.inputFields.store.class = "is-invalid";
        this.inputFields.store.feedback =
          "Seleccione una tienda para continuar";
      }

      if (isNaN(this.product.offer_price)) {
        this.inputFields.offer_price.class = "is-invalid";
        this.inputFields.offer_price.feedback =
          "Ingrese un precio de oferta válido";
      }
    },

    nameChanged(event) {
      this.product.name = event;
      this.inputFields.name.class = "";
      this.inputFields.name.feedback = "";
    },

    barCodeChanged(event) {
      // this.product.name = event;
      // this.inputFields.name.class = "";
      // this.inputFields.name.feedback = "";
    },

    priceChanged(event) {
      this.product.price = event;
      this.inputFields.price.class = "";
      this.inputFields.price.feedback = "";
    },

    costPriceChanged(event) {
      this.product.cost_price = event;
      this.inputFields.cost_price.class = "";
      this.inputFields.cost_price.feedback = "";
    },

    qtyChanged(event) {
      this.product.qty = event;
      this.inputFields.qty.class = "";
      this.inputFields.qty.feedback = "";
    },
    offerPriceChanged(event) {
      this.product.offer_price = event;
      this.inputFields.offer_price.class = "";
      this.inputFields.offer_price.feedback = "";
    },

    offerEndsChanged(event) {
      // this.product.name = event;
      // this.inputFields.name.class = "";
      // this.inputFields.name.feedback = "";
    },

    pictureLinkChanged(event) {
      this.product.picture_link = event;
      this.inputFields.picture_link.class = "";
      this.inputFields.picture_link.feedback = "";
    },
  },

  created() {
    axios.defaults.headers.common["Authorization"] =
      "Bearer " + localStorage.getItem("user_token");
    this.getStores();
    this.inputOk = this.inputFields;
  },
};
</script>

<style scoped>
.btn-primary {
  background-color: green;
  border-color: #4680ff;
}
</style>