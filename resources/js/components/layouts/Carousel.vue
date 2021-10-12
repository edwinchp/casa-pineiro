<template>
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
          :style="{ width: imgW + 'px', height: imgH + 'px !important' }"
        />
        <img v-else class="d-block" :src="picture.link" 
        :style="{ width: imgW + 'px', height: imgH + 'px !important' }"/>

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
      <div v-show="false" class="picture-options">
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
</template>

<script>
export default {
  // props: ["foreign_key", "type"],

  props: {
    foreign_key: {
      required: true,
    },
    type: {
      required: true,
    },
    imgW: {
      required: false,
      default: 500,
    },
    imgH: {
      required: false,
      default: 300,
    },
  },

  data() {
    return {
      pictures: [],
      pictureInputs: [],
      initialPictureNo: 0,
      carouselPictures: [],
      maxPictureNo: 0,
      includePictures: false,
      uploadErrors: "",
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
      let errors = false;
      this.pictureInputs.forEach((pictureInput) => {
        const formData = new FormData();
        //formData.append("link", pictureInput.link);
        formData.append("no", pictureInput.no);
        formData.append("foreign_key", this.foreign_key);
        formData.append("type", pictureInput.type);
        formData.append("path", pictureInput.path);
        formData.append("link", pictureInput.link);

        axios
          .post("/api/picture/", formData, {
            onUploadProgress: (uploadEvent) => {
              console.log(
                "Image upload progress: " +
                  Math.round((uploadEvent.loaded / uploadEvent.total) * 100) +
                  "%"
              );
            },
          })
          .then((response) => {
            console.log(response);
            this.getPictures();
            this.pictureInputs = [];
          })
          .catch((error) => {
            errors = true;
            alert("Error al subir la imagen. Intenta de nuevo.");
          });
      });
      console.log(errors);
      //console.log(!errors)

      if (this.includePictures && !errors) {
        //location.reload();
        console.log("reloaded");
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
  object-fit: cover;
  }

.carousel {
  max-width: 300px;
  max-height: 500px;
  margin-left: 0px;
}

@media (max-width: 600px) {
  .carousel {
    margin-left: 10px;
  }
}

.carousel-inner a {
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
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