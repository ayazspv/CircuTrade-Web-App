import { defineStore } from 'pinia'
import { ref, watch } from 'vue'

export const useCartStore = defineStore('cart', () => {
  // Load cart from sessionStorage if available
  const items = ref(JSON.parse(sessionStorage.getItem('cartItems') || '[]'))

  function addToCart(material) {
    const existing = items.value.find(i => i.id === material.id)
    if (existing) {
      existing.quantity += 1
    } else {
      items.value.push({ ...material, quantity: 1 })
    }
  }

  function removeFromCart(id) {
    items.value = items.value.filter(i => i.id !== id)
  }

  function clearCart() {
    items.value = []
  }

  // Watch for changes and update sessionStorage
  watch(items, (newItems) => {
    sessionStorage.setItem('cartItems', JSON.stringify(newItems))
  }, { deep: true })

  return { items, addToCart, removeFromCart, clearCart }
})