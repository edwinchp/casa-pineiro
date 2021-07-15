<template>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
      <li class="page-item" v-if="pagination.current_page > 1">
        <a
          class="page-link"
          href="#"
          tabindex="-1"
          @click.prevent="changePage(pagination.current_page - 1)"
          >Anterior</a
        >
      </li>
      <li
        v-for="page in pagesNumber"
        :key="page"
        v-bind:class="page == isActive ? 'active' : ''"
        class="page-item"
      >
        <a class="page-link" href="#" @click.prevent="changePage(page)">{{
          page
        }}</a>
      </li>
      <li
        class="page-item"
        v-if="pagination.current_page < pagination.last_page"
      >
        <a
          class="page-link"
          @click.prevent="changePage(pagination.current_page + 1)"
          >Siguiente</a
        >
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  emits: ["pageChanged"],

  props: {
    pagination: {
      type: Object,
      requiered: true,
    },
  },

  data() {
    return {
      paginationChanged: {
        total: 0,
        current_page: 0,
        per_page: 0,
        last_page: 0,
        from: 0,
        to: 0,
      },
    };
  },

  computed: {
    isActive: function () {
      return this.pagination.current_page;
    },

    pagesNumber: function () {
      if (!this.pagination.to) {
        return [];
      }

      var from = this.pagination.current_page - 2; //TODO OFFSET
      if (from < 1) {
        from = 1;
      }

      var to = from + 2 * 2; //TODO OFFSET
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }

      var pagesArray = [];
      while (from <= to) {
        pagesArray.push(from);
        from++;
      }

      return pagesArray;
    },
  },

  methods: {
    changePage(page) {
      this.pagination.current_page = page;
      //this.getProducts(page);
      this.$emit("pageChanged", this.pagination.current_page);
    },

    getProductName(product) {
      let shortName = product.name.substring(0, 40);
      return shortName.length >= 40 ? shortName + "..." : shortName;
    },

    waitPagination() {
      if (this.pagination == null) {
        setTimeout(() => {
          console.log("Wating for pagination in Pagination.vue");
          this.waitPagination();
        }, 800);
      } else {
        console.log("pagination = " + this.pagination);
        this.paginationChanged = this.pagination;
      }
    },
  },

  mounted() {
    this.waitPagination();
  },
};
</script>

<style lang="css" scoped>
nav {
  margin: 1em;
}
</style>>
</style>