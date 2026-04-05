@extends('layouts.admin-layout')

@section('title', 'Dashboard')

@section('content')
    <div class="flex justify-between">
        <h1 class="font-medium text-base sm:text-lg sm:text-2xl">Admin Dasboard</h1>
        <a href="{{ route('profiles.edit', auth()->id()) }}">
            <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('assets/author-img.png') }}"
                alt="" class="size-10 rounded-full">
        </a>
    </div>
    <div class="mt-10">
        <p class="text-[#717182] text-xs sm:text-base">Admin > Dashboard</p>
        <div class="flex mt-5 gap-4">
            <div class="flex flex-col gap-1 sm:gap-2.5 bg-[#ECE9FC] px-1 py-2 sm:p-3 md:w-38 lg:w-[232px] rounded-xl">
                <div class="flex gap-3 items-center">
                    <img src="{{ asset('assets/icon_total_user.png') }}" alt=""
                        class="hidden md:block size-5 lg:size-7">
                    <p class="text-[8px] sm:text-sm lg:text-base text-center md:text-left w-full">Total Users</p>
                </div>
                <p class="font-medium text-sm sm:text-lg md:text-2xl lg:text-4xl text-center md:text-left md:ml-10">
                    {{ $totalUsers }}</p>
            </div>
            <div class="flex flex-col gap-1 sm:gap-2.5 bg-[#ECE9FC] px-1 py-2 sm:p-3 md:w-38 lg:w-[232px] rounded-xl">
                <div class="flex gap-3 items-center">
                    <img src="{{ asset('assets/icon_total_user.png') }}" alt=""
                        class="hidden md:block size-5 lg:size-7">
                    <p class="text-[8px] sm:text-sm lg:text-base text-center md:text-left w-full">Total Courses</p>
                </div>
                <p class="font-medium text-sm sm:text-lg md:text-2xl lg:text-4xl text-center md:text-left md:ml-10">
                    {{ $totalCourses }}</p>
            </div>
            <div class="flex flex-col gap-1 sm:gap-2.5 bg-[#ECE9FC] px-1 py-2 sm:p-3 md:w-38 lg:w-[232px] rounded-xl">
                <div class="flex gap-3 items-center">
                    <img src="{{ asset('assets/icon_total_user.png') }}" alt=""
                        class="hidden md:block size-5 lg:size-7">
                    <p class="text-[8px] sm:text-sm lg:text-base text-center md:text-left w-full">Total Categories</p>
                </div>
                <p class="font-medium text-sm sm:text-lg md:text-2xl lg:text-4xl text-center md:text-left md:ml-10">
                    {{ $totalCategories }}</p>
            </div>
        </div>
    </div>
    <div class="mt-8.5 bg-white rounded-lg shadow-2xl px-3 md:px-7 pt-3">
        <h3 class="font-medium text-sm">User Management</h3>
        <table class="w-full text-[8px] md:text-xs lg:text-sm mt-4">
            <thead>
                <tr class="bg-[#ECE9FC] rounded-xl">
                    <th class="text-left px-2 sm:px-4 py-3 font-medium rounded-l-xl">Name</th>
                    <th class="text-left px-2 sm:px-4 py-3 font-medium">Email</th>
                    <th class="text-left px-2 sm:px-4 py-3 font-medium">Role</th>
                    <th class="text-left px-2 sm:px-4 py-3 font-medium rounded-r-xl">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($allUsers as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-2 sm:px-4 py-4 font-medium">{{ $user->name }}</td>
                        <td class="px-2 sm:px-4 py-4 text-gray-400">{{ $user->email }}</td>
                        <td class="px-2 sm:px-4 py-4">{{ $user->role }}</td>
                        <td class="px-2 sm:px-4 py-4">
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="hover:text-purple-600 transition font-medium">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-center py-5 md:py-11.5">
            @if (request('view') === 'all')
                <a href="{{ route('dashboard', ['role' => request('role')]) }}">
                    <x-button type="admin">Show Less</x-button>
                </a>
            @else
                <a href="{{ route('dashboard', ['role' => request('role'), 'view' => 'all']) }}">
                    <x-button type="admin">Show All</x-button>
                </a>
            @endif
        </div>
    </div>
@endsection
