<script setup>
const items = [
    { name: "Steel Beams", quantity: 40, status: "Active" },
    { name: "Wood Panels", quantity: 22, status: "Active" },
    { name: "Copper Wires", quantity: 66, status: "Inactive" }
]
const orders = [
    { id: 101, item: "Steel Beams", user: "Alice", date: "2024-06-01", status: "Completed" },
    { id: 102, item: "Wood Panels", user: "Bob", date: "2024-06-10", status: "Pending" },
    { id: 103, item: "Copper Wires", user: "Charlie", date: "2024-06-15", status: "Completed" }
]
const users = [
  { name: "Alice", role: "Manager", joined: "2023-11-01" },
  { name: "Bob", role: "Supplier", joined: "2024-01-15" },
  { name: "Charlie", role: "Buyer", joined: "2024-03-22" }
]
// Overview stats
const stats = [
  {
    title: "Items & Materials",
    icon: "fas fa-boxes",
    value: items.length,
    desc: "Tracked types"
  },
  {
    title: "Total Quantity",
    icon: "fas fa-cubes",
    value: items.reduce((sum, i) => sum + i.quantity, 0),
    desc: "All items in stock"
  },
  {
    title: "Orders",
    icon: "fas fa-shopping-cart",
    value: orders.length,
    desc: "Orders placed"
  },
  {
    title: "Users",
    icon: "fas fa-users",
    value: users.length,
    desc: "Registered users"
  }
]
</script>

<template>
  <div class="manager-dashboard-bg min-vh-100 py-4 px-2 px-md-4">
    <h2 class="fw-bold mb-5 text-gradient">Manager Dashboard Overview</h2>
    <div class="row g-4 mb-5">
      <div v-for="stat in stats" :key="stat.title" class="col-12 col-sm-6 col-lg-3">
        <div class="card stat-card shadow-sm border-0 rounded-4 text-center py-4 h-100">
          <div class="mb-3">
            <i :class="stat.icon + ' fa-2x text-primary'"></i>
          </div>
          <div class="fw-bold display-6 mb-1">{{ stat.value }}</div>
          <div class="text-muted mb-1">{{ stat.title }}</div>
          <small class="text-secondary">{{ stat.desc }}</small>
        </div>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-12 col-md-4">
        <div class="card shadow border-0 rounded-4 h-100 p-4 d-flex flex-column align-items-center justify-content-center">
          <i class="fas fa-boxes fa-lg text-primary mb-2"></i>
          <div class="fw-semibold mb-1">Most Stocked Item</div>
          <div class="fs-5">
            {{
              items.reduce((max, i) => i.quantity > max.quantity ? i : max, items[0]).name
            }}
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card shadow border-0 rounded-4 h-100 p-4 d-flex flex-column align-items-center justify-content-center">
          <i class="fas fa-shopping-cart fa-lg text-primary mb-2"></i>
          <div class="fw-semibold mb-1">Latest Order</div>
          <div class="fs-6 text-muted mb-1">
            #{{ orders[orders.length-1].id }} &mdash; {{ orders[orders.length-1].item }}
          </div>
          <div class="small text-secondary">
            by {{ orders[orders.length-1].user }} on {{ orders[orders.length-1].date }}
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card shadow border-0 rounded-4 h-100 p-4 d-flex flex-column align-items-center justify-content-center">
          <i class="fas fa-user-plus fa-lg text-primary mb-2"></i>
          <div class="fw-semibold mb-1">Newest User</div>
          <div class="fs-5">{{ users[users.length-1].name }}</div>
          <div class="small text-secondary">{{ users[users.length-1].role }}</div>
        </div>
      </div>
    </div>
    </div>
</template>

<style scoped>
.manager-dashboard-bg {
  background: linear-gradient(120deg, #f8fafc 60%, #e0e7ef 100%);
}

.text-gradient {
  background: linear-gradient(90deg, #4f8cff 0%, #27ae60 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.stat-card {
  background: rgba(255,255,255,0.97);
  border-radius: 1.5rem !important;
  transition: box-shadow 0.18s;
}

.stat-card:hover {
  box-shadow: 0 8px 32px rgba(40,76,42,0.13);
}

.card {
  border-radius: 1.5rem !important;
  background: rgba(255,255,255,0.95);
  border: none;
}










</style>