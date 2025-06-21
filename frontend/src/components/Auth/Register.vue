<script setup>
import { ref } from 'vue'

const name = ref('')
const email = ref('')
const password = ref('')
const confirmPassword = ref('')

function register() {
    if (password.value !== confirmPassword.value) {
        alert('Passwords do not match!')
        return
    }
    // Add your registration logic here
    alert(`Name: ${name.value}\nEmail: ${email.value}\nPassword: ${password.value}`)
}
</script>

<template>
    <div class="text-center mb-4">
        <svg width="48" height="48" viewBox="0 0 48 48">
            <circle cx="24" cy="24" r="22" fill="#4f8cff" opacity="0.15" />
            <text x="50%" y="55%" text-anchor="middle" fill="#4f8cff" font-size="2rem"
                font-family="Segoe UI, Arial, sans-serif" font-weight="bold">🔒</text>
        </svg>
        <h2 class="fw-bold mt-2 mb-1">Welcome!</h2>
        <p class="text-secondary mb-0">Let's make you an account!</p>
    </div>
    <form @submit.prevent="register">
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Full Name</label>
            <input v-model="name" type="text" class="form-control" id="name" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email address</label>
            <input v-model="email" type="email" class="form-control" id="email" placeholder="Enter email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input v-model="password" type="password" class="form-control" id="password" placeholder="Password"
                required>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label fw-semibold">Confirm Password</label>
            <input v-model="confirmPassword" type="password" class="form-control" id="confirmPassword"
                placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold rounded-pill">Register</button>
    </form>
    <div class="text-center mt-3">
        <span class="text-secondary">Already have an account?</span>
        <a href="/login" class="text-primary fw-semibold text-decoration-none ms-1">Sign in</a>
    </div>
</template>

<style scoped>
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}
</style>