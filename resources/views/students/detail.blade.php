<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Danh sách Sinh Viên FPOLY</h1>
    <a href="">Create Student +</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->code }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->dob }}</td>
                <td>
                    <a href="">Edit</a> |
                    <form>
                            <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
</body>
</html>