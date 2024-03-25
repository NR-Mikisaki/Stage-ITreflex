<template>
        <head title="Catalogue"></head>
        <navbar ></navbar>
        <product-catalogue></product-catalogue>
</template>

<script setup>
import Navbar from "@/Components/Navbar.vue";
import ProductCatalogue from "@/Components/ProductCatalogue.vue";
</script>

<style scoped>
/* Your scoped CSS styles here */
navbar {
    position: relative;
    z-index: 1; /* Ensure navbar is on top */
}

product-catalogue {
    position: relative;
    z-index: 0; /* Lower z-index to ensure it's behind navbar */
}
</style>
