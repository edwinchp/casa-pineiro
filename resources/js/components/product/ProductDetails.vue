<template>
  <div
    id="product-details"
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-labelledby="mySmallModalLabel"
    aria-hidden="true"
    v-if="product"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            {{ product.name }}
          </h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <li
              class="
                list-group-item
                d-flex
                justify-content-between
                align-items-center
              "
            >
              Precio
              <span>
                <strong>${{ product.price }}</strong></span
              >
            </li>
            <li
              class="
                list-group-item
                d-flex
                justify-content-between
                align-items-center
              "
            >
              Existentes
              <span class="badge badge-pill" :class="badgeColor">{{
                product.qty
              }}</span>
            </li>
          </ul>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button> -->
          <a class="btn" :href="'products/' + product.id + '/edit'">
            <i class="ti-pencil-alt"></i>
          </a>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          <button
            @click="addToCart(product.id)"
            class="btn"
            :disabled="product.qty < 1"
          >
            <i class="ti-shopping-cart"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  emits: ["addedToCart"],

  props: {
    product: Object,
  },

  data() {
    return {
      badgeColor: "badge-primary",
    };
  },

  computed: {
    productQty() {
      return this.product.qty;
    },
  },

  methods: {
    changeBadgeColor() {
      if (this.productQty < 3) {
        this.badgeColor = "badge-danger";
      } else {
        this.badgeColor = "badge-primary";
      }
    },
    addToCart(productId) {
      this.$emit("addedToCart", productId);
      this.changeBadgeColor();
    },

    // waitForProduct() {
    //   if (this.product == null) {
    //     setTimeout(() => {
    //       console.log("Waiting for product in ProducDetails.vue");
    //       this.waitForProduct()
    //     }, 400);
    //   } else {
    //     //this.receivedProducts = this.products;
    //   }
    //   //console.log('Picture: ' + this.products[5].picture.path);
    // },
  },

  watch: {
    product() {
      console.log("product changed");
      this.changeBadgeColor();
    },
  },

  created() {
    //this.waitForProduct();
    this.changeBadgeColor();
  },

  // mounted() {
  //   this.changeBadgeColor();
  // },
};
</script>

<style>
</style>