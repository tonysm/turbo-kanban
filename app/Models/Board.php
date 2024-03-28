<?php

namespace App\Models;

use App\Models\Concerns\Orderable;
use HotwiredLaravel\TurboLaravel\Models\Broadcasts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    const DEFAULT_TITLE_NAME = 'New Board';

    use HasFactory;
    use Orderable;
    use Broadcasts;

    protected $guarded = [];

    protected $broadcastsRefreshes = true;

    public function move(int $from, int $to): void
    {
        $this->updateElementsBetween($from, $to);
        $this->update(['position' => $to]);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class)->ordered();
    }
}
