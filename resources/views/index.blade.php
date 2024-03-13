<!-- resources/views/tasks/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasky App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .completed {
            text-decoration: line-through;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Tasky</h1>
    <form action="/tasks" method="post" class="mb-3">
        @csrf
        <input type="text" name="text" class="form-control" placeholder="Add a new task">
        <button type="submit" class="btn btn-primary btn-block mt-3">Add Task</button>
    </form>
    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item {{ $task->completed ? 'completed' : '' }}">
                {{ $task->text }}
                <form action="/tasks/{{ $task->id }}" method="post" class="float-right">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
                <form action="/tasks/{{ $task->id }}" method="post" class="float-right mr-2">
                    @csrf
                    @method('put')
                    <input type="hidden" name="completed" value="{{ !$task->completed }}">
                    <button type="submit" class="btn btn-sm btn-success">{{ $task->completed ? 'Undo' : 'Complete' }}</button>
                </form>               
            </li>
        @endforeach
    </ul>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
