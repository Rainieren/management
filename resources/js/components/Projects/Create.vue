<template>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow p-8 space-y-12">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Project name</label>
                    <input type="text" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-600 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" autofocus required placeholder="Awesome project name"/>
                </div>
                <div class="col-span-6 space-y-2">
                    <label for="about" class="block text-sm font-medium text-gray-700">Description</label>
                    <div class="mt-1">
                        <textarea id="about" name="about" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-600 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" placeholder="Type something awesome"></textarea>
                    </div>
                </div>
                <div class="grid col-span-6 grid-cols-3 gap-6">
                    <div class="col-span-1 space-y-2">
                        <label for="country" class="block text-sm font-medium text-gray-700">Client</label>
                        <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Github</option>
                            <option>Gitlab</option>
                            <option>BitBucket</option>
                        </select>
                    </div>
                    <div class="col-span-2 space-y-2">
                        <label for="company-website" class="block text-sm font-medium text-gray-700">
                            Project URL
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                https://gitlab.com/[company]/
                            </span>
                            <input type="text" name="company-website" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 bg-gray-50" placeholder="example-name" disabled>
                        </div>
                    </div>
                </div>
                <div class="grid col-span-6 grid-cols-3 gap-6">

                    <div class="col-span-1 space-y-2">

                        <label class="block text-sm font-medium text-gray-700">Assign to</label>
                        <div class="flex -space-x-2 overflow-hidden">
                            <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
                            <a href="" class="inline-block h-10 w-10 rounded-full border-2 bg-white text-gray-300 flex items-center justify-center border-dotted border-gray-300 hover:border-indigo-600 hover:text-indigo-600 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-span-1 space-y-2">
                        <label for="client" class="block text-sm font-medium text-gray-700">Client</label>
                        <select id="client" name="client" autocomplete="client" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Unfolded Technologies</option>
                            <option>Bakers Agency</option>
                            <option>Lodvan data center</option>
                        </select>
                    </div>
                    <div class="col-span-1 space-y-2">
                        <label for="date" class="block text-sm font-medium text-gray-700">Due date</label>
                        <input type="text" name="date" id="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-600 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md px-3 py-2" autofocus required/>
                    </div>

                </div>
            </div>


            <div class="border-b border-gray-200">
                <p class="font-medium text-2xl mb-4">Project configuration</p>
            </div>
            <div class="space-y-2">
                <p class="font-medium text-xl">Project packages</p>
                <div class="grid xl:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-4">
                    <div class="p-4 rounded-lg shadow w-full border-2 border-gray-300 hover:border-indigo-600 hover:bg-indigo-50 transition flex cursor-pointer" v-for="item in 4">
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
                            + € {{ Math.floor(Math.random() * 100) }} /mo
                        </div>

                    </div>
                </div>

            </div>

            <div class="space-y-2">
                <p class="font-medium text-xl">Hosting</p>
                <div class="grid grid-cols-1 gap-4">
                    <div class="p-4 rounded-lg shadow w-full border-2 border-gray-300 hover:border-indigo-600 hover:bg-indigo-50 transition flex cursor-pointer" v-for="item in 3">
                        <div class="w-1/2">
                            <p class="font-medium">Small projects</p>
                            <p class="text-gray-400">1 GB, 1 CPU, 25 GB SSD Disk, 1000GB Transfer</p>
                        </div>
                        <div class="w-1/2 text-right">
                            + € {{ Math.floor(Math.random() * 100) }} /mo
                        </div>

                    </div>
                    <div class="p-4 rounded-lg shadow w-full border-2 border-gray-300 hover:border-indigo-600 hover:bg-indigo-50 transition flex cursor-pointer">
                        <div class="w-1/2">
                            <p class="font-medium">No hosting</p>
                            <p class="text-gray-400">This client chooses not to include hosting</p>
                        </div>
                        <div class="w-1/2 text-right">

                        </div>

                    </div>
                </div>
            </div>
            <div class="my-10">
                <div class="grid grid-cols-1 gap-4 text-right">
                   <p class="font-medium text-2xl">Total: € 89,49 /mo</p>
                </div>
            </div>
            <div class="">
                <button type="submit" class="relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Send subscription request to client
                </button>
                <small class="text-gray-400">
                    This will send a subscription request to the client. After the client made the initial payment. The project with this exact configuration will be installed.
                </small>
            </div>


        </div>
    </div>
</template>

<script>
export default {

}
</script>
