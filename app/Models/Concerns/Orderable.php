<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait Orderable
{
    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('position');
    }

    protected function updateElementsBetween(int $from, int $to): void
    {
        if ($this->movingUp($from, $to)) {
            $this->decrementBetween($from, $to);
        } else {
            $this->incrementBetween($to, $from);
        }
    }

    protected function movingUp(int $from, int $to): bool
    {
        return $to >= $from;
    }

    protected function decrementBetween(int $from, int $to): void
    {
        $this->newOrderMovingQuery()
            ->where('position', '>', $from)
            ->where('position', '<=', $to)
            ->decrement('position');
    }

    protected function incrementBetween(int $from, int $to)
    {
        $this->newOrderMovingQuery()
            ->where('position', '>=', $from)
            ->where('position', '<', $to)
            ->increment('position');
    }

    protected function incrementHigherPositions(int $from, array $except = [])
    {
        $this->newOrderMovingQuery()
            ->whereNotIn('id', $except)
            ->where('position', '>=', $from)
            ->increment('position');
    }

    protected function decrementHigherPositions(int $from, array $except = [])
    {
        $this->newOrderMovingQuery()
            ->whereNotIn('id', $except)
            ->where('position', '>=', $from)
            ->decrement('position');
    }

    protected function newOrderMovingQuery()
    {
        return static::query();
    }
}
