<script setup>

import Header from './Header.vue';
import Footer from './Footer.vue';

import { useRoute } from 'vue-router';
const route = useRoute();

</script>
<template>

    <Header />
    <main class="d-flex flex-column">
        <slot />
    </main>
    <Footer />

</template>
<style scoped></style>