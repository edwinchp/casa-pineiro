<template>
  <div>
    <div
      v-if="pictures.length > 0"
      id="carouselExampleIndicators"
      class="carousel slide"
      data-ride="carousel"
    >
      <ol class="carousel-indicators">
        <li
          v-for="picture in pictures"
          :key="picture.no"
          data-target="#carouselExampleIndicators"
          :data-slide-to="picture.no"
          :class="[isPictureActive(picture) ? 'active' : '']"
        ></li>
      </ol>
      <div class="carousel-inner">
        <div
          v-for="picture in pictures"
          :class="[isPictureActive(picture) ? 'active' : '', 'carousel-item']"
          :key="picture.no"
        >
          <img
            v-if="picture.link == null"
            class="d-block w-100"
            :src="'/images/products/' + picture.path"
          />
          <img v-else class="d-block" :src="picture.link" />

          <div class="carousel-caption d-none d-md-block mb-3">
            <a
              v-if="picture.path"
              :href="'/images/products/' + picture.path"
              class="btn btn-outline-light btn-sm"
              target="_blank"
              >Ampliar</a
            >
            <a
              v-else
              :href="picture.link"
              class="btn btn-outline-light btn-sm"
              target="_blank"
              >Ampliar</a
            >
          </div>
        </div>
        <div class="picture-options">
          <button
            class="btn btn-inverse btn-icon"
            data-target="#pictureOptionsModal"
            data-toggle="modal"
            @click="calculateMaxPicture"
          >
            <i class="fas fa-cog icon-white"></i>
          </button>
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div v-else class="add-pictures">
      <button
        class="btn btn-inverse"
        data-target="#pictureOptionsModal"
        data-toggle="modal"
        @click="calculateMaxPicture"
      >
        Agregar imágenes
      </button>
    </div>

    <!-- MODAL -->
    <div
      class="modal fade"
      id="pictureOptionsModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Modificar Imágenes
            </h5>

            <button @click="addNewPictureInput">Nueva imagen</button>
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

            <!-- CURRENT PICTURES -->
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th scope="col">Imagen</th>
                  <th scope="col">No</th>
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
                  <td>{{ picture.no }}</td>
                  <td v-if="picture.link == null">NA</td>
                  <td v-else>
                    <input
                      class="form-control"
                      type="text"
                      v-model="picture.link"
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

            <!-- New Images -->
            <div>
              <div v-for="pictureInput in pictureInputs" :key="pictureInput.no">
                <label for="1">{{ pictureInput.no }}</label>
                <input
                  type="file"
                  accept="image/png, image/jpeg"
                  :value="pictureInput.path"
                  @input="pictureChange($event, pictureInput)"
                />
                <input
                  type="text"
                  :value="pictureInput.link"
                  @input="pictureLinkChange($event, pictureInput)"
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
              @click="savePictures"
            >
              <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
              </span>
              <span class="text">Guardar</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    foreign_key: String,
    type: String,
  },

  //props: ["pictures", "foreign_key"],

  data() {
    return {
      pictures: [],
      pictureInputs: [],
      initialPictureNo: 0,
      carouselPictures: [],
      maxPictureNo: 0,
      includePictures: false,
    };
  },

  methods: {
    deletePicture(id) {
      axios.delete("/api/picture/" + id).then((response) => {
        console.log(response);
        this.getPictures(() => {
          this.calculateMaxPicture();
          this.recalculateAllPicturesNo();
        });
      });
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

    isPictureActive(picture) {
      return picture.no === "0";
    },

    isPicturefromLink(picture) {
      return picture.link === null ? "NA" : picture.link;
    },

    addNewPictureInput() {
      if (this.pictures.length < 1) {
        this.pictureInputs.push({
          no: this.maxPictureNo++,
          link: null,
          type: this.type,
          path: null,
        });
      } else {
        this.pictureInputs.push({
          no: ++this.maxPictureNo,
          link: null,
          type: this.type,
          path: null,
        });
      }
    },

    pictureLinkChange($event, pictureInput) {
      //this.pictureInputs[pictureInput.no].link = $event.target.value;
      for (let key in this.pictureInputs) {
        let no = this.pictureInputs[key].no;
        if (no == pictureInput.no) {
          // console.log(no);
          // console.log(key);
          this.pictureInputs[key].link = $event.target.value;
        }
      }
    },

    pictureChange($event, pictureInput) {
      for (let key in this.pictureInputs) {
        let no = this.pictureInputs[key].no;
        if (no == pictureInput.no) {
          // console.log(no);
          // console.log(key);
          this.pictureInputs[key].path = $event.target.files[0];
          this.includePictures = true;
        }
      }
    },

    savePictures() {
      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };
      this.pictureInputs.forEach((pictureInput) => {
        const formData = new FormData();
        //formData.append("link", pictureInput.link);
        formData.append("no", pictureInput.no);
        formData.append("foreign_key", this.foreign_key);
        formData.append("type", pictureInput.type);
        formData.append("path", pictureInput.path);
        formData.append("link", pictureInput.link);

        axios.post("/api/picture/", formData, config).then((response) => {
          console.log(response);
          this.getPictures();
          this.pictureInputs = [];
        });
      });

      if (this.includePictures) {
        location.reload();
      }
    },

    waitUntilPicturesAreReady() {
      if (parseInt(this.pictures.length) > 1) {
        this.carouselPictures = this.pictures;

        console.log("waiting for true pictures: " + typeof this.pictures);
      } else {
        console.log("waiting for else pictures: " + typeof this.pictures);
        setTimeout(() => {
          this.waitUntilPicturesAreReady();
        }, 1000);
      }
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
  }, // END METHODS

  created() {
    //this.waitUntilPicturesAreReady();

    console.log("typeof this.pictures: " + typeof this.pictures);
    let array = this.pictures;
    this.getPictures(() => {
      this.calculateMaxPicture();
    });
    console.log(this.pictures[0] + " pictures[0]");
    console.log(this.carouselPictures + " carouselPictures[0]");
    console.log(" pictures array:" + array[1]);
    //this.recalculateAllPicturesNo();
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