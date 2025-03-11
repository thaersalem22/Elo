<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Task</h2>

        <div class="card mt-4">
            <div class="card-header">
                Edit Task
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="task-name" class="form-label">Task</label>
                        <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Task</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
