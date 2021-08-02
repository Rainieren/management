require('./bootstrap');

import { createApp } from 'vue';
// Packages
import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs'

// Components
import Header from './components/Header.vue'
import CreateProject from './components/Projects/Create.vue'

const app = createApp({})

app.use(LaravelPermissionToVueJS);
app.component('header-component', Header);
app.component('create-project-component', CreateProject);
app.mount('#app');
