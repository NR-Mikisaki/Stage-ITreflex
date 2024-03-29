<template>
    <div class="bg-white z-0">
        <!-- Conditionally render the product grid only when products is defined -->
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Our Catalogue</h2>
            <br />
            <select v-model="selectedColor">
                <option disabled value="">Please select a color</option>
                <option>Any</option>
                <option>Brown</option>
                <option>Blue</option>
                <option>Grey</option>
            </select>
            <select v-model="selectedCategory">
                <option disabled value="">Please select a category</option>
                <option>Any</option>
              <option v-for="category in usePage().props.categories[0].subcategories">
              {{category.name}}
              </option>
                <option v-for="category in usePage().props.categories[1].subcategories">
                    {{category.name}}
                </option>
            </select>
            <div class="mt-6 grid grid-colps-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 z-0">
                <!-- Iterate over products and render each product -->
                <div  v-for="product in filteredproducts"  :key="product.id"  class="group relative hover:opacity-75">
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
                        <p class="text-sm font-medium text-gray-900">${{ product.price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
            <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    {{ ' ' }}
                    <span class="font-medium">{{usePage().props.products.from}}</span>
                    {{ ' ' }}
                    to
                    {{ ' ' }}
                    <span class="font-medium">{{usePage().props.products.to}}</span>
                    {{ ' ' }}
                    of
                    {{ ' ' }}
                    <span class="font-medium">{{usePage().props.products.total}}</span>
                    {{ ' ' }}
                    results
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">

                    <!-- Show previous page if current page is not the first page -->
                    <template v-if="usePage().props.products.prev_page_url">
                        <Link :href="usePage().props.products.first_page_url" v-html="1" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"/>
                        <span class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700">...</span>
                        <Link :href="usePage().props.products.prev_page_url" v-html="'<-'" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"/>
                    </template>

                    <!-- Show current page -->
                    <span class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700">{{ usePage().props.products.current_page }}</span>

                    <!-- Show next page if current page is not the last page -->
                    <template v-if="usePage().props.products.next_page_url">
                        <Link :href="usePage().props.products.next_page_url" v-html="'->'" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"/>
                        <span class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700">...</span>
                        <Link :href="usePage().props.products.last_page_url" v-html="usePage().props.products.last_page"  class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"/>
                    </template>

                </nav>
            </div>

        </div>
    </div>

</template>

<script setup>
import {onMounted, ref, watch} from 'vue';
import {Link, router, usePage} from '@inertiajs/vue3'
import {ChevronRightIcon,ChevronLeftIcon} from '@heroicons/vue/outline'
const selectedCategory = ref('');
const selectedColor = ref('');
const products = usePage().props.products.data;
const filteredproducts =ref(products);
selectedCategory.value = 'Any';
selectedColor.value = 'Any';
watch(selectedCategory, (newCategory, oldCategory) => {
    if (newCategory !== oldCategory) {
        if (newCategory === 'Any') {
            filteredproducts.value = selectedColor.value === 'Any' ? products : products.filter(product => product.color === selectedColor.value.toLowerCase());
        } else {
            if (selectedColor.value === 'Any') {
                filteredproducts.value = products.filter(product => product.category_name === newCategory);
            } else {
                filteredproducts.value = products.filter(product => product.category_name === newCategory && product.color === selectedColor.value.toLowerCase());
            }
        }
    }
});

watch(selectedColor, (newColor, oldColor) => {
    if (newColor !== oldColor) {
        if (newColor === 'Any') {
            filteredproducts.value = selectedCategory.value === 'Any' ? products : products.filter(product => product.category_name === selectedCategory.value);
        } else {
            if (selectedCategory.value === 'Any') {
                filteredproducts.value = products.filter(product => product.color === newColor.toLowerCase());
            } else {
                filteredproducts.value = products.filter(product => product.color === newColor.toLowerCase() && product.category_name === selectedCategory.value);
            }
        }
    }
});

</script>
<style scoped>

</style>
