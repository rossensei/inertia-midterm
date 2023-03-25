<script setup>
import {onMounted} from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import { defineProps } from 'vue'
defineProps({
    user: ''
})

onMounted(() => {
    const menu = document.getElementById('navbar-solid-bg')
    const btn = document.getElementById('toggle-btn')

    btn.addEventListener('click', () => {
        if(menu.style.display == 'none') {
            menu.style.display = 'block'
        }else{
            menu.style.display = 'none'
        }
    })
})
</script>

<template>
    
<nav class="p-3 border-gray-200 bg-purple-700 pb-64">
    <div class="container flex flex-wrap items-center justify-between mx-auto border-b border-gray-400 pb-3">
      <a href="#" class="flex items-center">
          <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/985px-Laravel.svg.png" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" /> -->
          <p class="text-3xl mr-3 sm:h-10 text-white"><i class="fa-brands fa-laravel"></i></p>
          <!-- <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> -->
          <p v-if="user" class="text-sm font-normal text-white">Welcome, {{ user.username }}!</p>
          <p v-if="!user" class="text-sm font-normal">You are not logged in!</p>
      </a>
      <button id="toggle-btn" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
        <ul class="flex flex-col mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
          <!-- <li v-if="user">
            <Link href="/" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400">Home</Link>
          </li> -->
          <li v-if="user">
            <Link href="/members" class="block py-2 pl-3 pr-4 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fuchsia-400 md:p-0 dark:text-gray-400">Members</Link>
          </li>
          <li v-if="user">
            <Link href="/companies" class="block py-2 pl-3 pr-4 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fuchsia-400 md:p-0 dark:text-gray-400">Companies</Link>
          </li>
          <li v-if="user">
            <Link href="/logout" class="block py-2 pl-3 pr-4 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fuchsia-400 md:p-0 dark:text-gray-400">Logout</Link>
          </li>
          <li v-if="!user">
            <Link href="/signup" class="block py-2 pl-3 pr-4 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fuchsia-400 md:p-0 dark:text-gray-400">Sign up</Link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
</template>