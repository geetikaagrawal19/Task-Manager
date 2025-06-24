@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>All Tasks</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
    </div>

    @if($tasks->isEmpty())
        <div class="alert alert-info">No tasks found.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>
                        <span class="badge bg-{{ $task->status == 'done' ? 'success' : 'warning' }}">
                            {{ ucfirst($task->status) }}
                        </span>
                    </td>
                    <td>{{ $task->due_date }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
<div class="mt-3">
    {{ $tasks->links() }}
</div>
    @endif
@endsection
