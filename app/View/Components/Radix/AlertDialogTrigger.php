<?php

namespace App\View\Components\Radix;

use Illuminate\View\Component;

class AlertDialogTrigger extends Component
{
    public function __construct(
        public bool $asChild = false
    ) {}

    public function render()
    {
        return view('components.radix.alert-dialog-trigger');
    }
} 