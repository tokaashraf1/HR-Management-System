<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Worker;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function allTasks()
    {
        return response()->json(Task::all());
    }

    public function tasksByStatus($status)
    {
        $tasks = Task::where('is_completed', $status === 'completed' ? true : false)->get();
        return response()->json($tasks);
    }

    public function taskStats()
    {
        return response()->json([
            'total_workers' => Worker::count(),
            'total_tasks' => Task::count(),
            'completed_tasks' => Task::where('is_completed', true)->count(),
            'pending_tasks' => Task::where('is_completed', false)->count(),
        ]);
    }
}
