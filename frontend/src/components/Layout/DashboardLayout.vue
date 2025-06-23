<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useUserStore } from '@/stores/userStore'

const props = defineProps({
  menu: {
    type: Array,
    required: true
  }
})

const userStore = useUserStore()
const router = useRouter()

function handleLogout() {
  userStore.logout()
  router.push('/login')
}
</script>

<template>
  <div class="dashboard-layout">
    <aside class="sidebar d-flex flex-column">
      <div class="sidebar-logo d-flex align-items-center justify-content-center mb-4">
        <i class="fas fa-leaf fa-2x text-success"></i>
      </div>
      <!-- Home Button -->
      <div class="w-100 px-3 mb-3">
        <router-link to="/" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2">
          <i class="fas fa-home"></i>
          <span class="sidebar-label d-none d-md-inline">Home</span>
        </router-link>
      </div>
      <nav class="nav flex-column align-items-center flex-grow-1 w-100">
        <router-link
          v-for="item in menu"
          :key="item.label"
          :to="item.to"
          class="nav-link sidebar-link d-flex flex-row align-items-center w-100 px-3 py-2 mb-1"
          :class="{ active: $route.path === item.to }"
        >
          <i :class="item.icon"></i>
          <span class="sidebar-label ms-3 d-none d-md-inline">{{ item.label }}</span>
        </router-link>
      </nav>
      <div class="sidebar-logout w-100 px-3 pb-3 mt-auto">
        <button
          class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2"
          @click="handleLogout"
        >
          <i class="fas fa-sign-out-alt"></i>
          <span class="sidebar-label d-none d-md-inline">Logout</span>
        </button>
      </div>
    </aside>
    <main class="dashboard-main">
      <slot />
    </main>
  </div>
</template>

<style scoped>
.dashboard-layout {
  display: flex;
  min-height: 100vh;
  background: linear-gradient(120deg, #f8fafc 60%, #e0e7ef 100%);
  position: relative;
}

.sidebar {
  position: sticky;
  top: 0;
  left: 0;
  height: 100vh;
  width: 220px;
  background: rgba(255,255,255,0.92);
  border-right: 1.5px solid #e0e7ef;
  box-shadow: 2px 0 16px 0 rgba(40,76,42,0.04);
  z-index: 20;
  padding-top: 2rem;
  padding-bottom: 0;
  display: flex;
  flex-direction: column;
  align-items: stretch;
  justify-content: flex-start;
}

.sidebar-logo {
  width: 56px;
  height: 56px;
  background: linear-gradient(135deg, #4f8cff 60%, #27ae60 100%);
  border-radius: 16px;
  box-shadow: 0 2px 12px rgba(79,140,255,0.10);
  margin: 0 auto 2rem auto;
}

.sidebar-link {
  color: #284C2A;
  font-weight: 500;
  border-radius: 10px;
  font-size: 1.08rem;
  transition: background 0.15s, color 0.15s;
  height: 44px;
  display: flex;
  align-items: center;
}
.sidebar-link.active, .sidebar-link:hover {
  background: linear-gradient(90deg, #e0e7ef 60%, #4f8cff22 100%);
  color: #4f8cff;
}
.sidebar-label {
  transition: opacity 0.2s;
  font-size: 1.05rem;
}

.sidebar-logout {
  margin-top: auto;
}

.dashboard-main {
  flex: 1 1 0;
  min-height: 100vh;
  background: rgba(255,255,255,0.82);
  border-radius: 32px;
  margin: 2.5rem;
  box-shadow: 0 4px 24px rgba(40,76,42,0.08);
  padding: 2.5rem;
  overflow: auto;
  display: flex;
  flex-direction: column;
}

/* Remove hamburger and sidebar-close styles */
.sidebar-toggle,
.sidebar-closed {
  display: none !important;
}

@media (max-width: 991.98px) {
  .sidebar {
    width: 100vw;
    min-width: 0;
    border-radius: 0;
    position: relative;
    box-shadow: none;
  }
  .dashboard-main {
    margin: 1rem 0.5rem 1rem 0.5rem;
    border-radius: 16px;
    padding: 1rem 0.5rem;
  }
}

@media (max-width: 575.98px) {
  .dashboard-main {
    margin: 0;
    border-radius: 0;
    padding: 0.5rem 0.2rem;
  }
}
</style>