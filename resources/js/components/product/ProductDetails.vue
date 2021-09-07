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
          <button class="btn">
            <i class="ti-shopping-cart"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
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
  },

  watch: {
    product() {
      console.log("product changed");
      this.changeBadgeColor();
    },
  },

  created() {
    this.changeBadgeColor();
  },

  mounted() {
    this.changeBadgeColor();
  },
};
</script>

<style>
</style>