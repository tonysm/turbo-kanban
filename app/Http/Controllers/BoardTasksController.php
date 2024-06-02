<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardTasksController extends Controller
{
    public function index(Board $board)
    {
        return view('tasks.index', [
            'board' => $board,
        ]);
    }

    public function create(Board $board)
    {
        return view('tasks.create', [
            'board' => $board,
        ]);
    }

    public function store(Request $request, Board $board)
    {
        $task = $board->tasks()->create($request->validate([
            'title' => ['required', 'string', 'max:255'],
            'client_id' => ['sometimes', 'nullable', 'string'],
        ]) + [
            'position' => ($board->tasks()->max('tasks.position') ?? -1) + 1,
        ]);

        if ($request->wantsTurboStream()) {
            return turbo_stream()->replace("frame_task_{$task->client_id}", view('tasks.partials.task-frame', [
                'task' => $task,
            ]));
        }

        return back();
    }
}
