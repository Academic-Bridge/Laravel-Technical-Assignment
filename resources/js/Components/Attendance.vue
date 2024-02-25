<template>
    <div>
        <div>
            <div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
                <button
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

<script>
export default {
    props: {
        attendances: {
            type: Array,
            default: () => [],
        },
    },
};
</script>