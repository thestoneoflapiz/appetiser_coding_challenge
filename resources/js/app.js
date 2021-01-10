require('./bootstrap');

import Vue from 'vue';
import VCalendar from 'v-calendar';

import App from './app.vue';

Vue.use(VCalendar, {
    componentPrefix: 'vc', 
});

const app = new Vue({
    el: "#app",
    components: { App }
});