<template>
  <div v-if="stores.length > 0" class="dropdown-inverse dropdown open">
    <button
      class="btn btn-primary dropdown-toggle waves-effect waves-light"
      type="button"
      id="dropdown-7"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
    >
      {{ selectedStoreName }}
    </button>
    <div
      class="dropdown-menu"
      aria-labelledby="dropdown-7"
      data-dropdown-in="fadeIn"
      data-dropdown-out="fadeOut"
      x-placement="bottom-start"
      style="
        position: absolute;
        transform: translate3d(0px, 40px, 0px);
        top: 0px;
        left: 0px;
        will-change: transform;
      "
    >
      <a
        v-for="(store, index) in stores"
        :key="index"
        @click="selectStore(store)"
        class="dropdown-item waves-light waves-effect"
        href="#"
      >
        {{ store.name }}</a
      >
    </div>
  </div>
</template>

<script>
export default {
  emits: ["storeIdChanged"],

  data() {
    return {
      stores: [],
      selectedStoreId: null,
      selectedStoreName: null,
    };
  },

  methods: {
    getStores(callback) {
      axios.get("/api/user/stores").then((resp) => {
        this.stores = resp.data.stores;
        this.selectedStoreId = this.stores[0].id;
        this.selectedStoreName = this.stores[0].name;
        callback();
      });
    },

    selectStore(store) {
      this.selectedStoreId = store.id;
      this.selectedStoreName = store.name;
      this.$emit("storeIdChanged", this.selectedStoreId);
    },
  },

  mounted() {
    this.getStores(() => {
      this.$emit("storeIdChanged", this.selectedStoreId);
    });
  },
};
</script>

<style>
</style>