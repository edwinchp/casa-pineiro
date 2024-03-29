/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import store from "./store"
import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);
//Vue.use(require('vue-resource'));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('product-index-component', require('./components/product/ProductIndexComponent.vue').default);
Vue.component('product-create-form', require('./components/product/ProductCreateFormComponent.vue').default);
Vue.component('product-edit-form', require('./components/product/ProductEditFormComponent.vue').default);
Vue.component('products-table-component', require('./components/product/ProductsTableComponent.vue').default);
Vue.component('product-component', require('./components/product/ProductComponent.vue').default);
Vue.component('user-navbar', require('./components/layouts/user-navbar.vue').default);
Vue.component('sales-index-component', require('./components/sales/SalesIndexComponent.vue').default);
Vue.component('login-form', require('./components/login/loginForm.vue').default);
Vue.component('input-text', require('./components/layouts/InputText.vue').default);
Vue.component('carousel', require('./components/layouts/Carousel.vue').default);
Vue.component('customer-index', require('./components/customer/CustomerIndex.vue').default);
//Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('basket-index', require('./components/sales/basket/BasketIndex.vue').default);
Vue.component('supplier-index', require('./components/supplier/SupplierIndex.vue').default);
Vue.component('supplier-create', require('./components/supplier/SupplierCreate.vue').default);
Vue.component('supplier-edit', require('./components/supplier/SupplierEdit.vue').default);
Vue.component('location-index', require('./components/location/LocationIndex.vue').default);
Vue.component('location-edit', require('./components/location/LocationEdit.vue').default);
Vue.component('location-create', require('./components/location/LocationCreate.vue').default);
Vue.component('dashboard-index', require('./components/dashboard/DashboardIndex.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const productIndex = new Vue({
    el: '#app',
    store
});