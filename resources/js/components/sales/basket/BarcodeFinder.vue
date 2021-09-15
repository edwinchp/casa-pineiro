<template>

</template>

<script>
export default {
    props: {
        barcode: {
            type: String,
            required: true
        }
    },

    emits: ['productFound']
};
</script>

<style>
</style>