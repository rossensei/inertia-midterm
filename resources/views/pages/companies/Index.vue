<script setup>
import {Link, useForm} from '@inertiajs/inertia-vue3'
import {ref, onMounted, watch, onBeforeMount, onBeforeUnmount, onBeforeUpdate } from 'vue'
import DeleteConfirmation from '../../components/confirm-dialog.vue'
import InformationDialog from '../../components/information-dialog.vue'
import WarningDialog from '../../components/warning-dialog.vue'

onMounted(() => {
    if(props.flash.success && props.flash.success != 'Company deleted successfully!') {
        console.log(true)
        setTimeout(() => {
            showSuccessDialog.value = true
        }, 100)
    }
})

onBeforeUpdate(() => {
    if(!props.flash.error) {
        showSuccessDialog.value = true
    }
})

const props = defineProps({
    'companies': Array,
    'flash': Object
})

const showSuccessDialog = ref(false)
const showErrorDialog = ref(false)
const showDialog = ref(false)
let deleteForm = useForm()
let selectedCompany = null

const closeErrorDialog = () => {
    props.flash.error = null
}

const closeInfoDialog = () => {
    props.flash.success = null
    showSuccessDialog.value = false
}

// toggle modal
const toggleDialog = () => {
    showDialog.value = !showDialog.value
}

const getSelectedCompany = (id) => {
    selectedCompany = id
    console.log(selectedCompany)
    toggleDialog();
}
 
const deleteOffice = () => {
    deleteForm.delete('/companies/' + selectedCompany)
    toggleDialog()
}

watch(props.flash.success, (newValue, oldValue) => {
    if(newValue == 'Company deleted successfully!') {
        console.log(newValue)
    }
})

</script>

<template layout="default">
    <div class="container-md mx-auto p-8 w-3/4 -mt-56">
        <div class="flex justify-between items-center mb-3">
            <h1 class="text-3xl font-semibold text-white">Companies</h1>
            <Link href="/companies/create" class="text-white rounded-lg border-2 border-solid hover:border-blue-500 hover:bg-gray-50 hover:text-gray-700 px-3 py-1">+ Add Company</Link>
        </div>

        <Transition name="slide-down">
            <div v-if="showDialog" class="absolute top-0 left-0 min-h-full min-w-full -mt-1">
                <DeleteConfirmation title="Delete Confirmation"
                message="Are you sure you want to delete this item?" 
                @cancel="toggleDialog()"
                @confirm="deleteOffice()"
                ></DeleteConfirmation>
            </div>
        </Transition>

        <Transition name="slide-down">
            <div v-if="props.flash.error" class="absolute top-0 left-0 min-h-full min-w-full -mt-1">
                <WarningDialog :message="props.flash.error" @dismiss="closeErrorDialog()"></WarningDialog>
            </div>
        </Transition>

        <!-- renders only if showSuccessDialog is true -->
        <Transition name="slide-down">
            <div v-if="showSuccessDialog" class="absolute top-0 left-0 min-h-full min-w-full -mt-1">
                <InformationDialog :message="props.flash.success" @dismiss="closeInfoDialog()"></InformationDialog>
            </div>
        </Transition>

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
                    <td class="px-6 py-4 space-x-2">
                        <Link :href="'/companies/edit/' + company.id" class=""><i class="fa-solid fa-pen"></i></Link>
                        <button class="bg-red-600 text-white px-1.5 py-1 rounded-lg" @click="getSelectedCompany(company.id)"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style>
.slide-down-enter-active, 
.slide-down-leave-active {
    @apply transition-transform;
    @apply duration-100;
    @apply ease-in-out;
}

.slide-down-enter-from, 
.slide-down-leave-to {
    @apply -translate-y-10;
}

</style>