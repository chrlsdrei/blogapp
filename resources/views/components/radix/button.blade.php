@props(['variant' => 'default', 'size' => 'default', 'asChild' => false])

@php
$classes = 'inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background';

switch ($variant) {
    case 'ghost':
        $classes .= ' hover:bg-accent hover:text-accent-foreground';
        break;
    case 'destructive':
        $classes .= ' bg-destructive text-destructive-foreground hover:bg-destructive/90';
        break;
    default:
        $classes .= ' bg-primary text-primary-foreground hover:bg-primary/90';
        break;
}

switch ($size) {
    case 'sm':
        $classes .= ' h-9 px-3';
        break;
    case 'lg':
        $classes .= ' h-11 px-8';
        break;
    default:
        $classes .= ' h-10 py-2 px-4';
        break;
}
@endphp

@if($asChild)
    {{ $slot }}
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif 