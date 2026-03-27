@props([
    'type' => 'solid',
    'size' => 'base',
    'href' => null,
])

@php
    switch ($size) {
        case 'base':
            $sizeClass = 'px-3 py-1 text-base gap-1.5';
            $iconSize = 'size-3';
            break;
        case 'large':
            $sizeClass = 'px-6 py-2 text-base gap-2.5';
            $iconSize = 'size-5';
            break;
        case 'very-large':
            $sizeClass = 'px-7 py-2 text-xl md:text-3xl gap-3';
            $iconSize = 'size-6';
            break;
        default:
            $sizeClass = 'px-3 py-1 text-base gap-1.5';
            $iconSize = 'size-3';
            break;
    }

    switch ($type) {
    case 'solid':
        $colorClass = 'bg-primary text-white border-2 border-primary hover:opacity-90';
        break;

    case 'quiz':
        $colorClass = 'bg-purple-100 text-black border-2 border-purple-300 hover:opacity-90';
        break;

    case 'outline':
        $colorClass = 'bg-transparent text-primary border-2 border-primary hover:bg-primary hover:text-white';
        break;

    case 'course':
        $colorClass = 'text-[#9100FF] bg-white rounded-xl font-bold';
        break;

    case 'category':
        $colorClass = 'bg-[#D9D9D9] text-xl';
        break;

    case 'admin':
        $colorClass = 'text-[#C5BED9] text-base border-2 border-[#C5BED9] hover:text-white hover:bg-[#C5BED9]';
        break;

    default:
        $colorClass = 'bg-primary text-white border-2 border-primary hover:opacity-90';
        break;
}

    $baseClass = "inline-flex items-center justify-center rounded-lg font-medium transition-all duration-300 cursor-pointer {$sizeClass} {$colorClass}";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class([$baseClass]) }}>
        {{ $slot }}
        @if (isset($icon) && $icon->isNotEmpty())
            <span class="{{ $iconSize }}">{{ $icon }}</span>
        @endif
    </a>
@else
    <button {{ $attributes->class([$baseClass]) }}>
        {{ $slot }}
        @if (isset($icon) && $icon->isNotEmpty())
            <span class="{{ $iconSize }}">{{ $icon }}</span>
        @endif
    </button>
@endif
