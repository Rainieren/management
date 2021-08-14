require('./bootstrap');
require('canvas-confetti');

import { createApp } from 'vue';
// Packages
import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs'

// Components
import Header from './components/Header.vue'
import CreateInvoice from './components/Invoices/Create.vue'
import InvoiceItem from './components/Invoices/InvoiceItem.vue'

const app = createApp({})

app.use(LaravelPermissionToVueJS);
app.component('header-component', Header);
app.component('create-invoice-component', CreateInvoice);
app.component('invoice-item', InvoiceItem);
app.mount('#app');
