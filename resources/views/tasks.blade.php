<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: #f4f4f4;
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 20px;
            position: fixed;
            left: 0;
            top: 0;
        }
        .sidebar h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }
        .sidebar ul li a:hover {
            background: #495057;
            padding: 10px;
            border-radius: 5px;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }
        .container {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <h3><i class="fas fa-cogs"></i> Dashboard</h3>
    <ul>
        <li><a href="{{ route('tasks.index') }}"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="{{ route('users.index') }}"><i class="fas fa-users"></i> Users</a></li>
        <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>
<div class="content">
    <div class="container mt-5">
        <h2 class="text-center"><i class="fas fa-tasks"></i> Tasks List</h2>
        <div class="card p-3 mt-4">
            <h4 class="text-center mb-3">{{ isset($task) ? 'Update Task' : 'Add New Task' }}</h4>
            <form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="POST">
                @csrf
                @if(isset($task))
                    @method('PUT')
                @endif
                <input type="text" name="name" class="form-control mb-2" placeholder="Enter Task" value="{{ old('name', $task->name ?? '') }}" required>
                <button type="submit" class="btn btn-primary w-100">{{ isset($task) ? 'Update Task' : 'Add Task' }}</button>
            </form>
        </div>
        <hr>
        <h3 class="text-center"><i class="fas fa-list"></i> Current Tasks</h3>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td class="btn-group">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center text-muted">No tasks found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
