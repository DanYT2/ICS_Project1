import './bootstrap';

import Alpine from 'alpinejs';


window.Vue = require('vue');

window.Alpine = Alpine;

Alpine.start();
Vue.component('a', require('./components/AddBtn.vue').default);