<template>
  <div>
    <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          <h4>{{ product.name }}</h4>
          <div class="card-header-left"></div>
        </div>
        <div class="card-block">
          <div class="row">
            <div class="col-md-12">
              <div class="form-row">
                <div class="col-md-9">
                  <!-- ROW 1 -->
                  <div class="form-row">
                    <div class="col-md-12">
                      <input-text
                        :inputText="product.name"
                        @inputChanged="nameChanged($event)"
                        :inputField="inputFields.name"
                        iconClass="fas fa-square"
                        v-model="product.name"
                      ></input-text>
                    </div>
                  </div>
                  <!-- END ROW 1 -->

                  <!-- ROW 2 -->
                  <div class="form-row">
                    <div class="col-md-6">
                      <label for="bar_code">Código de barras</label>
                      <input-text
                        :inputText="product.bar_code"
                        @inputChanged="barCodeChanged($event)"
                        :inputField="inputFields.bar_code"
                        iconClass="fas fa-barcode"
                        v-model="product.bar_code"
                      ></input-text>
                    </div>
                    <div class="col-md-6">
                      <label for="brand">Marca</label>
                      <input-text
                        :inputText="product.brand"
                        @inputChanged="brandChanged($event)"
                        :inputField="{}"
                        iconClass="fas fa-circle"
                        v-model="product.brand"
                      ></input-text>
                    </div>
                  </div>
                  <!-- END ROW 2 -->

                  <!-- ROW 3 -->
                  <div class="form-row">
                    <div class="col-md-4">
                      <label for="price">Precio al público</label>
                      <input-text
                        :inputText="product.price"
                        @inputChanged="priceChanged($event)"
                        :inputField="inputFields.price"
                        iconClass="fas fa-dollar-sign"
                        v-model="product.price"
                      ></input-text>
                    </div>
                    <div class="col-md-4">
                      <label for="cost_price">Precio de compra</label>
                      <input-text
                        :inputText="product.cost_price"
                        @inputChanged="costPriceChanged($event)"
                        :inputField="inputFields.cost_price"
                        iconClass="fas fa-dollar-sign"
                        v-model="product.cost_price"
                      ></input-text>
                    </div>
                    <div class="col-md-4">
                      <label for="qty">Cantidad</label>
                      <input-text
                        :inputText="product.qty"
                        @inputChanged="qtyChanged($event)"
                        :inputField="inputFields.qty"
                        iconClass="fas fa-boxes"
                        v-model="product.qty"
                      ></input-text>
                    </div>
                  </div>
                  <!-- END ROW 3 -->

                  <!-- ROW 4 -->
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
                          :class="inputFields.store.class"
                        >
                          <option
                            v-for="(store, index) in stores"
                            :key="index"
                            @click="selectStore(store)"
                            :selected="store.id == selectedStoreId"
                          >
                            {{ store.name }}
                          </option>
                        </select>
                        <div class="invalid-feedback">
                          {{ inputFields.store.feedback }}
                        </div>
                      </div>
                    </div>

                    <div v-show="false" class="col-md-4">
                      <label for="cp_offer_price">Precio de oferta</label>
                      <input-text
                        :inputText="product.offer_price"
                        @inputChanged="offerPriceChanged($event)"
                        :inputField="inputFields.offer_price"
                        iconClass="fas fa-certificate"
                        v-model="product.offer_price"
                      ></input-text>
                    </div>
                    <div v-show="false" class="col-md-4">
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
                          name=""
                          value=""
                          autocomplete="off"
                        />
                      </div>
                    </div>
                  </div>
                  <!-- END ROW 4 -->
                </div>

                <!-- PICTURES -->
                <div class="col-md-3 pl-4">
                  <carousel :foreign_key="product_id" type="P"></carousel>
                </div>
                <!-- END PICTURES -->
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
                    v-model="product.description"
                  ></textarea>
                </div>

                <div class="col-md-3">
                  <label for="cp_offer_duration">Imagen por link</label>
                  <input-text
                    :inputText="product.picture_link"
                    @inputChanged="pictureLinkChanged($event)"
                    :inputField="{}"
                    iconClass="fas fa-link"
                    v-model="product.picture_link"
                  ></input-text>
                </div>

                <div class="col-md-3">
                  <label for="cp_offer_duration">Imagen por link</label>
                  <input-text
                    :inputText="product.picture_link"
                    @inputChanged="pictureLinkChanged($event)"
                    :inputField="{}"
                    iconClass="fas fa-link"
                    v-model="product.picture_link"
                  ></input-text>
                </div>
              </div>
            </div>

            <div class="form-row pt-3">
              <div class="p-1">
                <button class="btn btn-success" @click="saveProduct">
                  Guardar
                </button>
              </div>

              <div class="p-1">
                <a href="/products" class="btn btn-secondary">Atrás</a>
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

              <div class="p-1">
                <a
                  href="#"
                  class="btn btn-primary"
                  data-target="#uploadPictureModal"
                  data-toggle="modal"
                  >Imágenes</a
                >
              </div>

              <div v-if="displayStatus" class="p-1">
                <div class="alert" :class="statusClass" role="alert">
                  {{ statusDescription }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Upload picture -->

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
import Carousel from "../layouts/Carousel.vue";
import InputText from "../layouts/InputText.vue";
export default {
  components: { InputText, Carousel },
  props: ["product_id"],
  data() {
    return {
      product: {},
      productPictures: [],
      stores: [],
      storeBarCodes: [],
      storeBarCodesTimeout: null,
      storeBarCodesStatus: "",
      initialBarCode: null,
      statusClass: null,
      statusDescription: null,
      displayStatus: false,
      updateStatus: null,
      selectedStoreId: "",
      selectedStoreName: "",
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
    getBarCodes() {
      axios
        .get("/api/allProducts", {
          params: {
            store_id: this.selectedStoreId,
          },
        })
        .then((response) => {
          this.storeBarCodes = [];
          response.data.forEach((product) => {
            if (product.id != this.product.id)
              this.storeBarCodes.push(product.bar_code);
          });
        });
    },

    saveProduct() {
      this.isDataValided();
      if (this.formErrors() <= 0) {
        if (this.imageFile) {
          this.updatePicture();
        }
        this.product.store_id = this.selectedStoreId;
        axios
          .put("/api/products/" + this.product_id, this.product)
          .then((resp) => {
            //this.updateUpdateStatus(resp.status)
            //window.location.href = "/products/" + this.product_id + "/edit";
            this.updateUpdateStatus(resp.status);
            this.cleanFormErrors();
            //window.location.href = "/products";
          })
          .catch((error) => {
            this.updateUpdateStatus(error.response.status);
          });
      }
    },

    updatePicture() {
      const formData = new FormData();
      formData.append("picture", this.imageFile, this.imageFile.name);
      axios.post("/api/products/", formData).then((resp) => {
        console.log(resp);
        //window.location.href = "/products/"+this.product_id+"/edit";
        //window.location.href = "/products";
      });
    },

    updateUpdateStatus(status) {
      if (status === 200) {
        this.statusClass = "alert-success";
        this.statusDescription = "Información actualizada.";
        this.displayStatus = true;
        setTimeout(() => {
          this.displayStatus = false;
        }, 4000);
      } else {
        this.displayStatus = true;
        this.statusClass = "alert-danger";
        this.statusDescription = "No se pudo actualizar. Error: " + status;
      }
    },

    formErrors() {
      let errors = 0;
      let keys = Object.keys(this.inputFields);
      keys.forEach((key) => {
        if (this.inputFields[key].class == "is-invalid") {
          errors++;
        }
      });
      return errors;
    },

    cleanFormErrors() {
      let keys = Object.keys(this.inputFields);
      keys.forEach((key) => {
        this.inputFields[key].class = "";
        this.inputFields[key].feedback = "";
      });
    },

    getStores(callback) {
      axios.get("/api/user/stores").then((resp) => {
        this.stores = resp.data.stores;
        callback();
      });
    },

    selectStore(store) {
      this.selectedStoreId = store.id;
      //this.product.store_id = storeId;
      this.inputFields.store.class = "";
      this.inputFields.store.feedback = "";
      this.inputFields.bar_code.class = "";
      this.inputFields.bar_code.feedback = "";
      this.getBarCodes();
      console.log(this.product.bar_code);
      if (this.initialBarCode != this.product.bar_code) {
        this.barCodeValidateIfValid();
      }
    },

    selectOriginalStoreId() {
      this.selectedStoreId = this.product.store_id;
    },

    selectOriginalStoreName() {
      console.log("obj stores " + this.stores.length);
      for (var key in this.stores) {
        let id = this.stores[key].id;
        let name = this.stores[key].name;
        if (this.selectedStoreId === id) {
          this.initialStoreName = name;
        }

        //console.log("obj: " + id + " obj: " + name);
      }
    },

    onFileSelected(event) {
      console.log(event);
      //let theFile = event.target.files[0];

      this.imageFile = event.target.files[0];
      this.imageUrl = URL.createObjectURL(this.imageFile);
    },

    isDataValided() {
      if (this.product.name === "") {
        this.inputFields.name.class = "is-invalid";
        this.inputFields.name.feedback = "Ingrese un nombre válido";
      }

      if (this.product.price === "" || isNaN(this.product.price)) {
        this.inputFields.price.class = "is-invalid";
        this.inputFields.price.feedback = "Ingrese un precio válido";
      }

      if (isNaN(this.product.cost_price)) {
        this.inputFields.cost_price.class = "is-invalid";
        this.inputFields.cost_price.feedback =
          "Ingrese un precio de compra válido";
      }

      if (this.product.qty === "" || isNaN(this.product.qty)) {
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
      this.product.bar_code = event;
      this.barCodeValidateIfValid();
    },

    barCodeValidateIfValid() {
      clearTimeout(this.storeBarCodesTimeout);
      this.storeBarCodesTimeout = setTimeout(() => {
        //console.log(this.product.bar_code);
        this.storeBarCodesStatus = this.storeBarCodes.includes(
          this.product.bar_code
        );

        if (this.storeBarCodesStatus) {
          this.inputFields.bar_code.class = "is-invalid";
          this.inputFields.bar_code.feedback =
            "Este código de barras ya existe.";
        } else {
          this.inputFields.bar_code.class = "is-valid";
          this.inputFields.bar_code.feedback = "";
        }
      }, 200);
    },

    brandChanged(event) {
      this.product.brand = event;
      //this.inputFields.brand.class = "";
      //this.inputFields.brand.feedback = "";
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

    findProduct(callback) {
      axios.get("/api/products/" + this.product_id).then((response) => {
        this.product = response.data.product;
        this.productPictures = response.data.pictures;
        this.selectedStoreId = this.product.store_id;
      });
      callback();
    },
  },

  created() {
    axios.defaults.headers.common["Authorization"] =
      "Bearer " + localStorage.getItem("user_token");
    this.findProduct(() => {
      this.getStores(() => {
        this.selectOriginalStoreName();
        this.getBarCodes();
        this.initialBarCode = this.product.bar_code;
      });
    });
  },
};
</script>

<style>
</style>