<?php

namespace App\Models;

use App\Models\Concerns\Orderable;
use HotwiredLaravel\TurboLaravel\Models\Broadcasts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;
    use Orderable {
        newOrderMovingQuery as newOrderMovingQueryFromBase;
    }
    use Broadcasts;

    protected $guarded = [];

    protected $broadcastsRefreshesTo = ['board'];

    protected $touches = ['board'];

    public static function booted()
    {
        static::creating(function ($task) {
            $task->client_id ??= (string) Str::random(32);
        });
    }

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
