<template>
  <div
    id="sale-details"
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-labelledby="mySmallModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            {{ "Venta " + sale_id }}
          </h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <li
              v-for="product in details"
              :key="product.id"
              class="
                list-group-item
                d-flex
                justify-content-between
                align-items-center
              "
            >
              {{ product.name }}
              <span class="badge badge-pill badge-primary m-1">{{
                product.qty
              }}</span>
              <span>
                <strong>${{ product.price }}</strong></span
              >
            </li>
          </ul>

          <div class="sale-details mt-3 mr-3 ml-3">
            <div class="d-flex flex-row-reverse">
              <div><strong>Total:</strong> ${{ sale.total }}</div>
            </div>
            <div class="d-flex flex-row-reverse">
              <div><strong>Recibido:</strong> ${{ sale.received }}</div>
            </div>
            <div class="d-flex flex-row-reverse">
              <div><strong>Cambio:</strong> ${{ sale.change }}</div>
            </div>

            <div class="d-flex flex-row">
              <div>
                <p class="secondary-text">
                  {{ getCreatedAt(sale.created_at) }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button> -->
          <!-- <a class="btn">
            <i class="ti-pencil-alt"></i>
          </a> -->
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["sale_id"],

  data() {
    return {
      badgeColor: "badge-primary",
      sale: {},
      details: [],
    };
  },

  methods: {
    async getSaleDetails() {
      const response = await axios
        .get("/api/sales/details", {
          params: {
            sale_id: this.sale_id,
          },
        })
        .then((resp) => {
          this.sale = resp.data.sale;
          this.details = resp.data.details;
          // console.log(resp);
          // console.log(resp.data);
          // console.log(this.sale_id);
        });
      // console.log(response);
      // console.log(params);
      //const data = await response.data;

      return;
      console.log("hesssssllo");
    },

    getCreatedAt(created_at) {
      let date = new Date(created_at);
      let months = [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic",
      ];
      return (
        date.getDate() +
        "-" +
        months[date.getMonth()] +
        "-" +
        date.getFullYear() +
        " " +
        date.getHours() +
        ":" +
        date.getMinutes() +
        ":" +
        date.getSeconds()
      );
    },
  },

  watch: {
    sale_id() {
      console.log("watch");
      this.getSaleDetails();
    },
  },
};
</script>

<style>
</style>