export const basketMixin = {
    methods: {
        addProductQty(product) {
            product.qty = product.qty + 1;
            this.$root.$emit("cartUpdated", product.product_id);
        },

        reduceProductQty(product) {
            product.qty = product.qty - 1;
            this.$root.$emit("cartUpdated", product.product_id);
            if (product.qty == 0) {
                this.removeProductFromCart(product);
            }
        },

        removeProductFromCart(product) {
            this.basket.splice(
                this.basket.findIndex((a) => a.product_id === product.product_id),
                1
            );
            if (this.basket.length < 1) {
                location.reload();
            }
        },

    }
}