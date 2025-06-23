<template>
  <form @submit.prevent="onSubmit">
    <div class="mb-3">
      <label class="form-label">First Name</label>
      <input v-model="localUser.firstName" type="text" class="form-control" required placeholder="Enter user's first name" />
    </div>
    <div class="mb-3">
      <label class="form-label">Last Name</label>
      <input v-model="localUser.lastName" type="text" class="form-control" required placeholder="Enter user's last name" />
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input v-model="localUser.email" type="email" class="form-control" required placeholder="Enter user's email" />
    </div>
    <div class="mb-3">
      <label class="form-label">Phone number</label>
      <input v-model="localUser.phoneNumber" type="tel" class="form-control" required placeholder="Enter user's phone number" />
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input v-model="localUser.password" type="password" class="form-control" :required="mode === 'add'" placeholder="Enter password" autocomplete="new-password" />
      <small v-if="mode === 'edit'" class="text-muted">Leave blank to keep current password</small>
    </div>
    <div class="mb-3">
      <label class="form-label">Status</label>
      <select v-model="localUser.status" class="form-select" required>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Role</label>
      <select v-model="localUser.role" class="form-select" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
    </div>
    <div class="d-flex justify-content-end gap-2">
      <button type="button" class="btn btn-secondary" @click="$emit('cancel')">
        Cancel
      </button>
      <button type="submit" class="btn btn-primary">
        {{ mode === 'edit' ? 'Update' : 'Add' }} User
      </button>
    </div>
  </form>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useUserStore } from '@/stores/userStore'

const props = defineProps({
  mode: { type: String, default: 'add' },
  user: { type: Object, default: null }
})

const emit = defineEmits(['saved', 'cancel'])
const userStore = useUserStore()

const localUser = ref({
  firstName: '',
  lastName: '',
  role: 'user',
  email: '',
  password: '',
  phoneNumber: '',
  status: 'active',
})

watch(
  () => props.user,
  (newVal) => {
    if (newVal) {
      localUser.value = { ...localUser.value, ...newVal }
    } else {
      localUser.value = {
        firstName: '',
        lastName: '',
        role: 'user',
        email: '',
        password: '',
        phoneNumber: '',
        status: 'active'
      }
    }
  },
  { immediate: true }
)

function onSubmit() {
  emit('saved', { ...localUser.value })
}
</script>