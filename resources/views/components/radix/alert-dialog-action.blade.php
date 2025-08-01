@props(['asChild' => false])

@if($asChild)
    {{ $slot }}
@else
    <button {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-destructive text-destructive-foreground hover:bg-destructive/90 h-10 px-4 py-2']) }}>
        {{ $slot }}
    </button>
@endif 