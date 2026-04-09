<template>
  <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-xl shadow w-100">

      <div class="text-blue-500 text-2xl mb-4 text-center">
        <h1>Login an account</h1>
      </div>

      <div class="flex flex-col gap-4 mt-2">
        <input v-model="email" class="p-2 border border-gray-300 rounded-md w-full" type="email"
          placeholder="Enter email" />

        <input v-model="password" class="p-2 border border-gray-300 rounded-md w-full" type="password"
          placeholder="Enter password" />
      </div>

      <div class="flex justify-center mt-4">
        <button class="bg-blue-500 text-white p-2 rounded-md" @click="handleLogin">
          Login
        </button>
      </div>

    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import http from '@/services/http'

const email = ref('')
const password = ref('')

const handleLogin = async () => {
  try {
    const res = await http.post('/login', {
      email: email.value,
      password: password.value
    })

    alert(res.data.message)

    window.location.href = '/homePage'

  } catch (error) {
    console.log('ERROR RESPONSE:', error.response?.data)
    alert(error.response?.data?.message || 'Login failed')
  }
}
</script>