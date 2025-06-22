<script setup>
import { ref } from 'vue'
import OrderDetails from './OrderDetails.vue'

const orders = [
    { id: 101, item: "Steel Beams", user: "Alice", date: "2024-06-01", status: "Completed" },
    { id: 102, item: "Wood Panels", user: "Bob", date: "2024-06-10", status: "Pending" },
    { id: 103, item: "Copper Wires", user: "Charlie", date: "2024-06-15", status: "Completed" }
]

const showDetails = ref(false)
const selectedOrder = ref(null)

function openOrderDetails(order) {
    selectedOrder.value = order
    showDetails.value = true
}
</script>

<template>
    <section class="mb-5">
        <div class="section-header mb-3 d-flex align-items-center">
            <i class="fas fa-shopping-cart section-icon text-primary"></i>
            <h4 class="fw-semibold mb-0 ms-2">Orders</h4>
        </div>
        <div class="card shadow-lg border-0 rounded-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Item</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="order in orders" :key="order.id" @click="openOrderDetails(order)"
                            style="cursor:pointer;">
                            <td class="fw-semibold">#{{ order.id }}</td>
                            <td>{{ order.item }}</td>
                            <td>{{ order.user }}</td>
                            <td>{{ order.date }}</td>
                            <td>
                                <span
                                    :class="order.status === 'Completed' ? 'badge bg-success-soft text-success' : 'badge bg-warning-soft text-warning'">
                                    {{ order.status }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <OrderDetails v-if="showDetails && selectedOrder" :order="selectedOrder" @close="showDetails = false" />
    </section>
</template>

<style scoped>
.section-icon {
    font-size: 1.6rem;
    background: #e0e7ef;
    border-radius: 12px;
    padding: 0.5rem;
    box-shadow: 0 2px 8px rgba(40, 76, 42, 0.07);
}

.bg-warning-soft {
    background: #fff7e6 !important;
}

.bg-success-soft {
    background: #e6f9ed !important;
}
</style>