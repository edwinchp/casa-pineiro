<template>
  <div v-if="stores.length > 1">
    <label for="">Tienda</label><br />
    <div class="dropdown-inverse dropdown open">
      <button
        class="btn btn-inverse dropdown-toggle waves-effect waves-light"
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
        >
          {{ store.name }}</a
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  emits: ["storeIdChanged"],

  props: ["currentStoreId"],

  data() {
    return {
      stores: [],
      currentStore: Object,
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
        console.log();
        callback();
      });
    },

    selectStore(store) {
      this.selectedStoreId = store.id;
      this.selectedStoreName = store.name;
      this.$emit("storeIdChanged", this.selectedStoreId);
    },

    findSelectedStoreId(store) {
      return store.id == this.currentStoreId;
    },
  },

  mounted() {
    this.getStores(() => {
      this.selectedStoreId = this.currentStoreId;
      this.selectedStoreName = this.stores.find(
        (store) => store.id == this.currentStoreId
      ).name;
      this.$emit("storeIdChanged", this.selectedStoreId);
    });
  },
};
</script>

<style>
</style>