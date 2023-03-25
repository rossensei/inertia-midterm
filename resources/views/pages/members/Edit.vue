<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    member: Object,
    companies: Array
})

let form = useForm({
    last_name: props.member.last_name,
    first_name: props.member.first_name,
    designation: props.member.designation,
    company_id: props.member.company_id,
})

const submit = () => {
    if(props.member.last_name == form.last_name && props.member.first_name == form.first_name && props.member.designation == form.designation && props.member.company_id == form.company_id){
        alert("You've made no changes!")
    } else {
        form.put('/members/' + props.member.id)
    }
}
</script>

<template layout="default">
    <div class="w-full bg-gray-50 rounded-lg shadow dark:border mx-auto md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900">
                Edit Member
            </h1>
            <form class="space-y-4 md:space-y-6" @submit.prevent="submit">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                    <input v-model="form.last_name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.last_name">{{ form.errors.last_name }}</div>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                    <input v-model="form.first_name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.first_name">{{ form.errors.first_name }}</div>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Designation</label>
                    <input v-model="form.designation" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.designation">{{ form.errors.designation }}</div>
                </div>
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Company</label>
                    <select v-model="form.company_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Choose company</option>
                    <option v-for="company in companies" :key="company.id" :value="company.id">{{ company.name }}</option>
                    
                    </select>
                    <div class="text-sm text-red-500 italic" v-if="form.errors.company_id">The in-charge field is required</div>
                </div>
                <button type="submit" class="w-full text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update information</button>
            </form>
        </div>
    </div>
</template>