<script setup>
import { ref } from 'vue'

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
        <div class="card h-100 border-0 shadow-sm position-relative overflow-hidden rounded-4 material-card">
          <div class="ratio ratio-16x9 rounded-top-4 bg-light">
            <img :src="item.image" :alt="item.title" class="card-img-top object-fit-cover" />
          </div>
          <div class="card-body d-flex flex-column p-3">
            <h5 class="fw-bold mb-1 material-title">{{ item.title }}</h5>
            <div class="d-flex align-items-center mb-2">
              <i class="fas fa-map-marker-alt text-primary me-1"></i>
              <span class="text-muted small">{{ item.city }}</span>
            </div>
            <div class="mt-auto d-flex align-items-center justify-content-between">
              <span class="badge bg-light text-success fs-6 px-3 py-2 price-tag">€{{ item.price }}</span>
              <button class="btn btn-primary btn-sm rounded-pill px-3 btn-view stretched-link" tabindex="0">
                View <i class="fas fa-arrow-right ms-1"></i>
              </button>
            </div>
          </div>
        </div>
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
.material-card {
  transition: transform 0.18s, box-shadow 0.18s;
  cursor: pointer;
}
.material-card:hover, .material-card:focus-within {
  transform: translateY(-6px) scale(1.03);
  box-shadow: 0 8px 32px rgba(40,76,42,0.13);
}
.card-img-top {
  transition: transform 0.4s cubic-bezier(.4,2,.3,1), filter 0.4s cubic-bezier(.4,2,.3,1);
  border-top-left-radius: 1.2rem;
  border-top-right-radius: 1.2rem;
  height: 100%;
  width: 100%;
  object-fit: cover;
}
.material-card:hover .card-img-top,
.material-card:focus-within .card-img-top {
  transform: scale(1.08) rotate(-2deg);
  filter: brightness(0.95) blur(1px);
}
.material-title {
  font-size: 1.15rem;
  color: #22223b;
}
.price-tag {
  background: #e0e7ef !important;
  color: #284C2A !important;
  font-weight: 600;
  font-size: 1.1rem;
  border-radius: 1em;
  box-shadow: 0 2px 8px rgba(40,76,42,0.07);
}
.btn-view {
  font-weight: 600;
  font-size: 1rem;
  transition: background 0.18s, color 0.18s, box-shadow 0.18s;
  box-shadow: 0 2px 8px rgba(79,140,255,0.08);
  z-index: 2;
  position: relative;
}
.btn-view:hover, .btn-view:focus {
  background: #2563eb !important;
  color: #fff !important;
  box-shadow: 0 4px 16px rgba(79,140,255,0.15);
}
@media (max-width: 768px) {
  .card-img-top {
    min-height: 120px;
  }
}
</style>