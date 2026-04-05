@extends('layouts.guest-layout')

@section('title', 'Contact')

@section('content')
    <section class="w-full flex flex-col items-center">
        <h1 class="font-bold text-4xl sm:text-5xl text-center w-full sm:w-[400px]">Any Question ? Let’s <span class="text-primary">Talk</span></h1>
        <p class="text-lg sm:text-xl text-[#999999] text-center mt-8 w-full sm:w-[85%] md:w-[70%] lg:w-[50%]">Tim kami selalu siap membantumu. Kirimkan pesan atau
            pertanyaan seputar platform Learnify, dan kami akan segera
            membalasnya.</p>
        <form method="POST" action="{{ route('contact.post') }}" class="flex flex-col gap-6 mt-20 w-full md:w-[90%]">
            @csrf
            <x-input label="Name" name="name" placeholder="Enter your name" :required="true" />
            <x-input label="Username" name="username" placeholder="Enter your username" :required="true" />
            <x-input label="Email" name="email" type="email" placeholder="Enter your email" :required="true" />
            <div class="flex flex-col">
                <label for="message">Message</label>
                <textarea name="message" id="message" placeholder="Enter your message" class="bg-white border-2" cols="30"
                    rows="10"></textarea>
                @error('message')
                    <p class="text-xs text-red-500 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-red-500" viewBox="0 0 640 640">
                            <path
                                d="M320 64C177.8 64 64 177.8 64 320C64 462.2 177.8 576 320 576C462.2 576 576 462.2 576 320C576 177.8 462.2 64 320 64zM320 192C337.7 192 352 206.3 352 224L352 320C352 337.7 337.7 352 320 352C302.3 352 288 337.7 288 320L288 224C288 206.3 302.3 288 320 192zM352 416C352 433.7 337.7 448 320 448C302.3 448 288 433.7 288 416C288 398.3 302.3 384 320 384C337.7 384 352 398.3 352 416z" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <x-button buttonType="submit">Login</x-button>
        </form>
    </section>
@endsection
