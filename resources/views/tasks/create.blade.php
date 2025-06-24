@extends('layout')

@section('content')
    <h2 class="mb-4">Create New Task</h2>

    <form action="{{ route('tasks.store') }}" method="POST" class="card p-4 shadow-sm bg-white">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date:</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select">
                <option value="pending">Pending</option>
                <option value="done">Done</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ url('/') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Save Task</button>
        </div>
    </form>
@endsection
