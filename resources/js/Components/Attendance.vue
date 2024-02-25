<template>
    <div>
        <div>
            <div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
                <button @click="exportToExcel"
                    style="margin-right: 5px; padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Export
                    to Excel</button>
                <button
                    style="padding: 10px; background-color: #008CBA; color: white; border: none; cursor: pointer;">Export to
                    PDF</button>
            </div>
            <table v-if="attendances.length" style="width: 100%; border-collapse: collapse;">
                <!-- Your existing table code... -->
            </table>
            <p v-else style="color: black;">No records yet.</p>
        </div>
        <table v-if="attendances.length" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="border: 1px solid #ddd; padding: 8px;">Employee ID</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Arrival Time</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Departure Time</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="attendance in attendances" :key="attendance.id">
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ attendance.employee_id }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ attendance.arrival_time }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ attendance.departure_time }}</td>
                </tr>
            </tbody>
        </table>
        <p v-else style="color: black;">No records yet.</p>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

// authenticate our SPA page first with sunctum
axios.get('/sanctum/csrf-cookie').then(response => {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = response.data.csrfToken;
    form.post(route('login'), {
        onSuccess: () => console.log('authenticated SPA'),
    });
});

const props = defineProps({
    attendances: {
        type: Array,
        default: () => [],
    },
});
// on export excel button click
// call endPoint to export to excel, this endpoint is protected by sunctum

const exportToExcel = async () => {
    try {
        const response = await axios.get('/attendance/export', {
            responseType: 'blob', // Important for handling the binary Excel file
        });

        // Create a blob from the response for download
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'attendances.xlsx'); // Set the file name
        document.body.appendChild(link);
        link.click();
    } catch (error) {
        console.error('Error exporting to Excel:', error);
    }
};
// Your existing code...
</script>