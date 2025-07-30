@props(['asChild' => false])

@if($asChild)
    {{ $slot }}
@else
    <button {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50']) }}>
        {{ $slot }}
    </button>
@endif 