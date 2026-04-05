@extends('layouts.admin-layout')

@section('title', 'User')

@section('content')
    <div class="flex justify-between">
        <h1 class="font-medium text-base sm:text-lg sm:text-2xl">Edit User</h1>
        <img src="{{ asset('assets/author-img.png') }}" alt="" class="size-7 sm:size-10 rounded-full">
    </div>
    <p class="mt-10 text-[#717182] text-xs sm:text-base">Admin > Users >edit</p>
    <div class="mt-11 w-[80%]">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col gap-4">
            @csrf
            @method('PUT')
            <x-input label="Name" name="name" placeholder="Name" value="{{ old('name', $user->name) }}" />
            <x-input label="Username" name="username" placeholder="Username"
                value="{{ old('username', $user->username) }}" />
            <x-input label="Email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" readonly
                class="cursor-not-allowed bg-gray-600" />
            <x-input label="Profile picture" name="image" placeholder="Input profile picture" type="file" />
            <div class="flex flex-col gap-2">
                <label for="" class="text-gray-600 text-base">Role</label>
                <select name="role" id=""
                    class="'w-full px-4 py-2.5 rounded-[10px] border border-gray-300 text-sm outline-none transition-all duration-300',">
                    <option value="user" @selected($user->role == 'user')>User</option>
                    <option value="admin" @selected($user->role == 'admin')>Admin</option>
                </select>
            </div>
            <div class="flex gap-3">
                <x-button buttonType="submit">Submit</x-button>
            </div>
        </form>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="mt-3">
            @csrf
            @method('DELETE')
            <x-button buttonType="submit" class="bg-red-600 border-red-600">Delete</x-button>
        </form>
        @if (session('error'))
            <p class="mt-3 text-2xl font-bold">{{ session('error') }}</p>
        @endif
    </div>
@endsection
