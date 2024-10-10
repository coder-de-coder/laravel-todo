<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class TaskController extends Controller
{
    use AuthorizesRequests; // Add this line to use the authorize method

    // Display a listing of tasks for the authenticated user
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $tasks = $user->tasks()->orderBy('is_completed')->get(); // Fetch tasks
        return view('tasks.index', compact('tasks'));
    }

    // Store a newly created task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        auth()->user()->tasks()->create([
            'title' => $request->title,
            'is_completed' => false,
            'order' => 0, // Add logic for ordering
        ]);

        return redirect()->route('tasks.index');
    }

    // Show the form for editing the specified task
    public function edit(Task $task)
    {
        $this->authorize('update', $task); // Authorize the user to edit the task
        return view('tasks.edit', compact('task'));
    }

    // Update the specified task
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task); // Authorize the user to update the task

        $request->validate([
            'title' => 'required|max:255',
        ]);

        $task->update([
            'title' => $request->title,
            'is_completed' => $request->is_completed ? true : false,
        ]);

        return redirect()->route('tasks.index');
    }

    // Remove the specified task
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task); // Authorize the user to delete the task

        $task->delete();

        return redirect()->route('tasks.index');
    }

    // Toggle the completion status of the specified task
    public function toggle(Task $task)
    {
        $task->is_completed = !$task->is_completed; // Toggle the completed status
        $task->save(); // Save the updated task

        return redirect()->route('tasks.index'); // Redirect back to the task index
    }
}
