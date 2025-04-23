<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class navbar extends Component
{
    public string $active_menu = 'home';
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->active_menu = Route::currentRouteName();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar', [
            'active_menu' => $this->active_menu
        ]);
    }
}
