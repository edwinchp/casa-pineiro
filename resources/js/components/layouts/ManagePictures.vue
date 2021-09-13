<template>
  <div
    class="modal fade"
    id="managePicturesModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Imágenes</h5>

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
          <!-- CURRENT PICTURES -->
          <div class="table-responsive">
            <table class="table" style="table-layout: auto">
              <thead>
                <tr>
                  <th scope="col">Imagen</th>
                  <th v-show="false" scope="col">No</th>
                  <th scope="col">Link</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="picture in pictures" :key="picture.id">
                  <th scope="row">
                    <img
                      v-if="picture.link == null"
                      class="d-block"
                      :src="'/images/products/' + picture.path"
                    />
                    <img v-else class="d-block" :src="picture.link" />
                  </th>
                  <td v-show="false">{{ picture.no }}</td>
                  <td v-if="picture.link == null"></td>
                  <td v-else>
                    <input
                      class="form-control"
                      type="text"
                      v-model="picture.link"
                      disabled
                    />
                  </td>
                  <td>
                    <button
                      class="btn btn-danger btn-sm btn-rounded"
                      @click="deletePicture(picture.id)"
                    >
                      Eliminar
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
            Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    pictures: Array,
  },

  emits: ["deletedPicture"],

  methods: {
    deletePicture(id) {
      axios.delete("/api/picture/" + id).then((response) => {
        console.log(response);
        this.$emit("deletedPicture");
      });
    },
  },
};
</script>


<style scoped>
.carousel-inner img {
  max-width: 200px;
  max-height: 300px;
}

.carousel {
  max-width: 200px;
  max-height: 300px;
}
.icon-white {
  color: white;
  padding-left: 3px;
}

.picture-options {
  position: relative;
  display: flex;
  flex-direction: row-reverse;
}

.table img {
  max-width: 70px;
  max-height: 100px;
}
</style>