<?php

namespace App\Models;

use App\Models\Concerns\Orderable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use Orderable {
        newOrderMovingQuery as newOrderMovingQueryFromBase;
    }

    protected $guarded = [];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function move(int $from, int $to, int $fromParentId, int $toParentId)
    {
        if ($fromParentId === $toParentId) {
            $this->updateElementsBetween($from, $to);
            $this->update(['position' => $to]);
        } else {
            $this->decrementHigherPositions($from, except: [$this->id]);
            $this->update(['board_id' => $toParentId, 'position' => $to]);
            $this->incrementHigherPositions($to, except: [$this->id]);
        }
    }

    protected function newOrderMovingQuery()
    {
        return $this->newOrderMovingQueryFromBase()->where('board_id', $this->board_id);
    }
}
