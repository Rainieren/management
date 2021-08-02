@extends('layouts.dashboard')

@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="">
                <ul class="flex space-x-5 mb-4 items-center">
                    <li><a href="/" class="hover:text-indigo-600 font-medium transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg></li>
                    <li><a href="" class="hover:text-indigo-600 font-medium transition-all">Dashboard</a></li>
                </ul>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">
                Welcome, {{ \Illuminate\Support\Facades\Auth::user()->name }}
            </h1>
        </div>
    </header>
    test
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 hidden">
            <div class="bg-white rounded-lg shadow">
                <div class="px-8 py-10 border-b border-gray-100">
                    <p class="font-bold text-3xl">
                        Let's get started
                    </p>
                    <p class="text-gray-400">Follow any of the instructions listed below. After executing any of the instructions, a dashboard with relevant information will be shown instead.</p>
                </div>
                <div class="px-8 py-10 border-b border-gray-100 flex">
                    @role('Client')
                        <div class="w-1/2 space-y-6 flex justify-center flex-col">
                            <h2 class="font-bold text-xl text-gray-900">
                                Create a issue
                            </h2>
                            <div class="text-gray-400">
                                Create a issue for your project. We will guide you to create and submit your first issue. To get started, click the button below.
                            </div>
                            <div class="">
                                <a href="#" class="relative justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Make a new issue
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="w-1/2 space-y-6 flex justify-center flex-col">
                            <h2 class="font-bold text-xl text-gray-900">
                                Create a project
                            </h2>
                            <div class="text-gray-400">
                                Setup a new project. We will guide you to create and install your first project. To get started, please click the button below
                            </div>
                            <div class="">
                                <a href="/projects/create" class="relative justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Set up a project
                                </a>
                            </div>
                        </div>
                    @endrole
                    <div class="w-1/2 flex items-center justify-center align-center">
                        <img src="images/document.svg" class="w-64" alt="">
                    </div>
                </div>
                <div class="px-8 py-10">
                    <div class="grid grid-cols-3 gap-6">
                        @can('create issue')
                            <div class="border border-dashed border-gray-300 p-6 rounded-lg space-y-4">
                                <div class="h-20 space-y-2">
                                    <p class="font-bold text-gray-900">Create a issue</p>
                                    <p class="text-gray-400">Create a new issue to get started.</p>
                                </div>
                                <div class="mt-auto">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-900 flex items-center space-x-2">
                                <span>
                                   Create issue
                                </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endcan
                        @can('add user')
                        <div class="border border-dashed border-gray-300 p-6 rounded-lg space-y-4">
                            <div class="h-20 space-y-2">
                                <p class="font-bold text-gray-900">Add a new user</p>
                                <p class="text-gray-400">Add a new user to the system so they can create and follow issues.</p>
                            </div>
                            <div class="mt-auto">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-900 flex items-center space-x-2">
                            <span>
                               Add user
                            </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endcan
                        <div class="border border-dashed border-gray-300 p-6 rounded-lg space-y-4">
                            <div class="h-20 space-y-2">
                                <p class="font-bold text-gray-900">Manage subscriptions</p>
                                <p class="text-gray-400">View, update or cancel your subscription and billing information at any time.</p>
                            </div>
                            <div class="mt-auto">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-900 flex items-center space-x-2">
                            <span>
                               Go to subscriptions
                            </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @can('create client')
                            <div class="border border-dashed border-gray-300 p-6 rounded-lg space-y-4">
                                <div class="h-20 space-y-2">
                                    <p class="font-bold text-gray-900">Create a client</p>
                                    <p class="text-gray-400">Create a new client to get started.</p>
                                </div>
                                <div class="mt-auto">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-900 flex items-center space-x-2">
                                        <span>
                                           Create client
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endcan
                        @can('create invoice')
                            <div class="border border-dashed border-gray-300 p-6 rounded-lg space-y-4">
                                <div class="h-20 space-y-2">
                                    <p class="font-bold text-gray-900">Create a invoice</p>
                                    <p class="text-gray-400">Create or edit a new invoice and send it to your clients.</p>
                                </div>
                                <div class="mt-auto">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-900 flex items-center space-x-2">
                                <span>
                                   Create a new invoice
                                </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endcan
                        @can('add team member')
                            <div class="border border-dashed border-gray-300 p-6 rounded-lg space-y-4">
                                <div class="h-20 space-y-2">
                                    <p class="font-bold text-gray-900">Add team members</p>
                                    <p class="text-gray-400">Add team members to your system so they can edit, show or delete issues.</p>
                                </div>
                                <div class="mt-auto">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-900 flex items-center space-x-2">
                                <span>
                                   Add a team member
                                </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="space-y-6 hidden">
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-white rounded-lg shadow p-4 flex space-x-4">
                        <div class="p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="flex flex-col justify-center w-full">
                            <div class="w-100">
                                <p class="text-gray-500">Clients</p>
                            </div>
                            <div class="flex justify-between">
                                <div class="flex space-x-2 items-end justify-end">
                                    <p class="font-extrabold text-2xl text-gray-900">20</p>
                                    <small class="text-sm text-gray-500">from 10</small>
                                </div>
                                <div class="flex text-green-500 text-sm items-end justify-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                    </svg>
                                    50.00%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-4 flex space-x-4">
                        <div class="p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex flex-col justify-center w-full">
                            <div class="w-100">
                                <p class="text-gray-500">Revenue</p>
                            </div>
                            <div class="flex justify-between">
                                <div class="flex flex-wrap">
                                    <p class="font-extrabold text-2xl text-gray-900">€10,948.02</p>
                                    <small class="text-sm text-gray-500">from €7,943.32</small>
                                </div>
                                <div class="flex text-green-500 text-sm items-end justify-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                    </svg>
                                    5.00%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-4 flex space-x-4">
                        <div class="p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </div>
                        <div class="flex flex-col justify-center w-full">
                            <div class="w-100">
                                <p class="text-gray-500">Clients</p>
                            </div>
                            <div class="flex justify-between">
                                <div class="flex space-x-2 items-end justify-end">
                                    <p class="font-extrabold text-2xl text-gray-900">500</p>
                                    <small class="text-sm text-gray-500">from 300</small>
                                </div>
                                <div class="flex text-green-500 text-sm items-end justify-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                    </svg>
                                    5.00%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="text-gray-900 font-medium">Recent issues</p>
                <table class="min-w-full divide-y divide-gray-200 shadow rounded-lg">
                    <thead class="bg-gray-50 rounded-lg">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Client
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Project
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Assigned to
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 rounded-lg">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Button indigo instead of yellow</div>
                            <div class="text-sm text-gray-500">Design alterations</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield technologies</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield program</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                      Submitted
                    </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex -space-x-1 overflow-hidden">
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Show</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Loading speed checkout page</div>
                            <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield technologies</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield program</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                      Picked up by [Developer]
                    </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex -space-x-1 overflow-hidden">
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Show</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Loading speed checkout page</div>
                            <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield technologies</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield program</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      In progress
                    </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex -space-x-1 overflow-hidden">
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Show</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Loading speed checkout page</div>
                            <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield technologies</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield program</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                      Awaiting clarification
                    </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex -space-x-1 overflow-hidden">
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Show</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Loading speed checkout page</div>
                            <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield technologies</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield program</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                      Completed
                    </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex -space-x-1 overflow-hidden">
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Show</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Loading speed checkout page</div>
                            <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield technologies</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Upperfield program</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                      Closed
                    </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex -space-x-1 overflow-hidden">
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Show</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="" class="text-indigo-600 hover:text-indigo-700 font-medium">
                        See all issues
                    </a>
                </div>

            </div>
        </div>
    </main>



@endsection
