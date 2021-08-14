<template>
    <form id="store-invoice" action="" method="POST">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-6 sm:col-span-3">
                <label for="client" class="block text-sm font-medium text-gray-700">Client</label>
                <select v-model="fields.client" @change="getClientEmail" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="client" aria-label="Default select example">
                    <option value="''" disabled selected >Select a client</option>
                    <option v-for="client in clients" :value="client">{{ client.name }}</option>
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3 space-y-2">
                <div class="">
                    <label for="recipient" class="block text-sm font-medium text-gray-700">Recipient</label>
                    <input v-model="fields.email" id="recipient" type="email" :class="{'bg-white': this.fields.other_recipient}" class="mt-1 focus:ring-0 bg-gray-100 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="recipient" :value="this.fields.other_recipient ? fields.email : fields.client.email" placeholder="example@outlook.com" :readonly="this.fields.other_recipient === false">
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
            <invoice-item></invoice-item>
            <div class="col-span-6">
                <a @click="duplicateInvoiceItemForm" class="font-medium text-indigo-600 flex space-x-2 cursor-pointer">
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
    export default {
        data() {
            return {
                fields: {
                    client: '',
                    email: '',
                    memo: null,
                    due_date: null,
                    invoice_items: [],
                    other_recipient: false,
                    notify_recipient: true,
                },
                rows: [
                    { description: '', unit: '', price: '' },
                    { description: '', unit: '', price: '' }
                ]
            }
        },
        props: ['clients'],
        mounted: function() {

        },
        methods: {
            duplicateInvoiceItemForm() {

            },
            getClientEmail() {
                this.fields.email = this.fields.client.email;
            }
        }
    }
</script>
