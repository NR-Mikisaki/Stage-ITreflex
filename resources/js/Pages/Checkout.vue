<script setup>

import {usePage} from "@inertiajs/vue3";
import NumberINput from "@/Components/NumberINput.vue";
import {computed} from "vue";
import Navbar from "@/Components/Navbar.vue";

const totalCartPrice = computed(() => {
    let totalPrice = 0;
    if (usePage().props.cart && usePage().props.cart.length > 0 && usePage().props.cart[0].cart_items) {
        usePage().props.cart[0].cart_items.forEach(item => {
            totalPrice += item.productPrice * item.amount;
        });
    }
    return totalPrice.toFixed(2);
});
</script>

<template>
    <navbar></navbar>
    <div class="h-auto bg-white pt-20">
        <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
        <div class="mx-auto max-w-5xl  justify-center px-6 md:flex md:space-x-6 xl:px-0">
            <ul v-if="usePage().props.cart && usePage().props.cart.length > 0" role="list">
                <li v-for="cartItem  in usePage().props.cart[0].cart_items" :key="cartItem.id" class="flex">
                    <div class="rounded-lg md:flex">
                        <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md border sm:flex sm:justify-start">
                            <img
                                src="https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                alt="product-image" class="w-full rounded-lg sm:w-40"/>
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-0">
                                    <h2 class="text-lg font-bold text-gray-900">{{cartItem.productName}}</h2>
                                    <div>
                                        <p class="text-sm">$ {{cartItem.productPrice*cartItem.amount}}</p>
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                    <div class="pl-5">
                                       <number-i-nput></number-i-nput>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div v-else class="justify-between mb-auto rounded-lg bg-white p-6 shadow-md border sm:flex sm:justify-start">
                <p>Your shopping basket is empty</p>
            </div>
            <!-- Sub total -->
            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700">Subtotal</p>
                    <p class="text-gray-700" >$ {{totalCartPrice}}</p>
                </div>
                <hr class="my-4"/>
                <div class="flex justify-between">
                    <p class="text-lg font-bold">Total</p>
                    <div class="">
                        <p class="mb-1 text-lg font-bold">$ {{totalCartPrice}} USD</p>
                        <p class="text-sm text-gray-700">including VAT</p>
                    </div>
                </div>
                <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">
                    Check out
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
