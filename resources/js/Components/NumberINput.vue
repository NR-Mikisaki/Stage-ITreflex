<script setup>

import VueNumberInput from '@chenfengyuan/vue-number-input';
import {ref} from "vue";

const value = ref(1);


</script>

<template>
    <div>
        <vue-number-input placeholder="Small" size="small" v-model="value" :min="1" :max="10" inline center controls></vue-number-input>
    </div>
</template>

<style scoped>

</style>
