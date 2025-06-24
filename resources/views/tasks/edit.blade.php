@extends('layout')

@section('content')
    <h2>Edit Task</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Due Date:</label>
            <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status:</label>
            <select name="status" class="form-select">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
