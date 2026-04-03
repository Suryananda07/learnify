<header x-data="{ open: false }" @click.outside="open=false"
    class="w-screen px-8 sm:px-[71px] py-8 fixed z-[9999] bg-white">
    <div class="flex justify-between items-center">
        <a href="/" class="font-semibold text-3xl sm:text-[32px]">Learn<span class="text-primary">ify</span></a>
        <div class="flex gap-3 lg:gap-5.5 hidden md:flex">
            <x-nav-link href="/">Home</x-nav-link>
            <x-nav-link href="/course">Courses</x-nav-link>
            <x-nav-link href="/about">About Us</x-nav-link>
            <x-nav-link href="/contact">Contact</x-nav-link>
            @can('verifikasi-info')    
            <x-nav-link href="/admin/dashboard">Admin</x-nav-link>
            @endcan
        </div>
        @auth
            <div class="hidden md:flex gap-3">
                <a href="">
                    <img src="{{ asset('assets/author-img.png') }}" alt="">
                </a>
                <x-button href="{{ route('logout') }}">Logout</x-button>
            </div>
        @endauth
        @guest
            <div class="flex items-center gap-3 hidden md:block">
                <x-button href="/register">Register</x-button>
                <x-button href="/login" type="outline">Login</x-button>
            </div>
        @endguest

        <button @click="open = !open" class="block md:hidden">
            <svg x-show="!open" class="size-8" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                <path
                    d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
            </svg>
            <svg x-show="open" class="size-7" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 384 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                <path
                    d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
            </svg>
        </button>
    </div>
    <div x-show="open" class="flex flex-col gap-6">
        <div class="flex flex-col gap-6 mt-5">
            <x-nav-link href="/">Home</x-nav-link>
            <x-nav-link href="/course">Courses</x-nav-link>
            <x-nav-link href="/about">About Us</x-nav-link>
            <x-nav-link href="/contact">Contact</x-nav-link>
        </div>
        <div class="flex gap-5 sm:gap-7">
            <x-button href="/register" size="large">Register</x-button>
            <x-button href="/login" type="outline" size="large">Login</x-button>
        </div>
    </div>

</header>
