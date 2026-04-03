@extends('layouts.guest-layout')

@section('title', 'Course')

@section('content')
    <section class="flex flex-col gap-3 w-full">
        <h1 class="font-bold text-4xl">All Course</h1>
        <form action="" method="GET" class="flex gap-3">
            <x-input name="search" placeholder="Search for course" type="search" />
            <x-button>Search</x-button>
        </form>
    </section>

    <section x-data class="mt-5 overflow-x-auto whitespace-nowrap ">
        <div class="inline-flex gap-4">
            <a href="{{ route('course', ['category' => 'allCategory']) }}"
                class="text-xl font-medium text-white px-3 py-1 gap-1.5 rounded-lg text-center shrink-0
                {{ request('category') === 'allCategory' ? 'bg-[#A6A7E9]' : 'bg-primary hover:bg-[#A6A7E9]' }}">All
                Category</a>
            <a href="{{ route('course', ['category' => 'allCategory']) }}"
                class="text-xl font-medium text-white px-3 py-1 gap-1.5 rounded-lg text-center shrink-0
                {{ request('category') === 'allCategory' ? 'bg-[#A6A7E9]' : 'bg-primary hover:bg-[#A6A7E9]' }}">All
                Category</a>
            <a href="{{ route('course', ['category' => 'allCategory']) }}"
                class="text-xl font-medium text-white px-3 py-1 gap-1.5 rounded-lg text-center shrink-0
                {{ request('category') === 'allCategory' ? 'bg-[#A6A7E9]' : 'bg-primary hover:bg-[#A6A7E9]' }}">All
                Category</a>
            <a href="{{ route('course', ['category' => 'allCategory']) }}"
                class="text-xl font-medium text-white px-3 py-1 gap-1.5 rounded-lg text-center shrink-0
                {{ request('category') === 'allCategory' ? 'bg-[#A6A7E9]' : 'bg-primary hover:bg-[#A6A7E9]' }}">All
                Category</a>
            <a href="{{ route('course', ['category' => 'allCategory']) }}"
                class="text-xl font-medium text-white px-3 py-1 gap-1.5 rounded-lg text-center shrink-0
                {{ request('category') === 'allCategory' ? 'bg-[#A6A7E9]' : 'bg-primary hover:bg-[#A6A7E9]' }}">All
                Category</a>
            <a href="{{ route('course', ['category' => 'allCategory']) }}"
                class="text-xl font-medium text-white px-3 py-1 gap-1.5 rounded-lg text-center shrink-0
                {{ request('category') === 'allCategory' ? 'bg-[#A6A7E9]' : 'bg-primary hover:bg-[#A6A7E9]' }}">All
                Category</a>
            <a href="{{ route('course', ['category' => 'allCategory']) }}"
                class="text-xl font-medium text-white px-3 py-1 gap-1.5 rounded-lg text-center shrink-0
                {{ request('category') === 'allCategory' ? 'bg-[#A6A7E9]' : 'bg-primary hover:bg-[#A6A7E9]' }}">All
                Category</a>
            <a href="{{ route('course', ['category' => 'allCategory']) }}"
                class="text-xl font-medium text-white px-3 py-1 gap-1.5 rounded-lg text-center shrink-0
                {{ request('category') === 'allCategory' ? 'bg-[#A6A7E9]' : 'bg-primary hover:bg-[#A6A7E9]' }}">All
                Category</a>
            @foreach ($categories as $category)
                <a href="{{ route('course', ['category' => $category->name]) }}"
                    class="text-xl font-medium text-white px-3 py-1 gap-1.5 rounded-lg text-center shrink-0
                {{ request('category') == $category->name ? 'bg-[#A6A7E9]' : 'bg-primary hover:bg-[#A6A7E9]' }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </section>

    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 my-15 sm:my-20 justify-between gap gap-16">
        @if ($courses->count() > 0)
            @foreach ($courses as $course)
                <x-card :course="$course" />
            @endforeach
        @else
            <div class="col-span-full text-center text-xl font-bold">
                <p>Course pada category {{ request('category') }} tidak tersedia</p>
            </div>
        @endif
    </section>
    <div class="">
        {{ $courses->links() }}
    </div>
@endsection
