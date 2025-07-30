@props(['variant' => 'default'])

@php
$classes = 'relative w-full rounded-lg border p-4 [&>svg~*]:pl-7 [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg]:text-foreground';

switch ($variant) {
    case 'destructive':
        $classes .= ' border-destructive/50 text-destructive dark:border-destructive [&>svg]:text-destructive';
        break;
    default:
        $classes .= ' bg-background text-foreground';
        break;
}
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div> 