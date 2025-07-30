<?php

namespace App\View\Components\Radix;

use Illuminate\View\Component;

class AvatarFallback extends Component
{
    public function render()
    {
        return view('components.radix.avatar-fallback');
    }
} 