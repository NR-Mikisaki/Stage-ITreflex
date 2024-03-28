<template>
    <!-- Mobile menu -->
    <top class="z-40"></top>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-40 lg:hidden" @close="open = false">
            <TransitionChild
                as="template"
                enter="transition-opacity ease-linear duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="transition-opacity ease-linear duration-300"
                leave-from="opacity-100"
                leave-to="opacity-0"
                :show="open"
            >
                <div class="fixed inset-0 bg-black bg-opacity-25"/>
            </TransitionChild>

            <div class="fixed inset-0 z-40 flex">
                <TransitionChild
                    as="template"
                    enter="transition ease-in-out duration-300 transform"
                    enter-from="-translate-x-full"
                    enter-to="translate-x-0"
                    leave="transition ease-in-out duration-300 transform"
                    leave-from="translate-x-0"
                    leave-to="-translate-x-full"
                    :show="open"
                >
                    <DialogPanel
                        class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl"
                    >
                        <div class="flex px-4 pb-2 pt-5">
                            <button
                                type="button"
                                class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400"
                                @click="open = false"
                            >
                                <span class="absolute -inset-0.5"/>
                                <span class="sr-only">Close menu</span>
                                <XIcon class="h-6 w-6" aria-hidden="true"/>
                            </button>
                        </div>

                        <!-- Links -->
                        <TabGroup as="div" class="mt-2">
                            <div class="border-b border-gray-200">
                                <TabList class="-mb-px flex space-x-8 px-4">
                                    <Tab
                                        as="template"
                                        v-for="category in navigation.categories"
                                        :key="category.name"
                                        v-slot="{ selected }"
                                    >
                                        <button
                                            :class="[selected ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-900', 'flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium']"
                                        >
                                            {{ category.name }}
                                        </button>
                                    </Tab>
                                </TabList>
                            </div>
                            <TabPanels as="template" class="z-40">
                                <div class="row-start-1 grid grid-cols-3 gap-x-8 gap-y-10 text-sm">
                                    <TabPanel v-for="category in navigation.categories" :key="category.name"
                                              class="space-y-10 px-4 pb-8 pt-10">
                                        <div class="grid grid-cols-2 gap-x-4">
                                            <div v-for="subcategories in category.subcategories"
                                                 :key="subcategories.name" class="group relative text-sm">
                                                <div
                                                    class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                                    <img :src="subcategories.imageSrc" :alt="subcategories.imageAlt"
                                                         class="object-cover object-center"/>
                                                </div>
                                                <a :href="subcategories.href"
                                                   class="mt-6 block font-medium text-gray-900">
                                                    <span class="absolute inset-0 z-40" aria-hidden="true"/>
                                                    {{ subcategories.name }}
                                                </a>
                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                            </div>
                                        </div>
                                        <div v-for="category in categories" :key="category.name" class="z-40">
                                            <p :id="`${category.id}-${category.id}-heading-mobile`"
                                               class="font-medium text-gray-900">{{ category.name }}</p>
                                            <ul role="list"
                                                :aria-labelledby="`${category.id}-${category.id}-heading-mobile`"
                                                class="mt-6 flex flex-col space-y-6">
                                                <li v-for="subcategory in categories.subcategories" :key="category.name"
                                                    class="flow-root">
                                                    <a :href="subcategory.href"
                                                       class="-m-2 block p-2 text-gray-500">{{ subcategories.name }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </TabPanel>
                                </div>
                            </TabPanels>
                        </TabGroup>

                        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                            <div v-for="page in navigation.pages" :key="page.name" class="flow-root">
                                <a :href="page.href" class="-m-2 block p-2 font-medium text-gray-900">{{
                                        page.name
                                    }}</a>
                            </div>
                        </div>

                        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                            <div class="flow-root">
                                <Link :href="route('login')" class="-m-2 block p-2 font-medium text-gray-900">Sign in
                                </Link>
                            </div>
                            <div class="flow-root">
                                <Link :href="route('register')" class="-m-2 block p-2 font-medium text-gray-900">Create
                                    account
                                </Link>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 px-4 py-6">
                            <a href="#" class="-m-2 flex items-center p-2">
                                <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt=""
                                     class="block h-auto w-5 flex-shrink-0"/>
                                <span class="ml-3 block text-base font-medium text-gray-900">CAD</span>
                                <span class="sr-only">, change currency</span>
                            </a>
                        </div>
                    </DialogPanel>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>

    <header class="relative bg-white z-40">


        <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="border-b border-gray-200">
                <div class="flex h-16 items-center">
                    <button type="button" class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden"
                            @click="open = true">
                        <span class="absolute -inset-0.5"/>
                        <span class="sr-only">Open menu</span>
                        <MenuIcon class="h-6 w-6" aria-hidden="true"/>
                    </button>

                    <!-- Logo -->
                    <div class="ml-4 flex lg:ml-0">
                        <Link :href="route('root')">
                            <img class="h-8 w-auto"
                                 src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="logo"/>
                        </Link>

                    </div>

                    <!-- Flyout menus -->
                    <PopoverGroup class="hidden lg:ml-8 lg:block lg:self-stretch">
                        <div class="flex h-full space-x-8">
                            <popover class="flex">
                                <div class="relative flex">
                                    <popover-button @click="categoriesOpen = !categoriesOpen"
                                                    :class="[categoriesOpen ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-700 hover:text-gray-900', 'relative z-40 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out']">
                                        Categories
                                    </popover-button>
                                </div>

                                <transition enter-active-class="transition ease-out duration-200"
                                            enter-from-class="opacity-0" enter-to-class="opacity-100"
                                            leave-active-class="transition ease-in duration-150"
                                            leave-from-class="opacity-100" leave-to-class="opacity-0">
                                    <PopoverPanel v-show="categoriesOpen"
                                                  class="absolute inset-x-0 top-full text-sm text-gray-500">
                                        <!-- Presentational element used to render the bottom shadow -->
                                        <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                                        <div class="relative bg-white">
                                            <div class="mx-auto max-w-7xl px-8">
                                                <div class="grid grid-cols-3 gap-x-8 gap-y-10 py-16">
                                                    <div class="col-start-1 grid grid-cols-3 gap-x-8">
                                                        <div v-for="category in navigation.categories"
                                                             :key="category.name"
                                                             class="group relative text-base sm:text-sm">
                                                            <p :id="`${category.name}-heading`"
                                                               class="font-medium text-gray-900">{{ category.name }}</p>
                                                            <ul role="list"
                                                                :aria-labelledby="`${category.name}-heading`"
                                                                class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                <li v-for="subcategory in category.subcategories"
                                                                    :key="subcategory.name" class="flex">
                                                                    <a :href="subcategory.href"
                                                                       class="hover:text-gray-800">{{
                                                                            subcategory.name
                                                                        }}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </PopoverPanel>
                                </transition>
                            </popover>
                            <Link :href="route('catalogue')"
                               class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
                                Catalogue
                            </Link>

                        </div>
                    </PopoverGroup>

                    <div class="ml-auto flex items-center">
                        <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                            <nav class="-mx-3 flex flex-1 justify-end">
                                <FlyoutMenu>

                                </FlyoutMenu>
                            </nav>
                            <span class="h-6 w-px bg-gray-200" aria-hidden="true"/>

                        </div>

                        <div class="hidden lg:ml-8 lg:flex">
                            <a href="#" class="flex items-center text-gray-700 hover:text-gray-800">
                                <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt=""
                                     class="block h-auto w-5 flex-shrink-0"/>
                                <span class="ml-3 block text-sm font-medium">CAD</span>
                                <span class="sr-only">, change currency</span>
                            </a>
                        </div>

                        <div class="flex lg:ml-6">
                            <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
                                <button @click="searchbarOpen = true">
                                    <span class="sr-only">Search</span>
                                    <SearchIcon class="h-6 w-6" aria-hidden="true" />
                                </button>
                            </a>
                        </div>

                        <!-- Search Popup -->
                        <TransitionRoot as="template" :show="searchbarOpen">
                            <Dialog as="div" class="relative z-40" @close="searchbarOpen = false">
                                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                                </TransitionChild>

                                <div class="fixed inset-0 z-40 w-screen overflow-y-auto">
                                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                            <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                    <div class="sm:flex sm:items-start">
                                                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                            <search-icon class="h-6 w-6 text-red-600" aria-hidden="true" />
                                                        </div>
                                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                            <DialogTitle as="h3" class="text-base font-semibold leading-6 text-gray-900">Searchbar</DialogTitle>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-500">What do you want to search?</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 items-center h-10">
                                                        <button type="button" class="mt-3 inline-flex justify-center rounded-md bg-white h-full px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm  hover:bg-gray-50 sm:mt-0 sm:w-auto" style="padding: 0 6px;" @click="cancelSearch, searchbarOpen=false">Cancel</button>
                                                        <input type="text" v-model="searchQuery" placeholder="Search products..." class="mt-3 flex-grow block w-200 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" style="padding: 0 8px;">
                                                    </div>



                                                    <div class="mt-2 w-full">
                                                        <div v-if="filteredProducts.length > 0">
                                                            <ul class="divide-y divide-gray-200">
                                                                <li v-for="product in filteredProducts" :key="product.id" class="py-2">
                                                                    <p>{{ product.name }}</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div v-else class="bg-white p-4 rounded-md shadow-md">
                                                            <p class="text-gray-500">No results found!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </DialogPanel>
                                        </TransitionChild>
                                    </div>
                                </div>
                            </Dialog>
                        </TransitionRoot>

                        <!-- Cart -->
                        <div class="ml-4 flow-root lg:ml-6">
                            <button class="group -m-2 flex items-center p-2"
                                    @click="cart = true">
                                <ShoppingBagIcon class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" aria-hidden="true"/>
                                <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                <span class="sr-only">items in cart, view bag</span>

                            </button>

                        </div>
                        <TransitionRoot as="template" :show="cart">
                            <Dialog as="div" class="relative z-40 "@close="cart = false">
                                <TransitionChild
                                    as="template"
                                    enter="transition-opacity ease-linear duration-300"
                                    enter-from="opacity-0"
                                    enter-to="opacity-100"
                                    leave="transition-opacity ease-linear duration-300"
                                    leave-from="opacity-100"
                                    leave-to="opacity-0"
                                    :show="cart"
                                >
                                    <div class="fixed inset-0 bg-black bg-opacity-25"/>
                                </TransitionChild>

                                <div class="fixed inset-0 z-40 flex justify-end">
                                    <TransitionChild
                                        as="template"
                                        enter="transition ease-in-out duration-300 transform"
                                        enter-from="translate-x-full"
                                        enter-to="translate-x-0"
                                        leave="transition ease-in-out duration-300 transform"
                                        leave-from="translate-x-0"
                                        leave-to="translate-x-full"
                                        :show="cart"
                                    >
                                        <DialogPanel>
                                            <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl" >
                                                <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                                    <div class="flex items-start justify-between">
                                                        <DialogTitle class="text-lg font-medium text-gray-900">Shopping cart</DialogTitle>
                                                        <div class="ml-3 flex h-7 items-center">
                                                            <button type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500" @click="cart = false">
                                                                <span class="absolute -inset-0.5" />
                                                                <span class="sr-only">Close panel</span>
                                                                <XIcon class="h-6 w-6" aria-hidden="true" />
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="mt-8"  v-if="$page.props.auth.user">
                                                        <div class="flow-root">
                                                            <ul role="list" class="-my-6 divide-y divide-gray-200 z-50">
                                                                <li v-for="cartItem in cartNavigation.Carts[0].cart_items" :key="cartItem.id" class="flex py-6">
                                                                    <div class="ml-4 flex flex-1 flex-col">
                                                                        <div>
                                                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                                                <h3>
                                                                                    <Link :href="route('dashboard')">{{ cartItem.productName}} </Link>
                                                                                </h3>
                                                                                <p class="ml-4">{{cartItem.productPrice}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex flex-1 items-end justify-between text-sm">
                                                                            <number-input></number-input>

                                                                            <div class="flex">
                                                                                <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500" @click="removeItemFromCart(cartItem.id)">Remove</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="border-t border-gray-200 px-4 py-6 sm:px-6" >
                                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                                        <p>Subtotal</p>
                                                        <p  v-if="$page.props.auth.user" >$ {{totalCartPrice}}</p>
                                                    </div>
                                                    <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                                    <div class="mt-6">
                                                        <a href="#" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                                                    </div>
                                                    <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                                        <p>
                                                            or{{ ' ' }}
                                                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500" @click="open = false">
                                                                Continue Shopping
                                                                <span aria-hidden="true"> &rarr;</span>
                                                            </button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </DialogPanel>
                                    </transitionchild>
                                </div>
                            </Dialog>
                        </transitionroot>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup>

import Top from "@/Components/Top.vue"
import FlyoutMenu from "@/Components/FlyoutMenu.vue"
import NumberInput from "@/Components/NumberINput.vue";
import {computed, onMounted, ref} from 'vue'
import {Link, router, usePage} from '@inertiajs/vue3'
import {
    Dialog,
    DialogPanel, DialogTitle,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import {MenuIcon, ShoppingBagIcon, SearchIcon, XIcon} from '@heroicons/vue/outline'
import Navbar from "@/Components/Navbar.vue";
import {ChevronDownIcon} from "@heroicons/vue/solid";
const open = ref(false)
const cart = ref(false)
const isLoggedIn = ref(false)
const searchbarOpen = ref(false)
const categoriesOpen = ref(false)

const openRegistrationModal = () => {
    window.location.href = '/registration-page'
}
const openLoginModal = () => {
    window.location.href = '/login-page'
}

const navigation = {
    categories: usePage().props.categories
}

const products = ref([])

// Define the fetchProducts function
const fetchProducts = async () => {
    try {
        const response = await axios.get('/products/index')
        products.value = response.data
    } catch (error) {
        console.error('Error fetching products:', error)
    }
}

// Call fetchProducts when the component is mounted
onMounted(() => {
    fetchProducts()
})

const searchQuery = ref('')

// Define filteredProducts computed property and cancelSearch method
const filteredProducts = computed(() => {
    if (products.value && products.value.length > 0) {
        if (!searchQuery.value) {
            return products.value;
        } else {
            return products.value.filter(product => product.name.toLowerCase().startsWith(searchQuery.value.toLowerCase()));
        }
    } else {
        return [];
    }
})

const cancelSearch = () => {
    searchQuery.value = '';
}
const cartNavigation = {
    Carts: usePage().props.cart
}
const totalCartPrice = computed(() => {
    let totalPrice = 0;
    if (cartNavigation.Carts[0].cart_items) {
        cartNavigation.Carts[0].cart_items.forEach(item => {
            totalPrice += item.productPrice * item.amount;
        });
    }
    return totalPrice.toFixed(2);
});
const currentUser ={
    users: usePage().props.user
}
function removeItemFromCart(cartItemId) {
    router.delete(`/cartitems/${cartItemId}`, {
        onBefore: () => confirm('Are you sure you want to delete this cart item?'),
        onSuccess: () => router.visit('/',{
            preserveState :true
        })
    });
}

</script>
<script>
import {usePage} from "@inertiajs/vue3";

export default {

    data() {
        return {
            searchQuery: '',
        };
    },
    computed: {
        filteredProducts() {

            if (usePage().props.products && usePage().props.products && Array.isArray(usePage().props.products)) {
                if (!this.searchQuery) {
                    return usePage().props.products;
                } else {
                    // Filter products whose names start with the entered letter
                    return usePage().props.products.filter(product => product.name.toLowerCase().startsWith(this.searchQuery.toLowerCase()));
                }
            } else {
                // Handle case where products are not available
                return [];
            }
        }
    },
    methods: {
        cancelSearch() {
            this.searchQuery = '';
        },



    },

};


</script>

<style scoped>
/* Your scoped CSS styles here */
.z-40 {
    z-index: 40;
}
</style>
