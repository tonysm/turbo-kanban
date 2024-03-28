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
        ]);
    }

    public function store(Request $request)
    {
        $board = Board::create([
            'title' => Board::DEFAULT_TITLE_NAME,
            'position' => (Board::query()->max('position') ?? -1) + 1,
        ]);

        return back();
    }

    public function destroy(Request $request, Board $board)
    {
        $board->delete();

        return back();
    }
}
