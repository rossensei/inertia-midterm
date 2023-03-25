<script setup>
import {Link} from '@inertiajs/inertia-vue3'

defineProps({
    'companies': Array
})

const closeNotif = () => {
    const toast = document.getElementById('toast-bottom-left');
    toast.style.opacity = '0'
    toast.style.transition = '.5s all ease'
}
</script>

<template layout="default">
    <div class="container-md mx-auto p-8 w-3/4 -mt-56">
        <div class="flex justify-between items-center mb-3">
            <h1 class="text-3xl font-semibold text-white">Companies</h1>
            <Link href="/companies/create" class="text-white rounded-lg border-2 border-solid hover:border-blue-500 hover:bg-gray-50 hover:text-gray-700 px-3 py-1">+ Add Company</Link>
        </div>
        <table class="w-full text-sm text-left text-gray 500">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Company name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Net Worth
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        ...
                    </th>
                </tr>
            </thead>
            <tbody v-for="company of companies" :key="company.id">
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        {{ company.id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ company.name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ company.type }}
                    </td>
                    <td class="px-6 py-4">
                        {{ company.address }}
                    </td>
                    <td class="px-6 py-4">
                        {{ company.net_worth }}
                    </td>
                    <td class="px-6 py-4">
                        <Link :href="'/companies/edit/' + company.id" class=""><i class="fa-solid fa-pen"></i></Link>
                    </td>
                </tr>
            </tbody>
        </table>

        <div v-if="$page.props.flash.message" id="toast-bottom-left" class="transition-ease fixed flex justify-between items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-green-50 rounded-md shadow bottom-14 left-14 border-l-8 border border-green-400" role="alert">
            <div class="flex items-center">
                <a href="#" class="text-green-500"><i class="fa-solid fa-circle-check"></i></a>
                <div class="pl-4 border-l-2 border-green-600 text-green-700 text-sm font-normal ml-4">{{ $page.props.flash.message }}</div>
            </div>

            <button id="close-button" @click="closeNotif()"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>
</template>