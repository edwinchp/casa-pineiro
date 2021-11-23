<template>
  <div>
    <!--Your html here-->
    <ul>
      <li>{{ dashboardData.today }}</li>
      <li>{{ dashboardData.month }}</li>
      <li>{{ dashboardData.products }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    accessToken: {
      required: false,
      default: null,
    },
  },

  data() {
    return {
      dashboardData: {},
    };
  },

  methods: {
    redirect() {
      if (this.accessToken != null) location.replace("/");
    },

    getDashboardData() {
      axios.get("/api/dashboard").then((response) => {
        this.dashboardData = response.data;
      });
    },
  },

  created() {
    this.redirect();
    this.getDashboardData();
  },
};
</script>

<style scoped>
</style>