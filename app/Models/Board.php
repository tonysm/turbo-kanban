<?php

namespace App\Models;

use App\Models\Concerns\Orderable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    const DEFAULT_TITLE_NAME = 'New Board';

    use HasFactory;
    use Orderable;

    protected $guarded = [];

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
