<template>
  <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-xl shadow w-100">

      <h1 class="text-blue-500 text-2xl mb-4 text-center">
        Register a new account
      </h1>

      <div class="flex flex-col gap-4 mt-2">
        <input v-model="name" class="p-2 border rounded-md" placeholder="Enter name" />
        <input v-model="email" class="p-2 border rounded-md" placeholder="Enter email" />
        <input v-model="password" type="password" class="p-2 border rounded-md" placeholder="Enter password" />
        <input v-model="confirmPassword" type="password" class="p-2 border rounded-md" placeholder="Confirm password" />
      </div>

      <div class="flex justify-center mt-4">
        <button class="bg-blue-500 text-white p-2 rounded-md" @click="handleRegister">
          Register
        </button>
      </div>

    </div>
  </div>
</template>
<script setup lang="ts">
import { ref } from 'vue'
import http from '@/services/http'

const name = ref('')
const email = ref('')
const password = ref('')
const confirmPassword = ref('')

const handleRegister = async () => {
  try {
    const res = await http.post('/register', {
      name: name.value,
      email: email.value,
      password: password.value,
      password_confirmation: confirmPassword.value
    })

    alert(res.data.message)

    window.location.href = '/login'

  } catch (error) {
  console.log('ERROR RESPONSE:', error.response?.data)
}
}
</script>