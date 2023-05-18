<script setup>
import {Link} from '@inertiajs/inertia-vue3'
import { onMounted } from 'vue'
import Pagination from '../../components/Pagination.vue'

defineProps({
    'members': Object
})

const closeNotif = () => {
    const toast = document.getElementById('toast-bottom-left');
    toast.style.opacity = '0'
    toast.style.transition = '.5s all ease'
}
</script>

<template layout="default">
    <!-- <div class="absolute w-full inset-x-0 top-0 bg-purple-700 p-24 mix-blend-overlay">
        
    </div> -->

    <div class="container-md mx-auto p-8 w-3/4 -mt-56">
        <div class="flex justify-between items-center mb-3">
            <h1 class="text-3xl font-semibold text-white">Members</h1>
            <Link href="/members/create" class="text-white rounded-lg border-2 border-solid hover:border-blue-500 hover:bg-gray-50 hover:text-gray-700 px-3 py-1"> + Add Member</Link>
        </div>
        
        <table class="w-full text-sm text-left text-gray 500">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        First Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Designation
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Company
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        ...
                    </th>
                </tr>
            </thead>
            <tbody v-for="member of members.data" :key="member.id">
                <tr class="bg-white border-b hover:bg-gray-100">
                    <td class="px-6 py-4">
                        {{ member.id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ member.last_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ member.first_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ member.designation }}
                    </td>
                    <td class="px-6 py-4">
                        {{ member.company.name }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <Link :href="'/members/edit/' + member.id"><i class="fa-solid fa-pen"></i></Link>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="flex justify-center items-center mt-5">
            <!-- <Link v-for="member in members.links" 
            :key="member.id" 
            :href="member.url"
            class="rounded-lg px-3 py-1.5 border border-gray-300 hover:bg-gray-300"
            :class="{'border-blue-400' : link.active }"
            >{{ member.label }}</Link> -->

            <Pagination :links="members.links" />
        </div>
    </div>
    
</template>