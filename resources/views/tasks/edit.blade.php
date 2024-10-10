<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

    <!-- Edit Task Form -->
    <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium">Task Title</label>
            <input type="text" name="title" value="{{ $task->title }}" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div>
            <label for="is_completed" class="flex items-center">
                <input type="checkbox" name="is_completed" {{ $task->is_completed ? 'checked' : '' }}>
                <span class="ml-2">Mark as completed</span>
            </label>
        </div>

        <div class="flex justify-between">
            <button type="submit" class="p-2 bg-green-500 text-white rounded">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="p-2 bg-gray-500 text-white rounded">Cancel</a>
        </div>
    </form>
</div>
@endsection
