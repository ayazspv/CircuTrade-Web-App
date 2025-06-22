<template>
    <form @submit.prevent="onSubmit" class="">
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input v-model="localUser.firstName" type="text" class="form-control" required
                placeholder="Enter user's first name" />
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input v-model.number="localUser.lastName" type="number" class="form-control" min="0" required
                placeholder="Enter user's last name" />
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input v-model="localUser.email" type="email" class="form-control" required
                placeholder="Enter user's email" />
        </div>
        <div class="mb-3">
            <label class="form-label">Phone number</label>
            <input v-model="localUser.phoneNumber" type="tel" class="form-control" required
                placeholder="Enter user's phone number" />
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input v-model="localUser.address" type="text" class="form-control" required
                placeholder="Enter user's address" />
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select v-model="localUser.status" class="form-select" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
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
import { ref, watch, toRefs } from 'vue'

const props = defineProps({
    mode: { type: String, default: 'add' }, // 'add' or 'edit'
    user: { type: Object, default: null }
})

const emit = defineEmits(['submit', 'cancel'])

const localUser = ref({
    firstName: '',
    lastName: '',
    email: '',
    phoneNumber: 0,
    address: '',
    status: 'Active'
})

// Watch for changes in the material prop (for edit mode)
watch(
    () => props.user,
    (newVal) => {
        if (newVal) {
            localUser.value = { ...newVal }
        } else {
            localUser.value = {
                firstName: '',
                lastName: '',
                email: '',
                phoneNumber: 0,
                address: '',
                status: 'Active'
            }
        }
    },
    { immediate: true }
)

function onSubmit() {
    emit('submit', { ...localUser.value })
}
</script>