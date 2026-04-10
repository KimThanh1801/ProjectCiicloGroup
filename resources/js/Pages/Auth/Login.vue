<template>
    <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div class="w-100 rounded-xl bg-white p-6 shadow">
            <div class="mb-4 text-center text-2xl text-blue-500">
                <h1>Login an account</h1>
            </div>

            <div class="mt-2 flex flex-col gap-4">
                <input
                    v-model="email"
                    class="w-full rounded-md border border-gray-300 p-2"
                    type="email"
                    placeholder="Enter email"
                />

                <input
                    v-model="password"
                    class="w-full rounded-md border border-gray-300 p-2"
                    type="password"
                    placeholder="Enter password"
                />
            </div>

            <div class="mt-4 flex justify-center">
                <button
                    class="rounded-md bg-blue-500 p-2 text-white"
                    @click="handleLogin"
                >
                    Login
                </button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import http from '@/services/http';

const email = ref('');
const password = ref('');

const handleLogin = async () => {
    try {
        const res = await http.post('/login', {
            email: email.value,
            password: password.value,
        });

        alert(res.data.message);

        window.location.href = '/';
    } catch (error) {
        console.log('ERROR RESPONSE:', error.response?.data);
        alert(error.response?.data?.message || 'Login failed');
    }
};
</script>
