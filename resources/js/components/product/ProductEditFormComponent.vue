<template>
  <div>
    <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          <h4>Product Name</h4>
          <div class="card-header-left"></div>
        </div>
        <div class="card-block">
          <div class="row">
            <div class="col-md-12">
              <div class="form-row">
                <div class="col-md-8">
                  <input-text
                    :inputText="product.name"
                    @inputChanged="nameChanged($event)"
                    :inputField="inputFields.name"
                    iconClass="fas fa-square"
                    v-model="product.name"
                  ></input-text>
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
                      value=""
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
                      value=""
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
                      value=""
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
                      value=""
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
                      value=""
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
                      value=""
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
                      value=""
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
                  ></textarea>
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
                      value=""
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
                      value=""
                      autocomplete="off"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="form-row pt-3">
              <div class="p-1">
                <input type="submit" class="btn btn-success" value="Guardar" />
              </div>

              <div class="p-1">
                <a href="" class="btn btn-secondary">Cancelar</a>
              </div>

              <div class="p-1">
                <a
                  href="#"
                  class="btn btn-danger"
                  data-target="#confirmDeleteModal"
                  data-toggle="modal"
                  >Eliminar</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Confirm delete Modal-->
    <div
      class="modal fade"
      id="confirmDeleteModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Eliminar producto
            </h5>
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
            ¿Seguro que desea eleminar el producto
            <strong>Dummy product</strong>? <br />
            Esta opción no podrá deshacerse.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancelar
            </button>
            <form action="" method="post">
              <button
                type="submit"
                href="#"
                class="btn btn-danger btn-icon-split"
              >
                <span class="icon text-white-50">
                  <i class="fas fa-trash"></i>
                </span>
                <span class="text">Eliminar</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import InputText from "../layouts/InputText.vue";
export default {
  components: { InputText },
  props: ["product_id"],
  data() {
    return {
      product: {},
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

        axios.post("/api/products", formData).then((resp) => {
          window.location.href = "/products";
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

    findProduct() {
      axios.get("/api/products/" + this.product_id).then((response) => {
        this.product = response.data;
      });
    },
  },

  created() {
    axios.defaults.headers.common["Authorization"] =
      "Bearer " + localStorage.getItem("user_token");
    this.findProduct();
    this.getStores();
  },
};
</script>

<style>
</style>