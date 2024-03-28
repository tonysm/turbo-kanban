<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskOrderController extends Controller
{
    public function update(Request $request, Task $task)
    {
        $input = $request->validate([
            'from' => ['required', 'integer'],
            'to' => ['required', 'integer'],
            'from_parent_id' => ['required', 'integer'],
            'to_parent_id' => ['required', 'integer'],
        ]);

        $task->move($input['from'], $input['to'], $input['from_parent_id'], $input['to_parent_id']);

        return response()->noContent();
    }
}
