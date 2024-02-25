<template>
    <Head title="Dashboard" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <button @click="showModal = true" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded">Record
                            Attendance</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Include Attendance/Index component here -->

        <div style="display: flex; justify-content: center;">
            <Attendance :attendances="attendances" />
        </div>

        <form @submit.prevent="submit">
            <div v-if="showModal"
                style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); display: flex; justify-content: center; align-items: center;">
                <div style="background-color: white; padding: 20px; border-radius: 10px; width: 300px;">
                    <h3 id="modal-title" style="text-align: center; color: #333; margin-bottom: 20px;">Attendance Management
                    </h3>

                    <div style="margin-bottom: 10px;">
                        <label>Employee ID a.ka Email:</label>
                        <input type="text" v-model="form.employeeId" style="width: 100%; padding: 10px; margin-top: 5px;">
                        <div v-if="form.errors.employeeId" style="color: red;">{{ form.errors.employeeId[0] }}</div>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label>Arrival Time:</label>
                        <input type="time" v-model="form.arrivalTime" style="width: 100%; padding: 10px; margin-top: 5px;">
                        <div v-if="form.errors.arrivalTime" style="color: red;">{{ form.errors.arrivalTime[0] }}</div>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label>Departure Time:</label>
                        <input type="time" v-model="form.departureTime"
                            style="width: 100%; padding: 10px; margin-top: 5px;">
                        <div v-if="form.errors.departureTime" style="color: red;">{{ form.errors.departureTime[0] }}</div>
                    </div>
                    <button @click="recordAttendance"
                        style="width: 100%; padding: 10px 20px; background-color: blue; color: white; border: none; border-radius: 5px;">Submit</button>
                </div>
            </div>
        </form>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Attendance from '@/Components/Attendance.vue';
import axios from 'axios';

const showModal = ref(false);
const attendances = ref([]);
const form = useForm({
    arrivalTime: '',
    departureTime: '',
    employeeId: '',
});

// authenticate our SPA page first with sunctum
axios.get('/sanctum/csrf-cookie').then(response => {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = response.data.csrfToken;
    form.post(route('login'), {
        onSuccess: () => console.log('authenticated SPA'),
    });
});

//subscquent request will be authenticated
axios.get('/attendance').then((response) => {
    attendances.value = response.data
});

const submit = () => {
    form.post(route('attendance'), {
        onSuccess: () => {
            console.log("done submitting record");
            showModal.value = false;
        },
    });
};
// get attendance


</script>
