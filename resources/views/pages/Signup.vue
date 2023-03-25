<script setup>
import {useForm, Link} from '@inertiajs/inertia-vue3'
let form = useForm({
    'username': '',
    'email': '',
    'password': ''
})
let submit = () => {
    form.post('/signup')

    form.username = ''
    form.email = ''
    form.password = ''
}
</script>

<template layout="default">
    <div class="w-1/2 bg-gray-50 rounded-lg shadow dark:border mx-auto md:mt-0 sm:max-w-md xl:p-0">
        <div v-if="$page.props.flash.message" class="border border-green-400 py-6 rounded mb-4 bg-green-200">
            <p class="text-center">{{ $page.props.flash.message }}</p>
        </div>
    </div>
    <div class="w-1/2 bg-gray-50 rounded-lg shadow dark:border mx-auto md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            
            <h1 class="text-xl font-bold text-center leading-tight tracking-tight text-gray-900">
                Sign Up
            </h1>
            <div class="text-sm text-red-500 text-center" v-if="form.errors.authentication">{{ form.errors.authentication }}</div>
            <form class="space-y-4 md:space-y-6" @submit.prevent="submit">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                    <input v-model="form.username" type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.username">{{ form.errors.username }}</div>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input v-model="form.email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input v-model="form.password" type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.password">{{ form.errors.password }}</div>
                </div>
                <button type="submit" class="w-full text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign up</button>
            </form>
            <p class="text-sm font-light text-gray-500 ">
              Already have an account? <Link href="/" class="font-medium text-primary-600 hover:underline hover:text-blue-600">Log in</Link>
          </p>
        </div>
    </div>
</template>