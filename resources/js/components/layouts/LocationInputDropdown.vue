<template>
  <div>
    <label>Ubicación</label><br />
    <div class="dropdown-inverse dropdown open">
      <button
        class="btn btn-light border border-dark dropdown-toggle"
        type="button"
        id="dropdown-7"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >
        {{ targetExists ? shortName(selectedName, 20) : "Sin ubicación" }}
      </button>
      <div
        class="dropdown-menu"
        aria-labelledby="dropdown-7"
        data-dropdown-in="fadeIn"
        data-dropdown-out="fadeOut"
        x-placement="bottom-start"
        style=""
      >
        <a
          v-for="(d, index) in data"
          :key="index"
          class="dropdown-item waves-light waves-effect"
          :class="d.id == selectedId ? 'active' : ''"
          @click="selectItem(d)"
          href="#"
        >
          {{ shortName(d.name, 30) }}</a
        >
        <div v-if="targetExists" class="dropdown-divider"></div>
        <a
          v-if="targetExists"
          class="dropdown-item waves-light waves-effect"
          href="#"
          @click="removeItem"
          ><i class="fas fa-trash pr-2"></i>Remover ubicación</a
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  emits: ["idChanged"],

  props: ["currentId", "storeId"],

  data() {
    return {
      data: [],
      selectedId: null,
      selectedName: null,
      target: {},
      targetData: {},
    };
  },

  methods: {
    getData(callback) {
      const params = {
        params: {
          store_id: this.storeId,
        },
      };
      axios.get("/api/location", params).then((resp) => {
        this.data = resp.data;
        //this.selectedId = this.data[0].id;
        //this.selectedName = this.data[0].name;
        callback();
      });
    },

    async getTarget(callback) {
      const response = await axios.get("/api/products/" + this.currentId);
      this.target = response.data.product;
      callback();
    },

    async getTargetData() {
      console.log("exists? " + this.targetExists);
      if (this.targetExists) {
        const response = await axios.get(
          "/api/location/" + this.target.location_id
        );
        this.targetData = response.data;
        this.selectedName = this.targetData.name;
        this.selectedId = this.targetData.id;
      }
    },

    selectItem(obj) {
      let params = {
        name: this.target.name,
        price: this.target.price,
        qty: this.target.qty,
        store_id: this.target.store_id,
        location_id: obj.id,
      };

      // this.selectedId = obj.id;
      // this.selectedName = obj.name;
      // this.$emit("idChanged", this.selectedId);
      this.$fire({
        title: "¿Estás seguro?",
        text: "La ubicación cambiará a " + obj.name,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, adelante!",
        cancelButtonText: "Cancelar",
        focusCancel: true,
      }).then((result) => {
        if (typeof result.value !== "undefined")
          axios.put("/api/products/" + this.target.id, params).then((resp) => {
            if (resp.status == 200) {
              this.$fire({
                title: "¡Listo!",
                text: "Actualizado con éxito",
                type: "success",
                timer: 2500,
              });
              this.getAllData();
            }
          });
      });
    },

    removeItem() {
      let params = {
        name: this.target.name,
        price: this.target.price,
        qty: this.target.qty,
        store_id: this.target.store_id,
        location_id: null,
      };

      this.$fire({
        title: "¿Estás seguro?",
        text: "La ubicación se eliminará",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, adelante!",
        cancelButtonText: "Cancelar",
        focusCancel: true,
      }).then((result) => {
        if (typeof result.value !== "undefined")
          axios.put("/api/products/" + this.target.id, params).then((resp) => {
            if (resp.status == 200) {
              this.$fire({
                title: "¡Listo!",
                text: "Actualizado con éxito",
                type: "success",
                timer: 2500,
              });
              this.getAllData();
              this.selectedId = null;
            }
          });
      });
    },

    findSelectedId(obj) {
      return obj.id == this.currentId;
    },

    getAllData() {
      this.getData(() => {
        this.$emit("idChanged", this.selectedId);
      });
      this.getTarget(() => {
        this.getTargetData();
      });
    },

    resolveSelectedName() {
      return new Promise((resolve) => {
        setTimeout(() => {
          resolve(this.selectedName);
        }, 800);
      });
    },

    shortName(name, maxLength) {
      let short = name.substring(0, maxLength);
      if (short.length < name.length) {
        return short + "...";
      } else {
        return name;
      }
    },
  },

  computed: {
    targetExists() {
      return this.target.location_id != null;
    },
  },

  mounted() {
    this.getAllData();
  },
};
</script>

<style scoped>
.dropdown-menu {
  max-height: 280px;
  overflow-y: auto;
}
</style>