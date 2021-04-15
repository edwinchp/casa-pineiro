<template>
  <div>
    <input type="number" :value="this.new_qty" @input="qtyChanged" />
    {{ sumQty }}
  </div>
</template>

<script>
export default {
  props: ["current_qty"],

  data() {
    return {
      new_qty: 0,
      changed_qty: 0, // taken from 'current_qty'
      sum_qty: 0,
    };
  },

  methods: {
    qtyChanged(event) {
      let target_value = parseInt(event.target.value);
      this.new_qty = target_value;
      this.$emit("qtyChanged", this.new_qty);
    },
  },

  computed: {
    sumQty() {
      let sum = this.changed_qty + this.new_qty;
      this.sum_qty = sum;
      return sum;
    },
  },

  created() {
    this.changed_qty = parseInt(this.current_qty);
  },
};
</script>

<style>
</style>