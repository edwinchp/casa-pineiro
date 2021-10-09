<template>
  <div class="col-lg-4 col-md-6 col-sm-12">
    <div class="card" style="width: 15rem">
      <div class="anaquel" id="anaquel">
        <img
          class="card-img-top rounded"
          v-if="location.primary_picture != null"
          :src="location.primary_picture"
          alt="Sin imagen"
        />
        <i v-else class="fas fa-boxes"></i>
      </div>

      <div class="card-body">
        <h4 class="card-title font-weight-bold">{{ location.name }}</h4>
        <p class="card-text">15 productos</p>

        <div class="text-right">
          <button type="button" class="btn btn-link">
            <a :href="'location/' + location.id + '/edit'">Ver más</a>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    location: Object,
  },
};
</script>

<style scoped>
#anaquel {
  width: 100px;
  margin-left: 45px;
  margin-top: 20px;
}
#anaquel img {
  height: 250px;
  width: 150px;
}

.card {
  background-color: #f7f7f7;
}

.fa-boxes {
  font-size: 128px;
  padding: 0px;
  margin-right: 10px;
  margin-bottom: 95px;
  margin-top: 25px;
  color: rgb(243, 186, 159);
}
</style>