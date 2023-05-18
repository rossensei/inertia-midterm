<template>
    <!-- <div class="opacity-75 absolute top-0 left-0 min-h-full min-w-full"></div> -->

    <!-- Dialog -->
    <div class="z-10 absolute top-0 left-0 flex justify-center items-start h-full min-w-full">
        <div class="bg-gray-100 p-4 rounded-lg w-1/5 min-h-auto mt-10 fixed shadow-lg text-sm">
            <h1 class="text-base">{{ title }}</h1>
            <hr>
            <div class="mt-4 text-center text-sm">
                {{ message }}
            </div>
            <div class="flex flex-row-reverse mt-5">
                <div class="space-x-2">
                    <button class="bg-gray-600 rounded-md p-2 text-white hover:bg-gray-500" @click="$emit('cancel')">Cancel</button>
                    <button class="bg-blue-600 rounded-md p-2 text-white hover:bg-blue-500" @click="$emit('confirm')">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    title: '',
    message: ''
})

defineEmits(['cancel', 'confirm'])
</script>