<script setup>
import { useForm, Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    company: Object
})

let form = useForm({
    name: props.company.name,
    type: props.company.type,
    address: props.company.address,
    net_worth: props.company.net_worth,
})

const submit = () => {
    form.post('/companies')
    
}
</script>

<template layout="default">
    <!-- <div class="w-full h-screen bg-gradient-to-b from-indigo-500 p-10"> -->
        <div class="w-full bg-gray-50 rounded-lg shadow dark:border mx-auto sm:max-w-md xl:p-0 -mt-52">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900">
                    Edit Company
                </h1>
                <form class="space-y-4 md:space-y-6" @submit.prevent="submit">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Company Name</label>
                        <input v-model="form.name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <div class="text-sm text-red-500" v-if="form.errors.name">{{ form.errors.name }}</div>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Type</label>
                        <input v-model="form.type" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <div class="text-sm text-red-500" v-if="form.errors.type">{{ form.errors.type }}</div>
                    </div>
                    <div>
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                        <input v-model="form.address" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <div class="text-sm text-red-500" v-if="form.errors.address">{{ form.errors.address }}</div>
                    </div>
                    <div>
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Net Worth</label>
                        <input v-model="form.net_worth" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <div class="text-sm text-red-500" v-if="form.errors.net_worth">{{ form.errors.net_worth }}</div>
                    </div>
                    
                    <div class="flex flex-col">
                        <button type="submit" class="w-full text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2">Update Company</button>
                        <Link href="/members" class="w-full text-white bg-gray-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2">Cancel</Link>
                    </div>
                </form>
            </div>
        </div>
    <!-- </div> -->
</template>