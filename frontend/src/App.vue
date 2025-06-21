<script setup>

import AppLayout from './components/Layout/AppLayout.vue'
import { useRoute } from 'vue-router'
import Header from './components/Layout/Header.vue'
import { computed } from 'vue'
import AuthLayout from './components/Layout/AuthLayout.vue'

const route = useRoute();

const layoutComponent = computed(() => {
  const layout = route.meta.layout

  if (layout === 'AuthLayout') return AuthLayout
  if (layout === 'AppLayout') return AppLayout
  if (layout === 'none') return null       // explicitly no layout
  return null                         // default fallback layout
})
</script>
<template>

  <component v-if="layoutComponent" :is="layoutComponent">
    <router-view />
  </component>
  <router-view v-else />

</template>

<style scoped></style>
