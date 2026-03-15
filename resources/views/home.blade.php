@extends('layouts.guest-layout')

@section('title', 'Home')

@section('content')
    <section class="flex justify-center lg:justify-between items-center">
        <div class="flex flex-col w-full lg:w-[45%] gap-10">
            <h2 class="text-4xl md:text-5xl font-bold \">The Future of Learning Starts Here</h2>
            <div class="flex flex-col
                gap-6 w-full md:w-[80%]">
                <p class="text-xl">An online hub for learning technology, offering courses that guide you from basic concepts
                    to advanced
                    development skills.</p>
                <p class="text-xl">An online hub for learning technology, offering courses that guide you from basic concepts to advanced
                    development skills.

                    Whether you're interested in coding, web development, or software design, our platform provides clear
                    lessons and practical exercises to support your learning journey.</p>
        </div>
        <div class="">
            <x-button href="/register" size="large">Get Started</x-button>
        </div>
        </div>
        <div class="w-[45%] hidden lg:block">
            <img src="{{ asset('assets/main-image.png') }}" alt="Main Image" class="w-full">
        </div>
    </section>

    <section class="bg-[#DCE7FF] rounded-[38px] flex justify-between p-4 sm:p-8 md:p-14 mt-15 sm:mt-20">
        <div class="flex items-center gap-1.5 sm:gap-3.5">
            <div class="size-13 sm:size-16 md:size-21 bg-white flex justify-center items-center rounded-[18px]">
                <img src="{{ asset('assets/teacher.png') }}" alt="" class="size-6 sm:size-10 md:size-13">
            </div>
            <div class="flex flex-col">
                <h2 class="font-semibold text-base sm:text-xl md:text-3xl text-primary">500+</h2>
                <p class="text-[9px] sm:text-xs md:text-base text-[#736C6C]">Expert Teacher</p>
            </div>
        </div>
        <div class="flex items-center gap-1.5 sm:gap-3.5">
            <div class="size-13 sm:size-16 md:size-21 bg-white flex justify-center items-center rounded-[18px]">
                <img src="{{ asset('assets/student.png') }}" alt="" class="size-6 sm:size-10 md:size-13">
            </div>
            <div class="flex flex-col">
                <h2 class="font-semibold text-base sm:text-xl md:text-3xl text-primary">500+</h2>
                <p class="text-[9px] sm:text-xs md:text-base text-[#736C6C]">Students Globally</p>
            </div>
        </div>
        <div class="flex items-center gap-1.5 sm:gap-3.5">
            <div class="size-13 sm:size-16 md:size-21 bg-white flex justify-center items-center rounded-[18px]">
                <img src="{{ asset('assets/class.png') }}" alt="" class="size-6 sm:size-10 md:size-13">
            </div>
            <div class="flex flex-col">
                <h2 class="font-semibold text-base sm:text-xl md:text-3xl text-primary">500+</h2>
                <p class="text-[9px] sm:text-xs md:text-base text-[#736C6C]">Courses</p>
            </div>
        </div>
    </section>

    <section class="flex flex-col mt-15 sm:mt-20">
        <div class="flex justify-center">
            <h1 class="text-3xl md:text-[40px] font-semibold text-white bg-primary px-5 py-2 text-center rounded-lg">TOP COURSES
            </h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 mt-15 sm:mt-20 justify-between gap gap-16">
            <x-card />
            <x-card />
            <x-card />
            <x-card />
        </div>
    </section>
@endsection
