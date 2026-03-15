@props([
    'type' => 'solid',
    'size' => 'base',
    'href' => null,
])

@php
    switch ($size) {
        case 'large':
            $sizeClass = 'px-6 py-2 text-base gap-2.5';
            break;
        default:
            $sizeClass = 'px-3 py-1.5 text-base gap-1.5';
            break;
    }

    $colorClass =
        $type === 'outline'
            ? 'bg-transparent text-primary border-2 border-primary hover:bg-primary hover:text-white'
            : 'bg-primary text-white border-2 border-primary hover:opacity-90';

    $baseClass = "inline-flex items-center justify-center rounded-lg font-medium transition-all duration-300 cursor-pointer {$sizeClass} {$colorClass}";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class([$baseClass]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->class([$baseClass]) }}>
        {{ $slot }}
    </button>
@endif
