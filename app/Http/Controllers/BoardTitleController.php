<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardTitleController extends Controller
{
    public function show(Board $board)
    {
        return view('boards-title.show', [
            'board' => $board,
        ]);
    }

    public function edit(Board $board)
    {
        return view('boards-title.edit', [
            'board' => $board,
        ]);
    }

    public function update(Request $request, Board $board)
    {
        $board->update($request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]));

        return back();
    }
}
