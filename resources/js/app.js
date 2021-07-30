require('./bootstrap');

import { createApp } from 'vue';
//Mixins

// Components
import Header from './components/Header.vue'
import CreateProject from './components/Projects/Create.vue'

const app = createApp({})

app.component('header-component', Header);
app.component('create-project-component', CreateProject);
app.mount('#app');
