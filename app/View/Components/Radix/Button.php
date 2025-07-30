<?php

namespace App\View\Components\Radix;

use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public string $variant = 'default',
        public string $size = 'default',
        public bool $asChild = false
    ) {}

    public function render()
    {
        return view('components.radix.button');
    }
} 