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
                 
                </div>

                <div class="col-md-4">
                  <label for="cp_price">Precio de compra</label>
                 
                </div>

                <div class="col-md-4">
                  <label for="qty">Cantidad</label>
                  
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <!-- <label for="delivery_option">Tienda</label> -->
                 
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
                   
                  >
                  </textarea>
                </div>
              </div>
            </div>
            <div class="options">
              <div class="form-row pt-3">
                <div class="p-1">
                  <button class="btn btn-success">
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
export default {};
</script>

<style>
</style>