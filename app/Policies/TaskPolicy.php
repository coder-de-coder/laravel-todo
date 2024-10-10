<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Determine whether the user can update the task.
     */
    public function update(User $user, Task $task)
    {
        return $user->id === $task->user_id; // Only allow the user who created the task to update it.
    }

    /**
     * Determine whether the user can delete the task.
     */
    public function delete(User $user, Task $task)
    {
        return $user->id === $task->user_id; // Only allow the user who created the task to delete it.
    }
}
