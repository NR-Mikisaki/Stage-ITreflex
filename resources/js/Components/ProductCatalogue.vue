<template>
    <div class="bg-white z-0">
        <!-- Conditionally render the product grid only when products is defined -->
        <div v-if="!loading" class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Our Catalogue</h2>
            <br />
            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="horizontal-list-radio-license" type="radio" value="Clothing-Checked" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="horizontal-list-radio-license" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Clothing</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="horizontal-list-radio-id" type="radio" value="Accessories-Checked" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="horizontal-list-radio-id" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Accessories</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="horizontal-list-radio-military" type="radio" value="Brands-Checked" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="horizontal-list-radio-military" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Brands</label>
                    </div>
                </li>

            </ul>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 z-0">
                <!-- Iterate over products and render each product -->
                <div v-for="product in products" v-if="products.subcategory_id = 1 || 2 || 3 || 4 || 5 || 6 || 7 || 8" :key="product.id"  class="group relative">
                    <!-- Product Card Markup -->
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity -75 lg:h-80 z-0">
                        <img :src="product.imagesrc" :alt="product.imageAlt" class="h-full w-full object-cover object-center lg:h-full lg:w-full z-0" />
                    </div>
                    <div class="mt-4 flex justify-between z-0">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a :href="product.href">
                                    <span aria-hidden="true" class="absolute inset-0" />
                                    {{ product.name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">{{ product.color }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">{{ product.price }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Show a loading message while products are being fetched -->
        <div v-else class="flex items-center justify-center h-screen">
            <p class="text-gray-500 text-xl">Loading...</p>
        </div>
    </div>


</template>

<script setup>
import {onMounted, ref} from 'vue';

const products = ref([]);
const loading = ref(true);

onMounted(async () => {
    try {
        const res = await fetch('/products');
        products.value = await res.json();
    } catch (error) {
        console.error(error);
    } finally {
        loading.value = false;
    }
});
</script>
<style scoped>

</style>
