<script setup>
import { ref } from 'vue'
import UserForm from './UserForm.vue'

const users = [
  { name: "Alice", role: "Manager", joined: "2023-11-01" },
  { name: "Bob", role: "Supplier", joined: "2024-01-15" },
  { name: "Charlie", role: "Buyer", joined: "2024-03-22" }
]

const showForm = ref(false)
const formMode = ref('add') // 'add' or 'edit'
const selectedUser = ref(null)

function openAddForm() {
  formMode.value = 'add'
  selectedUser.value = null
  showForm.value = true
}

function openEditForm(item) {
  formMode.value = 'edit'
  selectedUser.value = { ...item }
  showForm.value = true
}

function handleFormSubmit(user) {
  if (formMode.value === 'add') {
    items.value.push(user)
  } else if (formMode.value === 'edit') {
    const idx = items.value.findIndex(i => i.name === selecteduser.value.name)
    if (idx !== -1) items.value[idx] = user
  }
  showForm.value = false
}

function handleDelete(item) {
  items.value = items.value.filter(i => i.name !== item.name)
}
</script>

<template>
  <!-- Users Section -->
  <section>
    <div class="section-header mb-3 d-flex align-items-center justify-content-between">
      <div class="section-header mb-3 d-flex align-items-center">
        <i class="fas fa-users section-icon text-primary"></i>
        <h4 class="fw-semibold mb-0 ms-2">Users</h4>
      </div>
      <button class="btn btn-primary" @click="openAddForm">
        <i class="fas fa-plus"></i> Add User
      </button>
    </div>
    <div class="card shadow-lg border-0 rounded-4">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Joined</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user.name">
              <td class="fw-semibold">{{ user.name }}</td>
              <td>
                <span class="badge bg-gradient-secondary px-3 py-2">{{ user.role }}</span>
              </td>
              <td>{{ user.joined }}</td>
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
        <UserForm :mode="formMode" :user="selectedUser" @submit="handleFormSubmit" @cancel="showForm = false" />
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

.bg-gradient-secondary {
  background: linear-gradient(90deg, #848048 0%, #4f8cff 100%) !important;
  color: #fff !important;
}

.modal-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.3);
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
  box-shadow: 0 2px 24px rgba(0, 0, 0, 0.15);
}
</style>