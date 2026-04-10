<template>
    <div class="px-[360px] py-2">
        <div class="mb-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold">Tạo bài viết</h1>
            <X class="h-6 w-6" />
        </div>

        <div>
            <div class="flex">
                <img
                    src="../../../../public/images/image-personal.png"
                    alt="avtar"
                    class="h-10 w-10 rounded-full border-2 border-gray-200"
                />
                <p class="ml-4"><User></User>Thanh</p>
            </div>
            <div>
                <textarea
                    v-model="description"
                    class="h-[400px] w-full rounded-sm border-2 border-gray-200 p-2"
                    placeholder="Enter post description..."
                >
                </textarea>
            </div>
            <div
                class="mt-4 flex items-center justify-between rounded-xl border-2 border-gray-200 p-4"
            >
                <p>Add</p>
                <ul>
                    <li class="flex gap-4">
                        <CameraIcon></CameraIcon>
                        <Image></Image>
                        <Video></Video>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-4 rounded-lg bg-[#F15922] px-4 py-2 text-white">
            <button class="w-full text-center" @click="handleSubmit">
                Submit
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import {
    X,
    User,
    CameraIcon,
    Image,
    Video,
} from 'lucide-vue-next';

import { ref } from 'vue';
import http from '@/services/http';
const description = ref('');

const handleSubmit = async () => {
    try {
        const res = await http.post('/createPost', {
            description: description.value,
            media_url: 'https://example.com/media.jpg',
        });
        console.log('Submit clicked');
    } catch (error) {
        console.log('ERROR RESPONSE:', error.response?.data);
        alert(error.response?.data?.message || 'Failed to create post');
    }
};
</script>
