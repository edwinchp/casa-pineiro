<template>
  <div class="col-sm-12" style="">
    <div class="card fb-card">
      <div class="card-header color-card">
        <div class="float-left" id="carrito">
          <i class="icofont icofont-truck-alt"></i>
        </div>
        <div class="d-inline-block">
          <h2>Proveedor</h2>

          <button type="button" class="btn btn-inverse btn-success-a">
            Nuevo
          </button>

          <div class="dropdown-inverse dropdown">
            <button
              class="btn btn-light border border-dark dropdown-toggle"
              type="button"
              id="dropdown-7"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Tienda
            </button>
            <div
              class="dropdown-menu"
              aria-labelledby="dropdown-7"
              data-dropdown-in="fadeIn"
              data-dropdown-out="fadeOut"
              x-placement="bottom-start"
              style="
                position: absolute;
                transform: translate3d(0px, 40px, 0px);
                top: 0px;
                left: 0px;
                will-change: transform;
              "
            >
              <a class="dropdown-item waves-light waves-effect" href="#"
                >Tendejón Evelyn</a
              >
              <a class="dropdown-item waves-light waves-effect" href="#"
                >Ferretería cables</a
              >
              <a class="dropdown-item waves-light waves-effect" href="#"
                >Dunosusa</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card pt-3 table-products-scope">
      <div class="section-header">
        <!-- <div class="input-group search-box">
            <span class="input-group-addon" id="name"
              ><i class="icofont icofont-search"></i
            ></span>
          </div>-->
        <div class="container-fluid mt-3">
          <div class="row ml-5 pl-3">
            <supplier-card></supplier-card>
            <supplier-card></supplier-card>
            <supplier-card></supplier-card>
            <supplier-card></supplier-card>
            <supplier-card></supplier-card>
            <supplier-card></supplier-card>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SupplierCard from "./SupplierCard.vue";
export default {
  components: {
    SupplierCard,
  },
};
</script>

<style scoped>
#carrito {
  margin-top: 20px;
}
#carrito i {
  background-color: black;
  font-size: 35px;
}
</style>