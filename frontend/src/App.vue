<script setup>

import AppLayout from './layouts/AppLayout.vue'
import { useRoute } from 'vue-router'

const route = useRoute();

</script>

<template>

  <AppLayout>
    <router-view />
  </AppLayout>

</template>

<style scoped></style>
