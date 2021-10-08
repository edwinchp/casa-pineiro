<template>
  <div class="col-lg-4 col-md-6 col-sm-12">
    <div class="card" style="width: 15rem">
      <div class="anaquel" id="anaquel">
        <img
          class="card-img-top rounded"
          src="/images/anaquel2.jpg"
          alt="no image"
        />
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
</style>