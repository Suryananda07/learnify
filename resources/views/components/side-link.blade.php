@props([
    'href' => '/',
    'icon' => null,
])

@php
    $path = parse_url($href, PHP_URL_PATH);

    $active = request()->is(trim($path, '/')) || request()->is(trim($path, '/') . '/*');

    $baseClass = 'flex flex-col lg:flex-row gap-2 lg:gap-5 lg:pl-6 items-center transition-all duration-300';

    $activeClass = $active
        ? 'text-white font-semibold bg-[#C9AFFF] pl-3 pr-3 lg:pr-12 py-3 lg:rounded-r-xl w-full sm:w-fit'
        : 'text-white/70 hover:text-white';

    $textClass = 'text-[8px] sm:text-xs';
@endphp

<a href="{{ $href }}" {{ $attributes->class([$baseClass, $activeClass]) }}>

    @if ($icon)
        <img src="{{ $icon }}" alt="" class="size-4 sm:size-6 lg:size-4 fill-white">
    @endif

    <h3 class="{{ $textClass }}">
        {{ $slot }}
    </h3>
</a>
