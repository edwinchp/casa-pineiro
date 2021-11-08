<template>
  <div class="col-lg-4 col-md-6 col-sm-12">
    <div class="card" style="width: 15rem">
      <div class="sabrita" id="sabrita">
        <img
          class="card-img-top rounded-circle"
          src="images/sabritas.png"
          alt=""
          width="20px"
        />
      </div>

      <div class="card-body">
        <h4 class="card-title font-weight-bold">{{ name }}</h4>
        <p v-if="visitDay" class="card-text">Próxima visita: {{ visitDay }}</p>
        <p v-show="false" class="card-text">Saldo pendiente: $500.00</p>
        <div class="text-right">
          <a
            :href="'/supplier/' + id + '/edit'"
            type="button"
            class="btn btn-link"
            >Ver más</a
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["id", "name", "visitDay"],
};
</script>

<style scoped>
#sabrita {
  width: 150px;
  margin-left: 45px;
  margin-top: 20px;
}
</style>