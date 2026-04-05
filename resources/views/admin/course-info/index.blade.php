@extends('layouts.admin-layout')

@section('title', 'Course')

@section('content')
    <div class="flex justify-between ">
        <h1 class="font-medium text-base sm:text-lg sm:text-2xl">Admin Course</h1>
        <a href="{{ route('profiles.edit', auth()->id()) }}">
                    <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('assets/author-img.png') }}"
                        alt="" class="size-10 rounded-full">
                </a>
    </div>
    <x-button class="text-white mt-6" href="{{ route('courses.create') }}">
        <x-slot:icon><svg xmlns="http://www.w3.org/2000/svg" class="fill-white"
                viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                <path
                    d="M256 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 160-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0 0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160 160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0 0-160z" />
            </svg></x-slot:icon>
        Add Course
    </x-button>
    <p class="mt-10 text-[#717182] text-xs sm:text-base">Published Course ></p>
    <div class="mt-7 grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach ($courses as $course)
            <x-course-card-admin :course="$course" />
        @endforeach
    </div>
    <div class="mt-6">
        {{ $courses->links() }}
    </div>
@endsection
