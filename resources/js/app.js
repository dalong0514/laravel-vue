require('./bootstrap');
window.Vue = require('vue');

Vue.component('welcome', require('./components/Welcome.vue').default);

const app = new Vue({
    el: '#app'
});