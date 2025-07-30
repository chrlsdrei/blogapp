<?php

namespace App\View\Components\Radix;

use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(
        public string $variant = 'default'
    ) {}

    public function render()
    {
        return view('components.radix.alert');
    }
} 