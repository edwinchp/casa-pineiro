<template>
  <div>
    <!--Your html here-->
    <!-- <ul>
      <li>{{ dashboardData.today }}</li>
      <li>{{ dashboardData.month }}</li>
      <li>{{ dashboardData.products }}</li>
    </ul> -->

    <section class="home">
      <div class="row">
        <div class="content col-md-6 col-lg-3">
          <h1 class="heading">Bienvenido</h1>
          <button class="button hoy">
            <h3>hoy</h3>
            <span>$100.00</span>
          </button>
          <button class="button mes">
            <h3>este mes</h3>
            <span>$2000.00</span>
          </button>
          <button class="button produc">
            <h3>productos</h3>
            <span>4000</span>
          </button>
        </div>

        <div class="image-container col-md-6 col-lg-9">
          <img
            src="/images/layouts/imageonline-co-whitebackgroundremoved.png"
          />
        </div>
      </div>
    </section>
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
* {
  font-family: "Nunito", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-transform: capitalize;
  outline: none;
  border: none;
  text-decoration: none;
  transition: 0.2s linear;
}

html {
  font-size: 100%;
  scroll-behavior: smooth;
  scroll-padding-top: 2rem;
  overflow-x: hidden;
}

section {
  padding: 2rem 9%;
}

.logo img {
  width: 17px;
  transform: scaleX(-1);
}

.dropbtn {
  color: rgb(0, 0, 0);
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  background: rgb(226, 225, 225);
}

.button {
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.home {
  box-shadow: 0 0.2rem 1rem rgb(73, 72, 72);
  margin: 100px;
  margin-top: 10rem;
}

.home .row .content .heading {
  font-size: 3rem;
  color: #686868;
  margin: 0 0 1em;
}

.home .row {
  display: flex;
  align-items: center;
  gap: 2rem;
}

.home .row .image-container {
  flex: 0 0 25rem;
}

.home .row .image-container img {
  width: 100%;
  height: 100%;
  margin-left: 10rem;
}
.home .row .content {
  flex: 1 1 100rem;
  position: static;
  display: flex;
  flex-direction: column;
}

.home .row .content .hoy {
  width: 269px;
  height: 58px;
  border-radius: 7px;
  background: #f9f9f9;
  color: #68b1ff;
  box-shadow: 10px 0 #68b1ff inset;
  border: solid 2px rgba(177, 177, 177, 0.5);
  font-size: 16px;
}

.home .row .content .hoy h3 {
  color: #68b1ff;
  float: left;
  margin-left: 20px;
  font-size: 20px;
}

.home .row .content .hoy span {
  color: rgb(95, 94, 94);
  float: right;
}

.home .row .content .hoy:hover {
  color: #68b1ff;
  border: solid 2px #68b1ff;
}

.home .row .content .mes {
  width: 269px;
  height: 58px;
  border-radius: 7px;
  background: #f9f9f9;
  color: #68b1ff;
  box-shadow: 10px 0 #68b1ff inset;
  border: solid 2px rgba(177, 177, 177, 0.5);
  margin-top: 25px;
}

.home .row .content .mes h3 {
  color: #68b1ff;
  float: left;
  margin-left: 20px;
  font-size: 20px;
}

.home .row .content .mes span {
  color: rgb(95, 94, 94);
  float: right;
}

.home .row .content .mes:hover {
  color: #68b1ff;
  border: solid 2px #68b1ff;
}

.home .row .content .produc {
  width: 269px;
  height: 58px;
  border-radius: 7px;
  background: #f9f9f9;
  box-shadow: 10px 0 #90c418 inset;
  color: #90c418;
  margin-top: 25px;
  border: solid 2px rgba(177, 177, 177, 0.5);
}

.home .row .content .produc h3 {
  color: #90c418;
  float: left;
  margin-left: 20px;
  font-size: 20px;
}

.home .row .content .produc span {
  color: rgb(95, 94, 94);
  float: right;
}

.home .row .content .produc:hover {
  color: #90c418;
  border: solid 2px #90c418;
}


@media (max-width: 450px) {
  .home .row .content {
    font-size: 1rem;
  }

  .home .row .content .button {
    width: 250px;
    height: 58px;
  }

  .home .row .image-container {
    margin-left: -9rem;
  }
  .home .row .content .heading {
    font-size: 1.5rem;
    color: #686868;
  }

  .home {
    margin: 40px;
    margin-top: 8rem;
  }
}
</style>