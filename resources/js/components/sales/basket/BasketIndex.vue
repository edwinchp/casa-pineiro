<template>
  <div>
    <div class="pcoded-main-container">
      <div class="pcoded-inner-content">
        <div class="main-body">
          <div class="page-wrapper">
            <div class="page-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex">
                        <div class="p-2 mr-auto">
                          <h4>Nueva venta</h4>
                        </div>
                        <div class="p-2">
                          <div class="dropdown-inverse dropdown open show">
                            <button
                              class="
                                btn btn-inverse
                                dropdown-toggle
                                waves-effect waves-light
                              "
                              type="button"
                              id="dropdown-7"
                              data-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="true"
                            >
                              Opciones
                            </button>
                            <div
                              class="dropdown-menu"
                              aria-labelledby="dropdown-7"
                              data-dropdown-in="fadeIn"
                              data-dropdown-out="fadeOut"
                              x-placement="bottom-start"
                              style="
                                position: absolute;
                                transform: translate3d(0px, 41px, 0px);
                                top: 0px;
                                left: 0px;
                                will-change: transform;
                              "
                            >
                              <a
                                class="dropdown-item waves-light waves-effect"
                                href="#"
                                data-toggle="modal"
                                data-target="#saveModal"
                                >Guardar para después</a
                              >
                              <a
                                class="dropdown-item waves-light waves-effect"
                                href="#"
                                data-toggle="modal"
                                data-target="#createProductModal"
                                >Crear producto</a
                              >
                              <a
                                class="dropdown-item waves-light waves-effect"
                                href="#"
                                data-toggle="modal"
                                data-target="#createClientModal"
                                >Crear cliente</a
                              >
                              <a
                                class="dropdown-item waves-light waves-effect"
                                href="#"
                                data-toggle="modal"
                                data-target="#cleanCartModal"
                                >Quitar productos</a
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-block">
                      <div class="row">
                        <!--LEFT COLUMN-->
                        <div class="col-sm-6">
                          <h4 class="sub-title">Buscar productos</h4>
                          <form>
                            <div class="form-group row">
                              <div class="col-sm-12">
                                <div class="input-group">
                                  <span class="input-group-addon input-icon"
                                    ><i class="icofont icofont-bar-code"></i
                                  ></span>
                                  <input
                                    type="text"
                                    class="
                                      form-control form-control-lg
                                      input-autofocus
                                    "
                                    title=""
                                    data-toggle="tooltip"
                                    placeholder="Inserte código de barras"
                                    v-model="barcode"
                                    id="bar-code"
                                    @focusout="barcode = null"
                                  />
                                </div>

                                <div class="input-group">
                                  <span class="input-group-addon input-icon"
                                    ><i class="icofont icofont-search"></i
                                  ></span>
                                  <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    title=""
                                    data-toggle="tooltip"
                                    placeholder="Buscar producto"
                                  />
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-12">
                                <div class="col-lg-12 col-xl-12">
                                  <div class="sub-title">Método de pago</div>
                                  <!-- Nav tabs -->
                                  <ul
                                    class="
                                      nav nav-tabs
                                      md-tabs
                                      tabs-left
                                      b-none
                                    "
                                    role="tablist"
                                  >
                                    <li class="nav-item">
                                      <a
                                        class="nav-link active"
                                        data-toggle="tab"
                                        href="#home5"
                                        role="tab"
                                        aria-expanded="false"
                                        >Efectivo</a
                                      >
                                      <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                      <a
                                        class="nav-link"
                                        data-toggle="tab"
                                        href="#profile5"
                                        role="tab"
                                        aria-expanded="false"
                                        >Tarjeta</a
                                      >
                                      <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                      <a
                                        class="nav-link"
                                        data-toggle="tab"
                                        href="#transfer"
                                        role="tab"
                                        aria-expanded="false"
                                        >Transferir</a
                                      >
                                      <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                      <a
                                        class="nav-link"
                                        data-toggle="tab"
                                        href="#messages5"
                                        role="tab"
                                        aria-expanded="true"
                                        >Cliente</a
                                      >
                                      <div class="slide"></div>
                                    </li>
                                  </ul>
                                  <!-- Tab panes -->
                                  <div
                                    class="
                                      tab-content
                                      tabs-left-content
                                      card-block
                                    "
                                  >
                                    <div
                                      class="tab-pane active"
                                      id="home5"
                                      role="tabpanel"
                                      aria-expanded="false"
                                    >
                                      <p class="m-0">Efectivo seleccionado</p>
                                    </div>
                                    <div
                                      class="tab-pane"
                                      id="profile5"
                                      role="tabpanel"
                                      aria-expanded="false"
                                    >
                                      <p class="m-0">Tarjeta seleccionada</p>
                                    </div>
                                    <div
                                      class="tab-pane"
                                      id="transfer"
                                      role="tabpanel"
                                      aria-expanded="false"
                                    >
                                      <p class="m-0">
                                        Estos productos serán transferidos
                                      </p>
                                    </div>
                                    <div
                                      class="tab-pane row"
                                      id="messages5"
                                      role="tabpanel"
                                    >
                                      <!-- aria-expanded="true" -->
                                      <div class="form-group">
                                        <div class="col-sm-12">
                                          <div class="input-group">
                                            <span class="input-group-addon"
                                              ><i
                                                class="icofont icofont-search"
                                              ></i
                                            ></span>
                                            <input
                                              type="text"
                                              class="form-control"
                                              placeholder="Buscar cliente"
                                              data-original-title=""
                                            />
                                          </div>

                                          <h6>
                                            Emmanuel Fernandez Rodriguez
                                            <span class="pl-2"
                                              ><a
                                                data-toggle="modal"
                                                data-target="#deleteClient"
                                                class="label label-danger btn"
                                                >X</a
                                              ></span
                                            >
                                          </h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!--END LEFT COLUMN-->

                        <!--RIGHT COLUMN-->
                        <div class="col-sm-6 mobile-inputs">
                          <div>
                            <h4 class="sub-title">Productos añadidos</h4>
                            <div class="table-sub-table">
                              <div class="card-block table-border-style">
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Opciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td class="table-name">
                                          <div class="row">
                                            <div class="col-xl-11">
                                              <a
                                                href=""
                                                data-toggle="modal"
                                                data-target="#myModal"
                                                >Cheetos bolita 35g</a
                                              >
                                            </div>
                                          </div>
                                        </td>
                                        <td class="table-price">$56</td>
                                        <td class="table-input">
                                          <input
                                            type="number"
                                            class="form-control form-control-sm"
                                            placeholder="Cantidad"
                                            value="1"
                                          />
                                        </td>
                                        <td>
                                          <div class="table-options">
                                            <a
                                              href="#"
                                              data-toggle="modal"
                                              data-target="#deleteProduct"
                                              ><i class="ti-trash"></i
                                            ></a>
                                          </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="table-name">
                                          <div class="row">
                                            <div class="col-xl-11">
                                              <a href=""
                                                >Media crema san marcos 23g</a
                                              >
                                            </div>
                                          </div>
                                        </td>
                                        <td class="table-price">$232.50</td>
                                        <td class="table-input">
                                          <input
                                            type="number"
                                            class="form-control form-control-sm"
                                            placeholder="Cantidad"
                                            value="2"
                                          />
                                        </td>
                                        <td>
                                          <div class="table-options">
                                            <a
                                              href="#"
                                              data-toggle="modal"
                                              data-target="#deleteProduct"
                                              ><i class="ti-trash"></i
                                            ></a>
                                          </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="table-name">
                                          <div class="row">
                                            <div class="col-xl-11">
                                              <a href="">Pepsi 2.5L</a>
                                            </div>
                                          </div>
                                        </td>
                                        <td class="table-price">$35.50</td>
                                        <td class="table-input">
                                          <input
                                            type="number"
                                            class="form-control form-control-sm"
                                            placeholder="Cantidad"
                                            value="1"
                                          />
                                        </td>
                                        <td>
                                          <div class="table-options">
                                            <a
                                              href="#"
                                              data-toggle="modal"
                                              data-target="#deleteProduct"
                                              ><i class="ti-trash"></i
                                            ></a>
                                          </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="table-name">
                                          <div class="row">
                                            <div class="col-xl-11">
                                              <a href=""
                                                >Gansito Marinela 34g</a
                                              >
                                            </div>
                                          </div>
                                        </td>
                                        <td class="table-price">$15</td>
                                        <td class="table-input">
                                          <input
                                            type="number"
                                            class="form-control form-control-sm"
                                            placeholder="Cantidad"
                                            value="2"
                                          />
                                        </td>
                                        <td>
                                          <div class="table-options">
                                            <a
                                              href="#"
                                              data-toggle="modal"
                                              data-target="#deleteProduct"
                                              ><i class="ti-trash"></i
                                            ></a>
                                          </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <div class="p-4">
                                    <nav aria-label="Page navigation example">
                                      <ul
                                        class="pagination justify-content-end"
                                      >
                                        <li class="page-item disabled">
                                          <a
                                            class="page-link"
                                            href="#"
                                            tabindex="-1"
                                            >Anterior</a
                                          >
                                        </li>
                                        <li class="page-item active">
                                          <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                          <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                          <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                          <a class="page-link" href="#"
                                            >Siguiente</a
                                          >
                                        </li>
                                      </ul>
                                    </nav>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="sell-summary">
                            <div class="row">
                              <h3>Total: <strong>$87.50</strong></h3>
                            </div>
                            <div class="row">
                              <button
                                class="btn btn-success"
                                data-toggle="modal"
                                data-target="#confirmSell"
                              >
                                Pagar
                              </button>
                            </div>
                          </div>
                        </div>
                        <!--END RIGHT COLUMN-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="styleSelector"></div>
      </div>
    </div>
  </div>
</template>

<script>
import BarcodeFinder from "./BarcodeFinder.vue";
export default {
  components: { BarcodeFinder },

  data() {
    return {
      barcode: null,
      basket: [],
      products: [],
      selectedStoreId: 1,
    };
  },

  methods: {
    getProducts: function () {
      axios
        .get("/api/products/barcode-search", {
          params: {
            store_id: this.selectedStoreId,
          },
        })
        .then((response) => {
          this.products = response.data;
        });
    },
  }, // end methods

  created() {
    this.getProducts();
  },
};
</script>

<style>
</style>