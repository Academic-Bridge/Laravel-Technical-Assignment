<html>

<head>
    <title>Attendance Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Arrival Time</th>
                <th>Departure Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
            <tr>
                <td>{{ $attendance->employee_id }}</td>
                <td>{{ $attendance->arrival_time }}</td>
                <td>{{ $attendance->departure_time }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>