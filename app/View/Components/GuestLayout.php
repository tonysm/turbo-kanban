<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    public function __construct(public ?string $title = null, public ?bool $viewTransitions = null)
    {
        $this->viewTransitions ??= config('turbo-breeze.view_transitions', true);
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}
