require('./bootstrap');
window.Vue = require('vue');

Vue.component('welcome', require('./components/Welcome.vue').default);
Vue.component('page', require('./components/Page.vue').default);

const app = new Vue({
    el: '#app'
});