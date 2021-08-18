<template>
    <form id="store-invoice" action="/invoices/store" method="POST">
        <input type="hidden" name="_token" :value="fields.csrf">
        <input type="hidden" name="invoice_items" :value="JSON.stringify(fields.invoice_items)">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-6 sm:col-span-3">
                <label for="client" class="block text-sm font-medium text-gray-700">Client</label>
                <select v-model="fields.client" @change="getClientEmail" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="client" aria-label="Default select example">
                    <option value="''" disabled selected >Select a client</option>
                    <option v-for="client in clients" :value="client.id">{{ client.name }}</option>
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3 space-y-2">
                <div class="">
                    <label for="recipient" class="block text-sm font-medium text-gray-700">Recipient</label>
                    <input v-model="fields.email" id="recipient" type="email" :class="{'bg-white': this.fields.other_recipient}" class="mt-1 focus:ring-0 bg-gray-100 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="recipient" placeholder="example@outlook.com" :readonly="this.fields.other_recipient === false">
                </div>
            </div>
            <div class="col-span-6 space-y-2">
                <div class="flex items-start justify-start" v-if="this.fields.client">
                    <div class="flex items-center h-5">
                        <input v-model="fields.other_recipient" id="other" name="other" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="other" class="font-medium text-gray-700">Other recipient</label>
                        <p class="text-gray-500">Change the email of the recipient.</p>
                    </div>
                </div>
                <div class="flex items-start justify-start">
                    <div class="flex items-center h-5">
                        <input v-model="fields.notify_recipient" id="notify" name="notify" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="notify" class="font-medium text-gray-700">Notify recipient</label>
                        <p class="text-gray-500">'If checked; the recipient will receive a payment request email notification.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-5">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-6">
                <p class="font-medium text-lg">Invoice items</p>
            </div>
<!--            <invoice-item :fields.sync="fields" :index="index" v-for="(item, index) in fields.invoice_items"></invoice-item>-->
            <div class="divide-y-2 divide-gray-300 md:divide-none col-span-6 space-y-4" id="invoice_item_container" v-for="(item, index) in fields.invoice_items">
                <div class="col-span-6 grid grid-cols-12 gap-4 py-4 md:py-0" id="invoice_item">
                    <div class="col-span-12 sm:col-span-6 md:col-span-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <input v-model="fields.invoice_items[index].description" id="description" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="description" required autocomplete="description">
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-2">
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                        <input v-model="fields.invoice_items[index].quantity" id="quantity" type="number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="quantity" required autocomplete="quantity">
                    </div>
                    <div class="col-span-11 md:col-span-3">
                        <label for="price" class="block text-sm font-medium leading-5 text-gray-700">
                            Unit price
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </span>
                            </div>
                            <input v-model="fields.invoice_items[index].unit_price" v-mask="mask" id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md pl-10 pr-16 " type="text" name="unit_price" placeholder="0.00" required="required">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    USD
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 flex items-end justify-center">
                        <a @click="deleteRow(index)" class="text-red-600 cursor-pointer bottom-2 relative" v-if="index > 0">
                            Delete item
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-span-6">
                <a @click="addRow()" class="font-medium text-indigo-600 flex space-x-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>
                        Add item
                    </span>
                </a>
            </div>
        </div>
        <hr class="my-5">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-6">
                <label for="memo" class="block text-sm font-medium text-gray-700">Memo</label>
                <textarea v-model="fields.memo" name="memo" id="" cols="30" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2"></textarea>
            </div>
            <div class="col-span-6 md:col-span-1">
                <label for="due_date" class="block text-sm font-medium text-gray-700">Due date</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input v-model="fields.due_date" id="due_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md pl-3 pr-16 " type="number" name="due_date" placeholder="0" required="required">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                            Days
                        </span>
                    </div>
                </div>
            </div>
        </div>


    </form>
</template>

<script>

    import createNumberMask from 'text-mask-addons/dist/createNumberMask';

    const currencyMask = createNumberMask({
        prefix: '',
        allowDecimal: true,
        decimalSymbol: '.',
        includeThousandsSeparator: true,
        thousandsSeparatorSymbol: ',',
        allowNegative: false,
    });

    export default {
        data() {
            return {
                fields: {
                    client: '',
                    email: '',
                    memo: null,
                    due_date: null,
                    invoice_items: [
                        { description: '', quantity: '', unit_price: '' }
                    ],
                    other_recipient: false,
                    notify_recipient: true,
                    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                mask: currencyMask,
            }
        },
        props: ['clients'],
        mounted: function() {

        },
        methods: {
            addRow () {
                this.fields.invoice_items.push({
                    description: '',
                    quantity: '',
                    unit_price: ''
                })
            },
            deleteRow (index) {
                this.fields.invoice_items.splice(index, 1)
            },
            getClientEmail() {
                this.fields.email = this.fields.client.email;
            }
        }
    }
</script>
