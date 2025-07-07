<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Dashboard Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ccc; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2>User Dashboard Report</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Surname</th>
                <th>Other Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Department</th>
                <th>User Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $i => $user)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $user->surname }}</td>
                <td>{{ $user->othername ?? 'N/A' }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->user_type }}</td>
                <td>{{ $user->department->name ?? 'N/A' }}</td>
                <td>{{ $user->designation->name ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
