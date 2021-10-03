<template>
</template>

<script>
export default {
  props: {
    accessToken: {
      required: false,
      default: null,
    },
  },

  methods: {
    redirect() {
      if (this.accessToken != null) location.replace("/");
    },
  },

  created() {
    this.redirect();
  },
};
</script>

<style>
</style>