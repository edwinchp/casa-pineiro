<template>
  <div id="sales-index">
    <div class="pcoded-main-container">
      <div class="pcoded-inner-content">
        <div class="main-body">
          <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="col-sm-12" style="">
                    <div class="card fb-card">
                      <div class="card-header color-card">
                        <i class="icofont icofont-food-basket"></i>
                        <div class="d-inline-block">
                          <h2>Ventas</h2>

                          <div class="section-header-buttons pr-5">
                            <a
                              href="product.create.html"
                              class="btn btn-inverse btn-success-a"
                              data-toggle="tooltip"
                              data-placement="bottom"
                              data-original-title="Nuevo producto"
                              >Nuevo</a
                            >

                            <div class="dropdown-inverse dropdown open">
                              <button
                                class="btn btn-inverse dropdown-toggle waves-effect waves-light"
                                type="button"
                                id="dropdown-7"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="true"
                              >
                                Todos los productos
                              </button>
                              <div
                                class="dropdown-menu"
                                aria-labelledby="dropdown-7"
                                data-dropdown-in="fadeIn"
                                data-dropdown-out="fadeOut"
                              >
                                <a
                                  class="dropdown-item waves-light waves-effect active"
                                  href="#"
                                  >Todos</a
                                >
                                <a
                                  class="dropdown-item waves-light waves-effect"
                                  href="#"
                                  >Hoy</a
                                >
                                <a
                                  class="dropdown-item waves-light waves-effect"
                                  href="#"
                                  >Esta semana</a
                                >
                                <a
                                  class="dropdown-item waves-light waves-effect"
                                  href="#"
                                  >Este mes</a
                                >
                              </div>
                            </div>

                            <button v-show="false" class="btn btn-inverse">
                              <i
                                class="icofont icofont-download icofont-alt"
                              ></i
                              >Descargar
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="card-block text-center">
                        <div class="row">
                          <div class="col-6 b-r-default">
                            <h2>40</h2>
                            <p class="text-muted">Productos vendidos</p>
                          </div>
                          <div class="col-6">
                            <h2>$656</h2>
                            <p class="text-muted">Total</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--CARD-->
                    <div class="card pt-3">
                      <!--SEARCH BOX-->
                      <div class="card pt-3 table-products-scope">
                        <div class="section-header pl-3">
                          <div class="col-xl-6">
                            <div class="input-group search-box">
                              <span class="input-group-addon" id="name"
                                ><i class="icofont icofont-search"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Buscar..."
                              />
                            </div>
                          </div>
                        </div>

                        <div class="card-block table-border-style">
                          <div class="table-responsive pr-4 pl-4">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Nombre</th>
                                  <th>Cantidad</th>
                                  <th>Precio Unit</th>
                                  <th>Precio Total</th>
                                  <th>Cliente</th>
                                  <th>Vendido por</th>
                                  <th>Hora</th>
                                  <th>Opciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="(sale, index) in sales" :key="index">
                                  <td class="table-name">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <a href="product.edit.html">{{
                                          shortAttribute(sale.name, 25)
                                        }}</a>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">{{ sale.qty }}</div>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">${{ sale.price }}</div>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">
                                          ${{ sale.qty * sale.price }}
                                        </div>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">
                                          {{ sale.customer_id }} Genérico
                                        </div>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-11">
                                        <div class="">
                                          {{ sale.user_id }} Juan Chi
                                        </div>
                                      </div>
                                    </div>
                                  </td>

                                  <td class="table-number">
                                    <div class="row">
                                      <div class="col-xl-8">
                                        <div class="">
                                          {{ getCreatedAt(sale) }}
                                        </div>
                                      </div>
                                    </div>
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
                              </tbody>
                            </table>

                            <div class="p-4">
                              <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                  <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"
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
                                    <a class="page-link" href="#">Siguiente</a>
                                  </li>
                                </ul>
                              </nav>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
      sales: [],
    };
  },

  methods: {
    getSales(page) {
      axios.get("/api/sales/?page=" + page).then((resp) => {
        this.sales = resp.data.sales.data;
      });
    },

    getCreatedAt(sale) {
      let date = new Date(sale.created_at);
      let months = [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic",
      ];
      return (
        date.getDate() +
        "-" +
        months[date.getMonth()] +
        "-" +
        date.getFullYear() +
        " " +
        date.getHours() +
        ":" +
        date.getMinutes() +
        ":" +
        date.getSeconds()
      );
    },

    shortAttribute(att, limit) {
      if (att.length <= limit) {
        return att.substring(0, limit);
      }
      return att.substring(0, limit) + "...";
    },
  },

  created() {
    this.getSales(1);
  },
};
</script>

<style>
</style>