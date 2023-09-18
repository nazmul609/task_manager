<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Other meta tags and CSS links -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    
    <br>
    <br>
    <div class="container text-center">
        <h1>Task Manager Application</h1>

        <h2>Task List</h2> @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        
    </div>

    <div class="container">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
        <a href="{{ route('taskshow') }}" class="btn btn-secondary mb-3">Show Completed Tasks</a>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this task?')">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                        @if (!$task->completed)
                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fa fa-check"></i> Complete
                            </button>
                        </form>
                        @endif
                    </td>



                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
