<template>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text"><i :class="iconClass"></i></span>
    </div>
    <input
      type="text"
      class="form-control"
      :class="inputField.class"
      name="qty"
      autocomplete="off"
      v-model="input"
      @input="inputChange"
    />
    <div class="invalid-feedback">{{ inputField.feedback }}</div>
  </div>
</template>

<script>
export default {
  props: {
    inputText: null,
    inputField: Object,
    iconClass: String,
  },

  data() {
    return {
      input: this.inputText,
    };
  },

  methods: {
    inputChange(event) {
      this.input = event.target.value;
      this.$emit("inputChanged", this.input);
    },
  },
};
</script>

<style>
</style>