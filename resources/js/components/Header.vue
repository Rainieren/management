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
                                        <a :href="item.href" class="bg-indigo-600 text-white px-3 py-2 rounded-md text-sm font-medium">{{ item.name }}</a>
                                    </template>
                                    <a v-else :href="item.href"  class="text-gray-700 hover:bg-indigo-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition">{{ item.name }}</a>
                                </template>
                                <Popover class="relative" v-slot="{ open }">
                                    <PopoverButton :class="[open ? 'text-gray-900' : 'text-gray-700', 'group bg-white px-3 py-2 text-sm rounded-md inline-flex items-center font-medium hover:text-gray-900 focus:outline-none']">
                                        <span>Company</span>
                                        <ChevronDownIcon :class="[open ? 'text-gray-600' : 'text-gray-400', 'ml-2 h-5 w-5 group-hover:text-gray-500']" aria-hidden="true" />
                                    </PopoverButton>

                                    <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                                        <PopoverPanel class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                                            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                                    <a v-for="item in solutions" :key="item.name" :href="item.href" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                        <component :is="item.icon" class="flex-shrink-0 h-6 w-6 text-indigo-600" aria-hidden="true" />
                                                        <div class="ml-4">
                                                            <p class="text-base font-medium text-gray-900">
                                                                {{ item.name }}
                                                            </p>
                                                            <p class="mt-1 text-sm text-gray-500">
                                                                {{ item.description }}
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </PopoverPanel>
                                    </transition>
                                </Popover>
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
                                        <p class="px-4 py-2 text-sm text-gray-700">Signed in as <span class="font-bold">{{ auth.email }}</span></p>
                                        <hr class="border-gray-100">
                                        <MenuItem v-for="item in profile" :key="item" v-slot="{ active }">
                                            <a :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
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
                            <a :href="item.href" class="bg-indigo-600 text-white block px-3 py-2 rounded-md text-sm transition-all">{{ item.name }}</a>
                        </template>
                        <a v-else :href="item.href" class="text-gray-900 hover:bg-indigo-600 hover:text-white block px-3 py-2 rounded-md text-sm transition-all">{{ item.name }}</a>
                    </template>
                    <a v-for="item in solutions" :key="item.name" :href="item.href" class="text-gray-900 hover:bg-indigo-600 hover:text-white block px-3 py-2 rounded-md text-sm transition-all">
                        {{ item.name }}
                    </a>
                </div>

                <div class="pt-4 pb-3 border-t border-gray-100">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                        </div>
                        <div class="ml-3 space-y-2">
                            <div class="text-base font-medium leading-none text-gray-900">Tom Cook</div>
                            <div class="text-sm font-medium leading-none text-gray-400">{{ auth.email }}</div>
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
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems, Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import { BellIcon, MenuIcon, XIcon, ChevronDownIcon, ChartBarIcon,
    CursorClickIcon,
    ViewGridIcon,
    UserGroupIcon,
UserIcon,
UsersIcon,
SpeakerphoneIcon} from '@heroicons/vue/outline'
const solutions = [
    {
        name: 'Teams',
        description: 'Manage the teams within your organisation',
        href: '#',
        icon: UserGroupIcon,
    },
    {
        name: 'Employees',
        description: "Manage the employees within your organisation",
        href: '#',
        icon: UsersIcon,
    },{
        name: 'Clients',
        description: 'Manage or get in touch with your clients.',
        href: '#',
        icon: UserIcon,
    },{
        name: 'Announcements',
        description: 'Create announcements about eventents that are happening to a broad audience',
        href: '#',
        icon: SpeakerphoneIcon,
    }
]
const navigation = [
    {
        name: 'Dashboard',
        href: '/',
    },{
        name: 'Issues',
        href: '/issues',
    },{
        name: 'Tickets',
        href: '#',
    },{
        name: 'Invoices',
        href: '/invoices',
    },{
        name: 'Projects',
        href: '#',
    }]

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
        Popover,
        PopoverButton,
        PopoverGroup,
        PopoverPanel,
        ChevronDownIcon,
        ChartBarIcon,
        CursorClickIcon,
        ViewGridIcon,
        UserIcon,
        UsersIcon,
        SpeakerphoneIcon
    },
    setup() {
        const open = ref(false)

        return {
            solutions,
            navigation,
            open,
        }
    },
    props: ['auth'],
    data() {
        return {
            profile: [
                {
                    name: 'Account',
                    href: '/user/',
                },
                {
                    name: 'Manage subscription',
                    href: '/user/' + this.auth.name + '/billing',
                },{
                    name: 'Settings',
                    href: '/user/' + this.auth.name + '/settings',
                },{
                    name: 'Support',
                    href: '/support',
                }]
        }
    },
}
</script>
