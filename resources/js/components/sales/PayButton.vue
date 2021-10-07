<template>
  <button
    class="btn btn-success"
    @click="checkout"
    :disabled="!allowPayment"
    id="pagar"
    :style="getTextSize"
  >
    <strong>Pagar</strong>
  </button>
</template>

<script>
export default {
  emits: ["paymentSuccess"],
  props: {
    basket: {
      required: true,
    },

    store_id: {
      required: false,
      default: 0,
    },

    total: {
      required: true,
    },

    received: {
      required: true,
    },

    change: {
      required: true,
    },

    allowPayment: {
      required: true,
      default: false,
    },

    textSize: {
      required: false,
      default: 25,
    },
  },

  methods: {
    checkout() {
      let formData = {
        store_id: 1,
        status: 1,
        products: this.basket,
        total: this.total,
        received: this.received,
        change: this.change,
      };

      axios
        .post("/api/sales", formData)
        .then((response) => {
          if (response.status == 200 || response.status == 201) {
            this.$emit("paymentSuccess");
            this.$fire({
              title: "¡Listo!",
              text: "Pago exitoso",
              type: "success",
              timer: 2500,
            });
          }
        })
        .catch((error) => {
          console.log(error);
          alert("No fue posible realizar el pago. Intente nuevamente");
          location.reload();
        });
    },
  }, // end methods

  computed: {
    getTextSize() {
      return "font-size: " + this.textSize;
    },
  },
};
</script>

<style scoped>
#pagar {
  font-size: 16px;
}
</style>