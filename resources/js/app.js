require('./bootstrap');
window.Vue = require('vue');

Vue.component('user-component', require('./components/UserComponent.vue').default);
Vue.component('user-table-component', require('./components/UserTableComponent.vue').default);
Vue.component('user-create-component', require('./components/UserCreateComponent.vue').default);

const app = new Vue({
    el: '#user-form'
});