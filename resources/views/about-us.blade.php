@extends('layouts.guest-layout')

@section('title', 'About Us')

@section('content')
    <section class="">
        <h1 class="font-bold text-2xl sm:text-4xl lg:text-5xl w-full sm:w-[90%] lg:w-165">Belajar Lebih Mudah, Masa Depan
            Lebih <span class="text-primary">Cerah</span>
        </h1>
        <p class="text-base sm:text-xl w-full md:w-[70%] mt-8">Learnify adalah platform belajar online yang dirancang agar
            siapa pun bisa
            mengakses ilmu berkualitas — kapan saja dan di mana saja.</p>
        <div class="">
            <div class="mt-15 sm:mt-23 grid grid-cols-2 sm:grid-cols-4 justify-between gap-5 md:gap-10 lg:gap-20">
                <div
                    class="bg-white border-2 border-gray-200 rounded-xl shadow-xl px-4 py-6 flex flex-col justify-center items-center">
                    <h2 class="text-primary font-bold text-3xl lg:text-5xl">500</h2>
                    <p class="text-[#717182] text-sm lg:text-xl">Pelajar aktif</p>
                </div>
                <div
                    class="bg-white border-2 border-gray-200 rounded-xl shadow-xl px-4 py-6 flex flex-col justify-center items-center">
                    <h2 class="text-primary font-bold text-3xl lg:text-5xl">50+</h2>
                    <p class="text-[#717182]  text-sm lg:text-xl">Categories</p>
                </div>
                <div
                    class="bg-white border-2 border-gray-200 rounded-xl shadow-xl px-4 py-6 flex flex-col justify-center items-center">
                    <h2 class="text-primary font-bold text-3xl lg:text-5xl">30+</h2>
                    <p class="text-[#717182]  text-sm lg:text-xl">Courses</p>
                </div>
                <div
                    class="bg-white border-2 border-gray-200 rounded-xl shadow-xl px-4 py-6 flex flex-col justify-center items-center">
                    <h2 class="text-primary font-bold text-3xl lg:text-5xl">95%</h2>
                    <p class="text-[#717182]  text-sm lg:text-xl">Kepuasan</p>
                </div>
            </div>
        </div>
        <hr class="mt-15 md:mt-38 border-[#717182]">
    </section>
    <section class="mt-10">
        <h1 class="font-bold text-2xl sm:text-5xl text-center md:text-left">Cerita Kami</h1>
        <p class="mt-5 sm:mt-15 text-base sm:text-xl w-full md:w-[75%] text-justify sm:text-left">Learnify lahir dari satu
            keresahan sederhana: banyak orang ingin belajar hal baru,
            tapi terhalang biaya mahal atau konten yang sulit dipahami.</p>
        <p class="mt-5 sm:mt-15 text-base sm:text-xl w-full md:w-[75%] text-justify sm:text-left">Kami membangun platform
            ini agar belajar terasa menyenangkan — dengan materi teks
            yang jelas, video yang mudah diikuti, dan quiz interaktif di setiap akhir topik.</p>
        <hr class="mt-15 md:mt-20 border-[#717182]">
    </section>
    <section class="flex flex-col items-center mt-10">
        <h1 class="font-bold text-2xl sm:text-5xl">Nilai Plus Kami</h1>
        <div class="flex flex-col gap-7 mt-10 md:mt-18">
            <div class="flex gap-2 sm:gap-5 items-center px-3 sm:px-7.5 py-4 bg-white border-2 border-gray-200 rounded-xl shadow-xl">
                <div class="bg-[#E3E6FB] p-1.5 rounded-xl shadow-xl">
                    <img src="{{ asset('assets/globe.png') }}" alt="" class="size-5 sm:size-13">
                </div>
                <h2 class="font-bold text-lg sm:text-4xl text-[#424071]">Akses lebih mudah</h1>
            </div>
            <div class="flex gap-2 sm:gap-5 items-center px-3 sm:px-7.5 py-4 bg-white border-2 border-gray-200 rounded-xl shadow-xl">
                <div class="bg-[#E3E6FB] p-1.5 rounded-xl shadow-xl">
                    <img src="{{ asset('assets/lamp.png') }}" alt="" class="size-5 sm:size-13">
                </div>
                <h2 class="font-bold text-lg sm:text-4xl text-[#424071]">Belajar lebih mudah</h1>
            </div>
            <div class="flex gap-2 sm:gap-5 items-center px-3 sm:px-7.5 py-4 bg-white border-2 border-gray-200 rounded-xl shadow-xl">
                <div class="bg-[#E3E6FB] p-1.5 rounded-xl shadow-xl">
                    <img src="{{ asset('assets/rocket.png') }}" alt="" class="size-5 sm:size-13">
                </div>
                <h2 class="font-bold text-lg sm:text-4xl text-[#424071]">Materi up to date</h1>
            </div>
        </div>
    </section>
    <hr class="mt-20 border-[#717182]">
    <section class="flex flex-col items-center mt-10">
        <h1 class="font-bold text-2xl sm:text-5xl">Tim Kami</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 lg:gap-20 mt-10 sm:mt-25">
            <div class="bg-[#F5F5F5] rounded-xl shadow-xl flex gap-4.5 items-center px-6 py-8">
                <img src="{{ asset('assets/author-img.png') }}" alt="" class="size-15 lg:size-20 rounded-full">
                <div class="">
                    <h3 class="font-bold text-lg sm:text-xl lg:text-2xl">Surya Nanda</h3>
                    <p class="text-primary text-base sm:text-lg lg:text-xl">Founder & CEO</p>
                </div>
            </div>
            <div class="bg-[#F5F5F5] rounded-xl shadow-xl flex gap-4.5 items-center px-6 py-8">
                <img src="{{ asset('assets/author-img.png') }}" alt="" class="size-15 lg:size-20 rounded-full">
                <div class="">
                    <h3 class="font-bold text-lg sm:text-xl lg:text-2xl">Anargya</h3>
                    <p class="text-primary text-base sm:text-lg lg:text-xl">Founder & CEO</p>
                </div>
            </div>
            <div class="bg-[#F5F5F5] rounded-xl shadow-xl flex gap-4.5 items-center px-6 py-8">
                <img src="{{ asset('assets/author-img.png') }}" alt="" class="size-15 lg:size-20 rounded-full">
                <div class="">
                    <h3 class="font-bold text-lg sm:text-xl lg:text-2xl">Kartika</h3>
                    <p class="text-primary text-base sm:text-lg lg:text-xl">Founder & CEO</p>
                </div>
            </div>
            <div class="bg-[#F5F5F5] rounded-xl shadow-xl flex gap-4.5 items-center px-6 py-8">
                <img src="{{ asset('assets/author-img.png') }}" alt="" class="size-15 lg:size-20 rounded-full">
                <div class="">
                    <h3 class="font-bold text-lg sm:text-xl lg:text-2xl">Gina</h3>
                    <p class="text-primary text-base sm:text-lg lg:text-xl">Founder & CEO</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-4 items-center mt-15 sm:mt-30 bg-primary rounded-2xl py-6 px-3 sm:px-15 md:px-30">
            <h2 class="font-bold text-2xl sm:text-4xl text-white text-center">Siap Mulai Belajar?</h2>
            <p class="text-base sm:text-xl sm:w-[448px] text-center text-white">Bergabung dengan ratusan pelajar yang sudah
                merasakan
                manfaat Learnify.</p>
            <x-button size='very-large' type='course' href='/register'>Mulai Belajar!</x-button>
        </div>
    </section>
@endsection
