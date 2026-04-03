@extends('layouts.admin-layout')

@section('title', 'Dashboard')

@section('content')
    <div class="flex justify-between">
        <h1 class="font-medium text-base sm:text-lg sm:text-2xl">Admin Dasboard</h1>
        <img src="{{ asset('assets/author-img.png') }}" alt="" class="size-7 sm:size-10 rounded-full">
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
                <p class="font-medium text-sm sm:text-lg md:text-2xl lg:text-4xl text-center md:text-left md:ml-10">{{ $totalUsers }}</p>
            </div>
            <div class="flex flex-col gap-1 sm:gap-2.5 bg-[#ECE9FC] px-1 py-2 sm:p-3 md:w-38 lg:w-[232px] rounded-xl">
                <div class="flex gap-3 items-center">
                    <img src="{{ asset('assets/icon_total_user.png') }}" alt=""
                        class="hidden md:block size-5 lg:size-7">
                    <p class="text-[8px] sm:text-sm lg:text-base text-center md:text-left w-full">Total Courses</p>
                </div>
                <p class="font-medium text-sm sm:text-lg md:text-2xl lg:text-4xl text-center md:text-left md:ml-10">{{ $totalCourses }}</p>
            </div>
            <div class="flex flex-col gap-1 sm:gap-2.5 bg-[#ECE9FC] px-1 py-2 sm:p-3 md:w-38 lg:w-[232px] rounded-xl">
                <div class="flex gap-3 items-center">
                    <img src="{{ asset('assets/icon_total_user.png') }}" alt=""
                        class="hidden md:block size-5 lg:size-7">
                    <p class="text-[8px] sm:text-sm lg:text-base text-center md:text-left w-full">Total Categories</p>
                </div>
                <p class="font-medium text-sm sm:text-lg md:text-2xl lg:text-4xl text-center md:text-left md:ml-10">{{ $totalCategories }}</p>
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
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-2 sm:px-4 py-4 font-medium">{{ $user->name }}</td>
                        <td class="px-2 sm:px-4 py-4 text-gray-400">{{ $user->email }}</td>
                        <td class="px-2 sm:px-4 py-4">{{ $user->role }}</td>
                        <td class="px-2 sm:px-4 py-4">
                            <a href="" class="hover:text-purple-600 transition font-medium">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-center py-5 md:py-11.5">
            <x-button type="admin">View All</x-button>
        </div>
    </div>
@endsection
