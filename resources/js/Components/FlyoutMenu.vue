<template xmlns="http://www.w3.org/1999/html">
    <Popover v-if="$page.props.auth.user" class="relative">
        <PopoverButton class="inline-flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900">
            <span>My account</span>
            <ChevronDownIcon class="h-5 w-5" aria-hidden="true"/>
        </PopoverButton>

        <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1"
                    enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150"
                    leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
            <PopoverPanel class="absolute left-32 z-10 mt-5 flex w-screen max-w-xs  -translate-x-1/2 px-4">
                <div
                    class="w-screen max-w-40 flex-auto overflow-hidden rounded-3xl bg-white text-sm leading-6 shadow-lg ring-1 ring-gray-900/5">
                    <div>
                        <Link

                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class=" text-sm font-medium text-gray-700 hover:text-gray-800 group relative max-w-xs flex gap-x-6 rounded-lg pt-4 pl-4 pb-4 hover:bg-gray-50"
                        >
                            Dashboard
                        </Link>
                    </div>
                    <div>
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('profile.edit')"
                            class="text-sm font-medium text-gray-700 hover:text-gray-800 group relative max-w-xs flex gap-x-6 rounded-lg pl-4 pb-4 hover:bg-gray-50"

                        >
                            My account
                        </Link>
                    </div>
                    <template v-if="$page.props.auth.user">
                        <div>
                            <Link
                                method="POST"
                                v-if="$page.props.auth.user"
                                :href="route('logout')"
                                class="text-sm font-medium text-gray-700 hover:text-gray-800 group relative max-w-xs flex gap-x-6 rounded-lg pl-4 pb-4 hover:bg-gray-50"
                            >
                                Log out
                            </Link>
                        </div>
                    </template>
                </div>
            </PopoverPanel>
        </transition>
    </Popover>
    <template v-else>
        <Link :href="route('login')"
              class="pl-4 text-sm font-medium text-gray-700 hover:text-gray-800">Sign in
        </Link>
        <Link :href="route('register')"
              class="pl-4 text-sm font-medium text-gray-700 hover:text-gray-800">Create account
        </Link>
    </template>
</template>

<script setup>
import {Popover, PopoverButton, PopoverPanel} from '@headlessui/vue'
import {ChevronDownIcon, PhoneIcon} from '@heroicons/vue/solid'
import {
    ChartPieIcon,
    FingerPrintIcon,
} from '@heroicons/vue/outline'
import {Link} from "@inertiajs/vue3";

const solutions = [
    {name: 'Analytics', description: 'Get a better understanding of your traffic', href: '#', icon: ChartPieIcon},
    {name: 'Security', description: "Your customers' data will be safe and secure", href: '#', icon: FingerPrintIcon},
]
</script>
