@extends('layouts.layout')

@section('title', 'Register')

@section('content')
    <section class="mt-15 md:mt-0 flex flex-col md:flex-row justify-center items-center gap-10 w-screen h-full">
        <div class="w-[90%] md:w-[45%] bg-white shadow-2xl rounded-xl flex flex-col gap-6 px-8 py-6">
            <div class="flex justify-center">
                <h1 class="font-semibold text-4xl text-center w-[50%]">Welcome Back To Learn<span
                        class="text-primary">ify</span></h1>
            </div>
            <form action="POST" action="{{ route('register.post') }}" class="flex flex-col gap-6">
                @csrf
                <x-input label="Nama" name="name" placeholder="Enter your fullname" :required="true" />
                <x-input label="Password" name="password" type="password" placeholder="Enter your password"
                    :required="true" /> 
                <x-button>Login</x-button>

            </form>
        </div>
        <div class="flex flex-col gap-7 p-8.5 w-[90%] md:w-[45%] bg-primary rounded-xl text-white">
            <div class="w-fit rounded-2xl bg-[#9999]">
                <p class="text-xs sm:text-base font-bold px-10 py-1">Platform Belajar #1 Indonesia</p>
            </div>
            <h1 class="flex flex-col text-[32px] font-bold w-[50%]"><span>Tingkatkan Skill,</span><span
                    class="text-learnify-yellow">Raih Karier</span><span>Impianmu</span></h1>
            <p class="text-base font-bold">Bergabung bersama ribuan pelajar yang sudah membuktikan manfaat belajar di
                Learnify. Mulai dari dasar hingga tingkat lanjutan.</p>
            <div class="flex justify-evenly gap-5">
                <div class="w-36 h-24 bg-[#9999] flex flex-col items-center justify-center rounded-2xl">
                    <h2 class="font-bold text-2xl lg:text-[32px] text-center">500+</h2>
                    <p class="font-bold text-[10px] text-center">Expert Teacher</p>
                </div>
                <div class="w-36 h-24 bg-[#9999] flex flex-col items-center justify-center rounded-2xl">
                    <h2 class="font-bold text-2xl lg:text-[32px] text-center">500+</h2>
                    <p class="font-bold text-[10px] text-center">Student Globally</p>
                </div>
                <div class="w-36 h-24 bg-[#9999] flex flex-col items-center justify-center rounded-2xl">
                    <h2 class="font-bold text-2xl lg:text-[32px] text-center">500+</h2>
                    <p class="font-bold text-[10px] text-center">Courses</p>
                </div>
            </div>
        </div>
    </section>
@endsection
