<template>
    <div>
        <div class="px-[360px]  py-2 ">
            <div class="flex justify-between items-center border-gray-200 border-2 p-4 rounded-xl bg-whiteshadow hover:shadow-lg transition">
                <div class="flex ">
                    <img src="../../../../public/images/image-personal.png" alt="avtar"
                        class="w-10 h-10 rounded-full border-2 border-gray-200">
                    <p class="ml-4 p-3 bg-gray-100 rounded-xl">Name Author ơi, bạn đang nghĩ gì?</p>
                </div>
                <div class="flex  justify-between  items-center  gap-4">
                    <CameraIcon></CameraIcon>
                    <Image></Image>
                    <Video></Video>
                </div>
            </div>

        </div>
    </div>
    <div>
        <header>
            <div class="flex justify-between items-center px-[360px] py-2">
                <div class="flex">
                    <img src="../../../../public/images/image-personal.png" alt="avtar"
                        class="w-10 h-10 rounded-full border-2 border-gray-200">
                    <div class="ml-4 ">
                        <h2>Title</h2>
                        <p>Author name <span class="ml-2 text-gray-500 text-sm">Time</span></p>

                    </div>
                </div>
                <div>
                    <button>X</button>
                </div>
            </div>
        </header>
        <content>
            <div class="flex flex-col justify-start px-[360px] py-2 ">
                <p>Description</p>
                <p class="w-[400px]"><img src="../../../../public/images/image-personal.png" alt=""></p>
            </div>

        </content>
        <footer>
            <div>
                <div class="flex justify-between items-center px-[360px] py-2">
                    Các icon like, comment, share
                </div>
                <div class="flex justify-between items-center px-[360px] py-2">

                    <button class="flex items-center gap-2">
                        <ThumbsUp class="w-5 h-5" />
                        <span>Like</span>
                    </button>

                    <button class="flex items-center gap-2">
                        <MessageCircle class="w-5 h-5" />
                        <span>Comment</span>
                    </button>

                    <button class="flex items-center gap-2">
                        <Share2 class="w-5 h-5" />
                        <span>Share</span>
                    </button>

                </div>
            </div>
        </footer>
    </div>
</template>

<script setup lang="ts">
import { ThumbsUp, MessageCircle, Share2, Camera, CameraIcon, Image, Video } from 'lucide-vue-next'
</script>