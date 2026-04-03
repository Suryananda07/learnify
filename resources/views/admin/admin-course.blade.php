@extends('layouts.admin-layout')

@section('title', 'Course')

@section('content')
    <div class="flex justify-between ">
        <h1 class="font-medium text-base sm:text-lg sm:text-2xl">Admin Course</h1>
        <img src="{{ asset('assets/author-img.png') }}" alt="" class="size-7 sm:size-10 rounded-full">
    </div>
    <x-button class="text-white mt-6" href="/admin/course/add">
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
            <div class="py-4 px-5 flex flex-col gap-3 justify-between h-full bg-[#F6F2FF] border-2 border-[#8650FF] rounded-2xl">
                <div class="flex flex-col gap-3">
                    <div class="">
                        <h2 class="font-medium text-xl sm:text-2xl">{{ $course->title }}</h2>
                        <div class="flex gap-1 text-sm sm:text-base">
                            <p class="text-[#AAAAB3]">By<span class="text-primary"> {{ $course->user->name }}</span></p>
                            <p>|</p>
                            <p class="text-[#AAAAB3]">{{ $course->created_at->format(' d F Y') }}</p>
                        </div>
                    </div>
                    <p class="text-sm sm:text-base text-slate-600">{{ $course->description }}</p>
                </div>
                <div class="flex gap-2.5 sm:gap-4">
                    <a href="" class="text-primary text-base flex gap-1.5 items-center"><svg
                            xmlns="http://www.w3.org/2000/svg" class="fill-primary size-4"
                            viewBox="0 0 512 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                            <path
                                d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0-201.4 201.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3 448 192c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 96C35.8 96 0 131.8 0 176L0 432c0 44.2 35.8 80 80 80l256 0c44.2 0 80-35.8 80-80l0-80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 80c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l80 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 96z" />
                        </svg><span>view</span>
                    </a>
                    <a href="" class="text-primary text-base flex gap-1.5 items-center"><svg
                            xmlns="http://www.w3.org/2000/svg" class="size-4 fill-primary"
                            viewBox="0 0 512 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                            <path
                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                        </svg><span>edit</span>
                    </a>
                    <a href="" class="text-primary text-base flex gap-1.5 items-center"><svg
                            xmlns="http://www.w3.org/2000/svg" class="size-4 fill-primary"
                            viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                            <path
                                d="M136.7 5.9C141.1-7.2 153.3-16 167.1-16l113.9 0c13.8 0 26 8.8 30.4 21.9L320 32 416 32c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 8.7-26.1zM32 144l384 0 0 304c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-304zm88 64c-13.3 0-24 10.7-24 24l0 192c0 13.3 10.7 24 24 24s24-10.7 24-24l0-192c0-13.3-10.7-24-24-24zm104 0c-13.3 0-24 10.7-24 24l0 192c0 13.3 10.7 24 24 24s24-10.7 24-24l0-192c0-13.3-10.7-24-24-24zm104 0c-13.3 0-24 10.7-24 24l0 192c0 13.3 10.7 24 24 24s24-10.7 24-24l0-192c0-13.3-10.7-24-24-24z" />
                        </svg><span>delete</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
