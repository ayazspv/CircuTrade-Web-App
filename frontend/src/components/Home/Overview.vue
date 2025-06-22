<script setup>
import { ref } from 'vue'

const cities = ref([
  { name: 'Amsterdam', emoji: '🟢', color: '#27ae60', count: 874 },
  { name: 'Rotterdam', emoji: '🔵', color: '#2980b9', count: 612 },
  { name: 'The Hague', emoji: '🟡', color: '#f1c40f', count: 528 },
  { name: 'Utrecht', emoji: '🟣', color: '#8e44ad', count: 417 },
])

function filterByCity(cityName) {
  // Implement your filter logic here
  alert(`Filter results for ${cityName}`)
}
</script>

<template>
  <section class="overview-section container my-5 py-4 px-4 px-md-5 rounded-4 shadow-lg">
    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-4 gap-3">
      <div>
        <h2 class="fw-bold mb-1 region-title">Region Snapshot</h2>
        <p class="text-secondary mb-0 region-subtitle">Randstad Overview</p>
      </div>
      <div class="d-flex align-items-center gap-2">
        <i class="fas fa-map-marker-alt text-primary"></i>
        <span class="text-muted small">Interact with a city to filter aanbod</span>
      </div>
    </div>
    <div class="row g-4">
      <div
        v-for="city in cities"
        :key="city.name"
        class="col-12 col-sm-6 col-md-3"
      >
        <div
          class="city-card d-flex flex-column align-items-center justify-content-center p-4 rounded-4 shadow-sm h-100 border-0"
          :style="{ borderTop: `4px solid ${city.color}` }"
          @click="filterByCity(city.name)"
          role="button"
          tabindex="0"
        >
          <div class="city-icon mb-2" :style="{ color: city.color }">
            <span class="fs-2">{{ city.emoji }}</span>
          </div>
          <h4 class="fw-bold mb-1 city-name">{{ city.name }}</h4>
          <p class="city-count mb-0">{{ city.count }} Items</p>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.overview-section {
  background: linear-gradient(120deg, #f8fafc 60%, #e0e7ef 100%);
  border-radius: 24px;
  box-shadow: 0 4px 24px rgba(40,76,42,0.08);
}

.region-title {
  font-family: Arial Black, Arial, sans-serif;
  color: #284C2A;
  font-size: 2rem;
}

.region-subtitle {
  font-size: 1.1rem;
  letter-spacing: 0.5px;
}

.city-card {
  background: #fff;
  transition: transform 0.18s, box-shadow 0.18s;
  cursor: pointer;
  min-height: 170px;
  box-shadow: 0 2px 12px rgba(40,76,42,0.06);
  border: none;
  outline: none;
}
.city-card:hover, .city-card:focus {
  transform: translateY(-4px) scale(1.03);
  box-shadow: 0 6px 24px rgba(40,76,42,0.13);
  background: #f8fafc;
}
.city-icon {
  font-size: 2.2rem;
}
.city-name {
  color: #22223b;
  font-size: 1.25rem;
}
.city-count {
  color: #4f8cff;
  font-weight: 600;
  font-size: 1.1rem;
}
@media (max-width: 768px) {
  .overview-section {
    padding: 1.5rem 0.5rem;
  }
  .city-card {
    min-height: 140px;
    padding: 1.2rem;
  }
}
</style>