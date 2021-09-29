<template>
  <div>
    <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          <h4>Crear ubicación</h4>
          <div class="card-header-left"></div>
        </div>
        <div class="card-block">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-8"></div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6 col-sm-12">
                <div class="row pt-3">
                  <label for="bar_code">Nombre</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-database"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      name="bar_code"
                      autocomplete="off"
                    />
                  </div>

                  <label for="brand">Descripción</label>
                  <div class="input-group">
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="5"
                    ></textarea>
                  </div>
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
          </div>

          <div class="options ml-3">
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
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>