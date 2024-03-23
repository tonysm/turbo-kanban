<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardsController extends Controller
{
    public function show(Board $board)
    {
        return view('boards.show', [
            'board' => $board,
            'tasks' => $board->tasks,
        ]);
    }

    public function store(Request $request)
    {
        $board = Board::create([
            'title' => Board::DEFAULT_TITLE_NAME,
        ]);

        if ($request->wantsTurboStream()) {
            return turbo_stream()->before('create_board', view('boards.partials.turbo-frame-board', [
                'board' => $board,
            ]));
        }

        return back();
    }

    public function destroy(Request $request, Board $board)
    {
        $board->delete();

        if ($request->wantsTurboStream()) {
            return turbo_stream()->remove(dom_id($board, 'frame'));
        }

        return to_route('dashboard');
    }
}
