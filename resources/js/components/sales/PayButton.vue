<template>
  <button class="btn btn-success" @click="checkout"><h4><strong>Pagar</strong></h4></button>
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

    customer_id: {
      //type: String,
      required: true,
    },
    total: {
      required: true,
    },

    received: {
      required: true,
      default: 200,
    },
  },

  data() {
    return {
      basketProducts: this.basket,
    };
  },

  methods: {
    checkout() {
      let formData = {
        store_id: 1,
        status: 1,
        products: this.basket,
        total: this.total,
        received: this.received,
        change: this.received - this.total,
      };

      axios
        .post("/api/sales", formData)
        .then((response) => {
          if (response.status == 200 || response.status == 201) {
            console.log("Pago exitoso");
            console.log(response);
            this.$emit("paymentSuccess");
          }
        })
        .catch((error) => {
          console.log(error);
          alert("No fue posible realizar el pago. Intente nuevamente");
          location.reload();
        });
      //});
      //this.miniCart.splice(0, this.miniCart.length);
      // get the total of items of this.miniCart
    },
  }, // end methods
};
</script>

<style>
</style>