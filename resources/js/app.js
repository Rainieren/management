require('./bootstrap');

import { createApp } from 'vue';
import Header from './components/Header.vue'


const app = createApp({})

app.component('header-component', Header);
app.mount('#app');
