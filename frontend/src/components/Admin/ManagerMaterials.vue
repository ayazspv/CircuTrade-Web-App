<script setup>
import { ref } from 'vue'
import MaterialForm from './MaterialForm.vue'

const items = ref([
    { name: "Steel Beams", quantity: 40, status: "Active" },
    { name: "Wood Panels", quantity: 22, status: "Active" },
    { name: "Copper Wires", quantity: 66, status: "Inactive" }
])

const showForm = ref(false)
const formMode = ref('add') // 'add' or 'edit'
const selectedMaterial = ref(null)

function openAddForm() {
    formMode.value = 'add'
    selectedMaterial.value = null
    showForm.value = true
}

function openEditForm(item) {
    formMode.value = 'edit'
    selectedMaterial.value = { ...item }
    showForm.value = true
}

function handleFormSubmit(material) {
    if (formMode.value === 'add') {
        items.value.push(material)
    } else if (formMode.value === 'edit') {
        const idx = items.value.findIndex(i => i.name === selectedMaterial.value.name)
        if (idx !== -1) items.value[idx] = material
    }
    showForm.value = false
}

function handleDelete(item) {
    items.value = items.value.filter(i => i.name !== item.name)
}
</script>
<template>
    <!-- Items & Materials Section -->
    <section class="mb-5">
        <div class="section-header mb-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fas fa-boxes section-icon text-primary"></i>
                <h4 class="fw-semibold mb-0 ms-2">Items & Materials</h4>
            </div>
            <button class="btn btn-primary" @click="openAddForm">
                <i class="fas fa-plus"></i> Add Material
            </button>
        </div>
        <div class="card shadow-lg border-0 rounded-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in items" :key="item.name">
                            <td class="fw-semibold">{{ item.name }}</td>
                            <td>
                                <span class="badge bg-gradient-primary fs-6 px-3 py-2">{{ item.quantity }}</span>
                            </td>
                            <td>
                                <span
                                    :class="item.status === 'Active' ? 'badge bg-success-soft text-success' : 'badge bg-secondary-soft text-secondary'">
                                    {{ item.status }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-secondary me-2" @click="openEditForm(item)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" @click="handleDelete(item)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Material Form Modal -->
        <div v-if="showForm" class="modal-backdrop">
            <div class="modal-content container w-50">
                <MaterialForm
                    :mode="formMode"
                    :material="selectedMaterial"
                    @submit="handleFormSubmit"
                    @cancel="showForm = false"
                />
            </div>
        </div>
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

.bg-gradient-primary {
    background: linear-gradient(90deg, #4f8cff 0%, #27ae60 100%) !important;
    color: #fff !important;
}

.bg-success-soft {
    background: #e6f9ed !important;
}

.bg-secondary-soft {
    background: #f0f1f3 !important;
}

/* Simple modal styles */
.modal-backdrop {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1050;
}
.modal-content {
    background: #fff;
    border-radius: 1rem;
    padding: 2rem;
    min-width: 350px;
    box-shadow: 0 2px 24px rgba(0,0,0,0.15);
}
</style>