<script setup>
defineProps({
    title: '',
    message: ''
})

defineEmits(['dismiss'])
</script>

<template>
<!-- Dialog -->
<div class="absolute top-0 left-0 flex justify-center items-start h-full min-w-full">
    <div class="bg-gray-100 px-4 py-2 rounded-lg w-1/4 min-h-auto mt-10 fixed shadow-lg text-sm">
        <h1 class="text-lg font-semibold"> Information Message</h1>
        <hr>
        <div class="py-3 flex items-center space-x-4">
            <span class="text-4xl"><i class="fa-solid fa-circle-info text-blue-600"></i></span>
            <p class="text-base font-normal">{{ message }}</p>
        </div>
        <hr>
        <button class="float-right mt-2 bg-blue-600 rounded-md p-2 px-4 text-white hover:bg-blue-500" @click="$emit('dismiss')">Dismiss</button>
    </div>
</div>
</template>