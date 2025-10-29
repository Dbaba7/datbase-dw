<!DOCTYPE html>
<html>
<head>
    <title>Crime Report</title>
    <style>
        body {
            font-family: 'Helvetica';
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Crime Report</h1>
    <table>
        <thead>
            <tr>
                <th>Crime Type</th>
                <th>Location</th>
                <th>Reported At</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crimes as $crime)
                <tr>
                    <td>{{ $crime->crime_type }}</td>
                    <td>{{ $crime->location }}</td>
                    <td>{{ $crime->reported_at }}</td>
                    <td>{{ $crime->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
