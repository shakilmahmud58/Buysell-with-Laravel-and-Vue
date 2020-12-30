/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('example-footer', require('./components/Footer.vue').default);


import ExampleComponent from './components/ExampleComponent.vue';
import Textbox from './components/textbox.vue';
import Form from './components/foodiesform.vue';
import broad from './components/broadcast.vue';
import serarchbar from './components/searchbar.vue';
import review from './components/reviews.vue';
import orderby from './components/orderby.vue';
import recommendation from './components/recommendation.vue';

Vue.component('example-component',ExampleComponent);
Vue.component('broad',broad);
Vue.component('textbox',Textbox);
Vue.component('form-example',Form);
Vue.component('searchbar',serarchbar);
Vue.component('review',review);
Vue.component('orderby',orderby);
Vue.component('rec',recommendation);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
 
   el: '#app'
    

});

// const app1 = new Vue({
 
//    el: '#app1'
    

// });