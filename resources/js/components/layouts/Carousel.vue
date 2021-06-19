<template>
  <div
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
          class="d-block w-100"
          :src="'/images/products/' + picture.path"
          alt="s"
        />
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
  props: ["pictures"],

  methods: {
    isPictureActive(picture) {
      return picture.no === "0";
    },
  },
};
</script>

<style scoped>
.carousel-inner img {
  width: 200px;
  height: 300px;
}

.carousel {
  max-width: 200px;
  height: 300px;
  max-height: 600px;
}
</style>