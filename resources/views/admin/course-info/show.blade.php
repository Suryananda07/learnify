@extends('layouts.admin-layout')

@section('title', 'Show Course')

@section('content')
    <div class="flex justify-end">
        <a href="{{ route('profiles.edit', auth()->id()) }}">
            <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('assets/author-img.png') }}"
                alt="" class="size-10 rounded-full">
        </a>
    </div>
    <div class="flex flex-col gap-5 mt-10">
        <h1 class="font-medium text-4xl">{{ $course->title }}</h1>
        <p class="text-base text-[#717182]">By <span class="text-primary">{{ $course->user->name }}</span> |
            {{ $course->created_at->format('d F Y ') }}</p>
        <hr class="border-[#BEBECB]">
        <div class="flex gap-5 w-full">
            <div class="p-5 shadow-xl rounded-xl bg-[#ffff]">
                <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('assets/img-card.png') }}"
                    alt="" class="size-25 rounded-lg">
            </div>
            <div class="flex flex-col gap-2 shadow-xl rounded-xl bg-[#ffff] px-6 py-2 w-full">
                <h2 class="font-medium text-base">Course Info</h2>
                <hr class="border-[#BEBECB]">
                <div class="flex justify-between">
                    <div class="">
                        <div class="flex items-center gap-3 py-3.5 text-sm">
                            <img src="{{ asset('assets/course-grid.png') }}" alt="" class="size-4">
                            <p>Category</p>
                            <p class="text-primary">{{ $course->category->name }}</p>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-primary"
                                viewBox="0 0 512 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                <path
                                    d="M464 256a208 208 0 1 1 -416 0 208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0 256 256 0 1 0 -512 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            <p>Duration</p>
                            <p class="font-light text-[#AAAAB3]">{{ $course->duration_video }} minutes</p>
                        </div>
                    </div>
                    <div class="border-l border-l-[#D9D9D9] px-4">
                        <div class="flex items-center gap-3 py-3.5 text-sm">
                            <img src="{{ asset('assets/icon_total_lesson.png') }}" alt="" class="size-4">
                            <p>Total Lessons</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 fill-primary"
                                viewBox="0 0 512 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                <path
                                    d="M464 256a208 208 0 1 1 -416 0 208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0 256 256 0 1 0 -512 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            <p class=" text-sm">{{ $course->duration_lesson }} minutes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-3 px-7 py-4 bg-[#ffff] w-full shadow-xl rounded-xl">
            <h2 class="font-medium text-xl">Course Overview</h2>
            <p class="text-base text-[#717182] w-[95%] wrap-break-word whitespace-pre-line">{{ $course->description }}</p>
        </div>
        <div class="flex flex-col gap-6 py-6 px-7 bg-[#ffff] w-full shadow-xl rounded-xl">
            <h2 class="font-medium text-xl">Lessons</h2>
            <div class="flex flex-col gap-5">
                @foreach ($topics as $topic)
                    <div class="flex gap-6 items-center">
                        <div class="size-4 bg-primary rounded-full"></div>
                        <p class="text-sm">{{ $topic->title }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
