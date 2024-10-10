<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

    <!-- Edit Task Form -->
    <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Task Title Input -->
        <div>
            <label for="title" class="block text-sm font-medium">Task Title</label>
            <input type="text" name="title" value="{{ old('title', $task->title) }}" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <!-- Completion Checkbox -->
        <div>
            <label for="is_completed" class="flex items-center">
                <input type="checkbox" name="is_completed" {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}>
                <span class="ml-2">Mark as completed</span>
            </label>
        </div>

        <!-- Form Buttons -->
        <div class="flex justify-between">
            <button type="submit" class="p-2 bg-green-500 text-white rounded">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="p-2 bg-gray-500 text-white rounded">Cancel</a>
        </div>
    </form>
</div>
@endsection
