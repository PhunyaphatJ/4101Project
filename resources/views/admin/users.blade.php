<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>User List</h1>
    
        {{-- Check if there are any users --}}
        @if($users->isEmpty())
            <div class="alert alert-warning">No users found.</div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Surname</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop through users and display their details --}}
                    @foreach($users as $user)
                    <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('user_detail', ['user_id' => $user->id]) }}">แสดง</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {{ $users->links('pagination::bootstrap-4') }}
    </div>    
</body>
</html>
