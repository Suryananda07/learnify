@extends('layouts.layout')

@section('title', 'Edit Profile')

@section('content')
    <div class="w-screen h-screen flex justify-center items-center">
        <div class="flex flex-col gap-6 w-[70%]">
            <h1 class="text-center font-bold text-3xl">Edit Profile</h1>
            <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col gap-4">
                @csrf
                @method('PUT')
                <x-input label="Name" name="name" placeholder="Name" value="{{ old('name', $profile->name) }}" />
                <x-input label="Username" name="username" placeholder="Username"
                    value="{{ old('username', $profile->username) }}" />
                <x-input label="Email" name="email" placeholder="Email" value="{{ old('email', $profile->email) }}" readonly
                    class="cursor-not-allowed bg-gray-600" />
            <x-input label="Profile picture" name="image" type="file" />
                <div class="flex gap-3">
                    <x-button buttonType="submit">Submit</x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
