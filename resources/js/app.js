require('./bootstrap');
require('canvas-confetti');

import { createApp } from 'vue';

// Packages
import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs';
import { VueMaskDirective } from 'v-mask';

// Components
import Header from './components/Header.vue';
import CreateInvoice from './components/Invoices/Create.vue';
import InvoiceItem from './components/Invoices/InvoiceItem.vue';

const vMaskV2 = VueMaskDirective;
const vMaskV3 = {
    beforeMount: vMaskV2.bind,
    updated: vMaskV2.componentUpdated,
    unmounted: vMaskV2.unbind
};

const app = createApp({});

app.use(LaravelPermissionToVueJS);
app.directive('mask', vMaskV3);
app.component('header-component', Header);
app.component('create-invoice-component', CreateInvoice);
app.component('invoice-item', InvoiceItem);
app.mount('#app');
