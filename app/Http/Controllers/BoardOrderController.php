<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardOrderController extends Controller
{
    public function update(Request $request, Board $board)
    {
        $input = $request->validate([
            'from' => ['required', 'integer'],
            'to' => ['required', 'integer'],
        ]);

        $board->move($input['from'], $input['to']);

        return response()->noContent();
    }

    private function movingUp($oldPosition, $newPosition)
    {
        return $newPosition > $oldPosition;
    }
}
