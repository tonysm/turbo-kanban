<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    const DEFAULT_TITLE_NAME = 'New Board';

    use HasFactory;

    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
