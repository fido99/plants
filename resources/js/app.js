/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import $ from 'jquery';

require('owl.carousel');
 

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
Vue.component('slider-component', require('./components/SliderComponent.vue').default);
Vue.component('admin-component', require('./components/AdminComponent.vue').default);
Vue.component('admin-slider-component', require('./components/AdminSliderComponent.vue').default);
Vue.component('admin-plants-component', require('./components/AdminPlantsComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
 

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

$(document).ready(function() {
 $('.owl-carousel').owlCarousel({
  loop: true,
  items: 1
 });
});

const app = new Vue({
 el: '#app',
 data: {
  isModal: false,
  tel: ''
 },
 methods: {
  send(event) {
   event.preventDefault();
   let url = '/api/phone/send';
   let data = new FormData();
   data.append('pahone', this.tel);
   axios.get(url, data)
    .then((data) => {
     console.log(data.data);
    });
  }
 }
});
