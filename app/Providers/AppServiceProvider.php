<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register Radix UI components
        Blade::component('radix.button', \App\View\Components\Radix\Button::class);
        Blade::component('radix.card', \App\View\Components\Radix\Card::class);
        Blade::component('radix.card-header', \App\View\Components\Radix\CardHeader::class);
        Blade::component('radix.card-title', \App\View\Components\Radix\CardTitle::class);
        Blade::component('radix.card-content', \App\View\Components\Radix\CardContent::class);
        Blade::component('radix.card-footer', \App\View\Components\Radix\CardFooter::class);
        Blade::component('radix.text-field', \App\View\Components\Radix\TextField::class);
        Blade::component('radix.text-field-input', \App\View\Components\Radix\TextFieldInput::class);
        Blade::component('radix.text-area', \App\View\Components\Radix\TextArea::class);
        Blade::component('radix.text-area-input', \App\View\Components\Radix\TextAreaInput::class);
        Blade::component('radix.label', \App\View\Components\Radix\Label::class);
        Blade::component('radix.checkbox', \App\View\Components\Radix\Checkbox::class);
        Blade::component('radix.alert', \App\View\Components\Radix\Alert::class);
        Blade::component('radix.alert-icon', \App\View\Components\Radix\AlertIcon::class);
        Blade::component('radix.alert-content', \App\View\Components\Radix\AlertContent::class);
        Blade::component('radix.alert-title', \App\View\Components\Radix\AlertTitle::class);
        Blade::component('radix.alert-description', \App\View\Components\Radix\AlertDescription::class);
        Blade::component('radix.dropdown-menu', \App\View\Components\Radix\DropdownMenu::class);
        Blade::component('radix.dropdown-menu-trigger', \App\View\Components\Radix\DropdownMenuTrigger::class);
        Blade::component('radix.dropdown-menu-content', \App\View\Components\Radix\DropdownMenuContent::class);
        Blade::component('radix.dropdown-menu-item', \App\View\Components\Radix\DropdownMenuItem::class);
        Blade::component('radix.dropdown-menu-label', \App\View\Components\Radix\DropdownMenuLabel::class);
        Blade::component('radix.dropdown-menu-separator', \App\View\Components\Radix\DropdownMenuSeparator::class);
        Blade::component('radix.avatar', \App\View\Components\Radix\Avatar::class);
        Blade::component('radix.avatar-image', \App\View\Components\Radix\AvatarImage::class);
        Blade::component('radix.avatar-fallback', \App\View\Components\Radix\AvatarFallback::class);
        Blade::component('radix.alert-dialog', \App\View\Components\Radix\AlertDialog::class);
        Blade::component('radix.alert-dialog-trigger', \App\View\Components\Radix\AlertDialogTrigger::class);
        Blade::component('radix.alert-dialog-content', \App\View\Components\Radix\AlertDialogContent::class);
        Blade::component('radix.alert-dialog-title', \App\View\Components\Radix\AlertDialogTitle::class);
        Blade::component('radix.alert-dialog-description', \App\View\Components\Radix\AlertDialogDescription::class);
        Blade::component('radix.alert-dialog-cancel', \App\View\Components\Radix\AlertDialogCancel::class);
        Blade::component('radix.alert-dialog-action', \App\View\Components\Radix\AlertDialogAction::class);
    }
}
