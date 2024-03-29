<script setup>

import {Link, router, usePage} from "@inertiajs/vue3";
import {Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot} from "@headlessui/vue";
import NumberINput from "@/Components/NumberINput.vue";
import {ShoppingBagIcon, XIcon} from "@heroicons/vue/outline";
import {computed, ref} from "vue";
const cart = ref(false)
const cartNavigation = {
    carts: usePage().props.cart
}
const totalCartPrice = computed(() => {
    let totalPrice = 0;
    if (cartNavigation.carts && cartNavigation.carts.length > 0 && cartNavigation.carts[0].cart_items) {
        cartNavigation.carts[0].cart_items.forEach(item => {
            totalPrice += item.productPrice * item.amount;
        });
    }
    return totalPrice.toFixed(2);
});
const destroy = (cartItemId)=>{
    if(confirm('Are you sure you want to delete this cart item?')){
        router.delete(`/cartitems/${cartItemId}`);
        router.reload()
    }
}

</script>

<template>
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
        <Dialog as="div" class="relative z-40 " @close="cart = false">
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
                                        <ul v-if="cartNavigation.carts && cartNavigation.carts.length > 0" role="list" class="-my-6 divide-y divide-gray-200 z-50">
                                            <li v-for="cartItem in cartNavigation.carts[0].cart_items" :key="cartItem.id" class="flex py-6">
                                                <div class="ml-4 flex flex-1 flex-col ">
                                                    <div>
                                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3>
                                                                <Link :href="route('dashboard')">{{ cartItem.productName}} </Link>
                                                            </h3>
                                                            <p class="ml-4">$ {{cartItem.productPrice}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-1 items-end justify-between text-sm">
                                                        <NumberINput></NumberINput>


                                                        <div class="flex">
                                                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500" @click="destroy(cartItem.id)">Remove</button>
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
                                    <p>$ {{totalCartPrice}}</p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                <div class="mt-6">
                                    <Link :href="route('checkout')" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</Link>
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
</template>

<style scoped>

</style>
