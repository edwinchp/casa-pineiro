<template>
  <div>
    <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          <h4>Crear proveedor</h4>
          <div class="card-header-left"></div>
        </div>
        <div class="card-block">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-8"></div>
            </div>
          </div>

          <div class="col-lg-6 col-md-12 col-sm-12 row pt-3">
            <label for="bar_code">Nombre de proveedor</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-square"></i>
                </span>
              </div>
              <input
                type="text"
                class="form-control"
                name="bar_code"
                autocomplete="off"
              />
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 row pt-3">
            <label for="brand">Nombre del surtidor</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user-tie"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="brand" />
            </div>
          </div>

          <div class="col-lg-6 col-md-12 col-sm-12 row pt-3">
            <label for="brand">Número de telefono</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-phone-square-alt"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="brand" />
            </div>
          </div>

          <div
            class="
              dropdown-inverse dropdown
              open
              col-lg-6 col-md-12 col-sm-12
              row
              pt-3
            "
          >
            <button
              class="btn btn-light border border-dark dropdown-toggle"
              type="button"
              id="dropdown-7"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Día de visita
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
                >Lunes</a
              >
              <a class="dropdown-item waves-light waves-effect" href="#"
                >Martes</a
              >
              <a class="dropdown-item waves-light waves-effect" href="#"
                >Miércoles</a
              >
              <a class="dropdown-item waves-light waves-effect" href="#"
                >Jueves</a
              >
              <a class="dropdown-item waves-light waves-effect" href="#"
                >Viernes</a
              >
              <a class="dropdown-item waves-light waves-effect" href="#"
                >Sábado</a
              >
              <a class="dropdown-item waves-light waves-effect" href="#"
                >Domingo</a
              >
            </div>
          </div>

          <div class="col-lg-6 col-md-12 col-sm-12 row pt-3">
            <label for="brand">Crédito autorizado</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-dollar-sign"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="brand" />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-row pt-4"></div>

            <div class="form-row">
              <div class="form-group col-md-4"></div>
            </div>
          </div>
        </div>

        <div class="options">
          <div class="form-row pt-3">
            <div class="p-1">
              <button class="btn btn-success">Guardar</button>
            </div>

            <div class="p-1">
              <button class="btn btn-secondary">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>