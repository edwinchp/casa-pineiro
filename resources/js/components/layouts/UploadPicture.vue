<template>
  <div class="dropdown-primary dropdown open">
    <button
      class="btn btn-primary dropdown-toggle waves-effect waves-light"
      type="button"
      id="dropdown-2"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="true"
    >
      Imágenes
    </button>
    <div
      class="dropdown-menu"
      aria-labelledby="dropdown-2"
      data-dropdown-in="fadeIn"
      data-dropdown-out="fadeOut"
    >
      <a
        class="dropdown-item waves-light waves-effect"
        href="#"
        data-toggle="modal"
        data-target="#addPictureModal"
        >Agregar imagen</a
      >
      <a
        v-show="true"
        class="dropdown-item waves-light waves-effect"
        href="#"
        data-toggle="modal"
        data-target="#addPictureLinkModal"
        >Agregar por link</a
      >
      <div class="dropdown-divider"></div>
      <a
        class="dropdown-item waves-light waves-effect"
        href="#"
        data-toggle="modal"
        data-target="#managePicturesModal"
        >Editar</a
      >
    </div>

    <!-- PICTURE LINK MODAL -->
    <div
      class="modal fade"
      id="addPictureLinkModal"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar por link</h5>

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
            <hr />

            <div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"
                    ><i class="fas fa-link"></i
                  ></span>
                </div>
                <input
                  type="text"
                  autocomplete="off"
                  class="form-control"
                  v-model="pictureLink"
                />
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancelar
            </button>
            <button
              class="btn btn-success btn-icon-split"
              @click="savePicture('link')"
            >
              Guardar
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- PICTURE FILE MODAL -->
    <div
      class="modal fade"
      id="addPictureModal"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar imagen</h5>

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
            <input
              type="file"
              accept="image/png, image/jpeg"
              @input="pictureFileChange($event)"
              class="form-control"
            />
          </div>

          <div class="modal-footer">
            <span v-if="progress > 0">Subiendo... ({{ this.progress }}%)</span>
            <!-- <span style="size: 10px">Subiendo... (100%)</span> -->
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancelar
            </button>
            <button
              class="btn btn-success btn-icon-split"
              v-bind:disabled="disableBtn"
              @click="savePicture('file')"
            >
              Guardar
            </button>
          </div>
        </div>
      </div>
    </div>
    <manage-pictures
      :pictures="pictures"
      @deletedPicture="updatePictures"
    ></manage-pictures>
  </div>
</template>

<script>
import ManagePictures from "../layouts/ManagePictures.vue";
export default {
  components: {
    ManagePictures,
  },
  props: {
    foreign_key: String,
    type: String,
  },
  data() {
    return {
      pictures: [],
      maxPictureNo: null,
      pictureFile: null,
      pictureFileProgress: 0,
      pictureLink: "",
      disableBtn: true,
    };
  },

  computed: {
    progress() {
      return this.pictureFileProgress;
    },
  },

  methods: {
    pictureFileChange($event) {
      this.disableBtn = false;
      this.pictureFile = $event.target.files[0];
    },

    savePicture(pictureType) {
      this.disableBtn = true;
      let no = this.pictures.length > 0 ? ++this.maxPictureNo : 0;
      const formData = new FormData();
      //formData.append("link", pictureInput.link);
      formData.append("no", no);
      formData.append("foreign_key", this.foreign_key);
      formData.append("type", this.type);
      if (pictureType === "file") formData.append("path", this.pictureFile);
      else formData.append("link", this.pictureLink);

      axios
        .post("/api/picture/", formData, {
          onUploadProgress: (uploadEvent) => {
            this.pictureFileProgress = Math.round(
              (uploadEvent.loaded / uploadEvent.total) * 100
            );
            console.log(
              "Image upload progress: " + this.pictureFileProgress + "%"
            );
          },
        })
        .then((response) => {
          console.log(response);
          this.getPictures(() => {
            this.calculateMaxPicture();
          });
          if (this.pictureFileProgress == 100) {
            location.reload();
          }
        })
        .catch((error) => {
          errors = true;
          alert("Error al subir la imagen. Intenta de nuevo.");
        });
    },

    getPictures(callback) {
      const params = {
        params: {
          type: this.type,
          foreign_key: this.foreign_key,
        },
      };
      axios
        .get("/api/picture/" + this.foreign_key, params)
        .then((response) => {
          this.pictures = response.data;
          console.log(response);
          callback();
        })
        .catch((errors) => {
          console.log(errors);
        });
    },

    calculateMaxPicture() {
      this.maxPictureNo = 0;
      console.log("pictures length: " + this.pictures.length);
      for (let key in this.pictures) {
        console.log("pictures keys: " + key);
        let no = this.pictures[key].no;
        console.log("no: " + no);
        if (this.maxPictureNo < parseInt(no)) {
          this.maxPictureNo = no;
        }
      }
      //return this.maxNum;
    },

    recalculateAllPicturesNo() {
      let updatedNo = 0;
      this.pictures.forEach((picture) => {
        const params = {
          no: updatedNo++,
        };
        console.log("current no: " + picture.no);
        console.log("updated no: " + updatedNo);
        console.log("------------");
        axios.put("/api/picture/" + picture.id, params).then((response) => {
          console.log(response);
        });
      });

      this.getPictures(() => {
        this.calculateMaxPicture();
      });
    },

    updatePictures() {
      this.getPictures(() => {
        this.calculateMaxPicture();
        this.recalculateAllPicturesNo();
        this.calculateMaxPicture();
      });
    },
  },

  created() {
    this.getPictures(() => {
      this.calculateMaxPicture();
    });
  },
};
</script>

<style>
</style>