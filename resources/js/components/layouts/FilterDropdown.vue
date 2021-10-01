<template>
  <div class="dropdown-inverse dropdown">
    <button
      class="btn btn-primary dropdown-toggle"
      type="button"
      id="dropdown-7"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
    >
      {{ selectedDescription }}
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
        v-for="(filter, index) in filters"
        :key="index.name"
        @click="selectFilter(filter)"
        class="dropdown-item waves-light waves-effect"
        href="#"
      >
        {{ filter.description }}</a
      >
    </div>
  </div>
</template>

<script>
export default {
  emits: ["filterChanged"],

  data() {
    return {
      filters: [
        {
          name: "today",
          description: "Hoy",
        },
        {
          name: "weekly",
          description: "Esta semana",
        },
        {
          name: "monthly",
          description: "Este mes",
        },
        {
          name: "yearly",
          description: "Este año",
        },
        {
          name: "all",
          description: "Todos",
        },
      ],
      selectedName: null,
      selectedDescription: null,
    };
  },

  methods: {
    selectFilter(filter) {
      this.selectedName = filter.name;
      this.selectedDescription = filter.description;
      this.$emit("filterChanged", this.selectedName);
    },
  },

  mounted() {
    this.selectedName = this.filters[1].name;
    this.selectedDescription = this.filters[1].description;
    this.$emit("filterChanged", this.selectedName);
  },
};
</script>

<style scope>
</style>