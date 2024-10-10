<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Your Tasks</h1>

    <!-- Add New Task -->
    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="flex">
            <input type="text" name="title" placeholder="New Task" class="w-full p-2 border border-gray-300 rounded" required>
            <button type="submit" class="ml-2 p-2 bg-blue-500 text-white rounded">Add Task</button>
        </div>
    </form>

    <!-- Task List -->
    <ul class="space-y-4">
        @forelse ($tasks as $task)
            <li class="flex justify-between items-center p-4 bg-white rounded-lg shadow">
                <div>
                    <input type="checkbox" {{ $task->is_completed ? 'checked' : '' }} onclick="document.getElementById('update-task-{{ $task->id }}').submit();" />
                    <span class="{{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
                        {{ $task->title }}
                    </span>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </div>
            </li>
        @empty
            <li class="p-4 bg-white rounded-lg shadow text-gray-500">No tasks available.</li>
        @endforelse
    </ul>
</div>
@endsection
