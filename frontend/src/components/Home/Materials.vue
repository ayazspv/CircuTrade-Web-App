<script setup>
import { ref } from 'vue'
import MaterialCard from '../Materials/MaterialCard.vue'

const materials = ref([
  {
    id: 1,
    image: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80',
    title: '30x Pine Beams',
    city: 'Utrecht',
    price: 50,
  },
  {
    id: 2,
    image: 'https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80',
    title: 'Reclaimed Bricks (100 pcs)',
    city: 'Rotterdam',
    price: 120,
  },
  {
    id: 3,
    image: 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=400&q=80',
    title: 'Steel Pipes (20m)',
    city: 'Amsterdam',
    price: 75,
  },
  {
    id: 4,
    image: 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=400&q=80',
    title: 'Insulation Panels',
    city: 'The Hague',
    price: 200,
  },
])
</script>

<template>
  <section class="materials-section container my-5 py-4 rounded-4 shadow-sm">
    <h2 class="fw-bold mb-4 featured-title text-center">Featured Listings</h2>
    <div class="row g-4">
      <div
        v-for="item in materials"
        :key="item.id"
        class="col-12 col-sm-6 col-lg-3"
      >
      <MaterialCard :item="item" />
        
      </div>
    </div>
  </section>
</template>

<style scoped>
.materials-section {
  background: linear-gradient(120deg, #f8fafc 60%, #e0e7ef 100%);
}
.featured-title {
  font-family: Arial Black, Arial, sans-serif;
  color: #284C2A;
  letter-spacing: -1px;
}
</style>