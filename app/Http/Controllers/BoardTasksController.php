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
        $board->tasks()->create($request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]) + [
            'position' => ($board->tasks()->max('tasks.position') ?? -1) + 1,
        ]);

        return back();
    }
}
