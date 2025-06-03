<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShortenerStats extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $data, public string $name)
    {

    }

    public function render(): View
    {
        return view('components.shortener-stats', [
            'data' => $this->data,
            'name' => $this->name,
        ]);
    }
}
