<template>
    <top class="z-0"></top>
    <div class="bg-white z-0">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Our Catalogue</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 z-0">
                <div v-for="product in products" :key="product.id" class="group relative">
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
    </div>
</template>
<script setup>
import {onMounted, ref} from "vue";
import axios from "axios";
const products = ref([])
const fetchProducts = async () => {
    try {
        const response = await axios.get('/products')
        products.value = response.data
    } catch (error) {
        console.error('Error fetching products:', error)
    }
}

// Call fetchProducts when the component is mounted
onMounted(() => {
    fetchProducts()
})
</script>
<style scoped>

</style>
