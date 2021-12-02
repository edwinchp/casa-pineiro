<template>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text"><i :class="iconClass"></i></span>
    </div>
    <input
      type="text"
      class="form-control"
      :class="inputField.class"
      autocomplete="off"
      @input="inputChange"
      v-model="input"
      :disabled="!isActive"
    />
    <div class="invalid-feedback">{{ inputField.feedback }}</div>
  </div>
</template>

<script>
export default {
  props: {
    inputText: "",
    inputField: Object,
    iconClass: String,
    isActive: {
      required: false,
      default: true,
    },
  },

  data() {
    return {
      input: "",
      counter: 0,
    };
  },

  methods: {
    inputChange(event) {
      this.input = event.target.value;
      this.$emit("inputChanged", this.input);
    },

    waitUntilInputTextIsReady() {
      if (typeof this.inputText !== "undefined") {
        this.input = this.inputText;
      } else {
        console.log("waiting inputText: " + typeof this.inputText);
        setTimeout(() => {
          this.waitUntilInputTextIsReady();
          this.counter++;
          if (this.counter > 7) {
            alert("Upps, algo salió mal.");
            window.location.reload();
          }
        }, 2000);
      }
    },
  },

  mounted() {
    this.waitUntilInputTextIsReady();
  },
};
</script>

<style>
</style>