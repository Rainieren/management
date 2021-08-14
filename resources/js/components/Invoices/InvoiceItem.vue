<template>
    <div class="divide-y-2 divide-gray-300 md:divide-none col-span-6 space-y-4" id="invoice_item_container">
        <div class="col-span-6 grid grid-cols-6 gap-4 py-4 md:py-0" id="invoice_item">
            <div class="col-span-6 sm:col-span-4 md:col-span-3">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <input id="description" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="items[]" value="" required autocomplete="description">
            </div>
            <div class="col-span-6 sm:col-span-2 md:col-span-1">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input id="quantity" type="number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" name="items[]" value="1" required autocomplete="quantity">
            </div>
            <div class="col-span-6 md:col-span-2">
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
                    <input id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md pl-10 pr-16 " type="text" name="items[]" placeholder="0.00" value="" required="required">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                            USD
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
}
</script>
