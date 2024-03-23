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
        ]));

        if ($request->wantsTurboStream()) {
            return turbo_stream()->before(dom_id($board, 'create_task'), view('tasks.partials.task-frame', [
                'task' => $task,
            ]));
        }

        return to_route('boards.show', $board);
    }
}
