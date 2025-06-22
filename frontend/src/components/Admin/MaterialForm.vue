<template>
  <form @submit.prevent="onSubmit" class="">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input
        v-model="localMaterial.name"
        type="text"
        class="form-control"
        required
        placeholder="Enter material name"
      />
    </div>
    <div class="mb-3">
      <label class="form-label">Quantity</label>
      <input
        v-model.number="localMaterial.quantity"
        type="number"
        class="form-control"
        min="0"
        required
        placeholder="Enter quantity"
      />
    </div>
    <div class="mb-3">
      <label class="form-label">Status</label>
      <select v-model="localMaterial.status" class="form-select" required>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
      </select>
    </div>
    <div class="d-flex justify-content-end gap-2">
      <button type="button" class="btn btn-secondary" @click="$emit('cancel')">
        Cancel
      </button>
      <button type="submit" class="btn btn-primary">
        {{ mode === 'edit' ? 'Update' : 'Add' }} Material
      </button>
    </div>
  </form>
</template>

<script setup>
import { ref, watch, toRefs } from 'vue'

const props = defineProps({
  mode: { type: String, default: 'add' }, // 'add' or 'edit'
  material: { type: Object, default: null }
})

const emit = defineEmits(['submit', 'cancel'])

const localMaterial = ref({
  name: '',
  quantity: 0,
  status: 'Active'
})

// Watch for changes in the material prop (for edit mode)
watch(
  () => props.material,
  (newVal) => {
    if (newVal) {
      localMaterial.value = { ...newVal }
    } else {
      localMaterial.value = { name: '', quantity: 0, status: 'Active' }
    }
  },
  { immediate: true }
)

function onSubmit() {
  emit('submit', { ...localMaterial.value })
}
</script>