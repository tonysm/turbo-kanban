<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskTitleController extends Controller
{
    public function show(Task $task)
    {
        return view('tasks-title.show', [
            'task' => $task,
        ]);
    }

    public function edit(Task $task)
    {
        return view('tasks-title.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->validate([
            'title' => ['required', 'max:255'],
        ]));

        return to_route('tasks.title.show', $task);
    }
}
