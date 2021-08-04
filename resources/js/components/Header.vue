<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div>
        <Disclosure as="nav" class="bg-white" v-slot="{ open }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="/">
                                <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow" />
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <template v-for="(item, itemIdx) in navigation" :key="item">
                                    <template v-if="(itemIdx === 0)">
                                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                        <a href="/" class="bg-indigo-600 text-white px-3 py-2 rounded-md text-sm font-medium">{{ item }}</a>
                                    </template>
                                    <a v-else href="/"  class="text-gray-700 hover:bg-indigo-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition">{{ item }}</a>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button class="relative bg-white p-1 rounded-full text-gray-700 hover:text-black focus:outline-none">
                                <span class="sr-only">View notifications</span>
                                <BellIcon class="h-6 w-6" aria-hidden="true" />
                                <span class="bg-red-600 text-white shadow rounded-full text-xs h-4 w-4 absolute flex items-center justify-center font-medium top-0 right-0 p-0.5">
                                    1
                                </span>
                            </button>

                            <!-- Profile dropdown -->
                            <Menu as="div" class="ml-3 relative">
                                <div>
                                    <MenuButton class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                    </MenuButton>
                                </div>
                                <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                    <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <p class="px-4 py-2 text-sm text-gray-700">Signed in as <span class="font-bold">tom@example.com</span></p>
                                        <hr class="border-gray-100">
                                        <MenuItem v-for="item in profile" :key="item" v-slot="{ active }">
                                            <a href="/" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item }}</a>
                                        </MenuItem>
                                        <hr class="border-gray-100">
                                        <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                                    </MenuItems>
                                </transition>
                            </Menu>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <DisclosureButton class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-900 hover:text-gray-900 hover:bg-gray-50 focus:outline-none">
                            <span class="sr-only">Open main menu</span>
                            <MenuIcon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                            <XIcon v-else class="block h-6 w-6" aria-hidden="true" />
                        </DisclosureButton>
                    </div>
                </div>
            </div>

            <DisclosurePanel class="md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <template v-for="(item, itemIdx) in navigation" :key="item">
                        <template v-if="(itemIdx === 0)">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="/" class="bg-indigo-600 text-white block px-3 py-2 rounded-md text-base transition-all">{{ item }}</a>
                        </template>
                        <a v-else href="/" class="text-gray-900 hover:bg-indigo-600 hover:text-white block px-3 py-2 rounded-md text-sm transition-all">{{ item }}</a>
                    </template>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-100">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                        </div>
                        <div class="ml-3 space-y-2">
                            <div class="text-base font-medium leading-none text-gray-900">Tom Cook</div>
                            <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                        </div>
                        <button class="ml-auto bg-white flex-shrink-0 p-1 rounded-full text-gray-900 hover:text-indigo-600 focus:outline-none relative">
                            <span class="sr-only">View notifications</span>
                            <BellIcon class="h-6 w-6" aria-hidden="true" />
                            <span class="bg-red-600 text-white shadow rounded-full text-xs h-4 w-4 absolute flex items-center justify-center font-medium top-0 right-0 p-0.5">
                                1
                            </span>
                        </button>
                    </div>
                    <div class="mt-3 px-2 space-y-1">
                        <a v-for="item in profile" :key="item" href="#" class="block px-3 py-2 rounded-md text-sm text-gray-900 hover:text-white hover:bg-indigo-600 transition-all">{{ item }}</a>
                    </div>
                </div>
            </DisclosurePanel>
        </Disclosure>
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-xl md:text-3xl font-bold text-gray-900">
                    Dynamic title based on route
                </h1>
            </div>
        </header>
    </div>
</template>

<script>
import { ref } from 'vue'
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { BellIcon, MenuIcon, XIcon } from '@heroicons/vue/outline'

const navigation = ['Dashboard', 'Issues', 'Tickets', 'Invoices', 'Projects', 'Clients', 'Team', 'Employees']

const profile = ['Account', 'Manage subscription', 'Settings', 'Support']

export default {
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        BellIcon,
        MenuIcon,
        XIcon,
    },
    setup() {
        const open = ref(false)

        return {
            navigation,
            profile,
            open,
        }
    },
}
</script>
