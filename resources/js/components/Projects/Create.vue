<template>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow p-8 space-y-6">
            <div>
                <ul>
                    <li>Name project</li>
                    <li>Category that describes the project the best</li>
                    <li>Description of the project</li>
                    <li>Attachments</li>
                </ul>
            </div>

            <div class="space-y-6">
                <p class="font-medium text-xl">Project packages</p>
                <div class="grid grid-cols-4 gap-6">
                    <div class="p-4 rounded-lg shadow w-full border-2 border-gray-300 hover:border-indigo-600 transition flex cursor-pointer" v-for="item in 4">
                        <div class="w-1/2">
                            <p class="font-medium">Individual</p>
                            <div class="text-gray-400">
                                <ul>
                                    <li>2 Accounts</li>
                                    <li>15GB Storage</li>
                                    <li>Unlimited invoices</li>
                                    <li>Unlimited clients</li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-1/2 text-right">
                            + € 20 /mo
                        </div>

                    </div>
                </div>

            </div>

            <div class="space-y-2">
                <p class="font-medium text-xl">Hosting</p>
                <div class="grid grid-cols-1 gap-4">
                    <div class="p-4 rounded-lg shadow w-full border-2 border-gray-300 hover:border-indigo-600 transition flex cursor-pointer" v-for="item in 4">
                        <div class="w-1/2">
                            <p class="font-medium">Small projects</p>
                            <p class="text-gray-400">1 GB, 1 CPU, 25 GB SSD Disk, 1000GB Transfer</p>
                        </div>
                        <div class="w-1/2 text-right">
                            + € 10 /mo
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
export default {

}
</script>
