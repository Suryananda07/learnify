@props(['href' => '/'])

@php
    $active = request()->is(trim($href, '/')) || request()->is(trim($href, '/') . '*/');
    $class = $active
        ? "font-semibold italic text-primary text-[15px] text-base"
        : "text-base text-base text-black hover:text-primary transition-all duration-300"
@endphp

<a href="{{ $href }}" {{ $attributes->class([$class]) }}>{{ $slot }}</a>