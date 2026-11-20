<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users List</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/users">
                Users List
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(isset($user))
                        Update User
                    @else
                        New User
                    @endif
                </div>
                <div class="card-body">
                    @if(isset($user))
                        <!-- فورم التعديل -->
                        <form action="/users/update/{{ $user->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="user-name" class="form-label">User</label>
                                <input type="text" name="name" id="user-name" class="form-control" value="{{ $user->name }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-edit me-2"></i>Update User
                            </button>
                        </form>
                    @else
                        <!-- فورم الإضافة -->
                        <form action="/users/create" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="user-name" class="form-label">User</label>
                                <input type="text" name="name" id="user-name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Add User
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Current Users -->
            <div class="card mt-4">
                <div class="card-header">
                    Current Users
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <!-- زر التعديل -->
                                        <form action="/users/edit/{{ $item->id }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-edit me-2"></i>Edit
                                            </button>
                                        </form>

                                        <!-- زر الحذف -->
                                        <form action="/users/delete/{{ $item->id }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash me-2"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>