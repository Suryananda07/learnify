@extends('layouts.admin-layout')

@section('title', 'User')

@section('content')
    <div class="flex justify-between">
        <h1 class="font-medium text-base sm:text-lg sm:text-2xl">Users</h1>
        <img src="{{ asset('assets/author-img.png') }}" alt="" class="size-7 sm:size-10 rounded-full">
    </div>
    <p class="mt-10 text-[#717182] text-xs sm:text-base">Admin > Users</p>
    <div class="mt-11">
        <h2 class="font-medium text-xl">Manage Users</h2>
        <div class="flex gap-3 items-start w-full">
            <form action="" method="GET" class="flex gap-3 flex-1">
                @csrf
                <x-input name="search" placeholder="Search for course" type="search" />
                <x-button>Search</x-button>
            </form>
            <div x-data="{ open: false }" class="">
                <x-button @click="open = !open" type="outline" size="base" class="focus:bg-primary focus:text-white">All
                    User
                    <x-slot:icon><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                            <path
                                d="M169.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 306.7 54.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                        </svg></x-slot:icon>
                </x-button>
                <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                    class="flex flex-col gap-3 pt-3 bg-white rounded-lg shadow-xl">
                    <ul class="text-center">
                        <li class="">All User</li>
                        <li>Admin</li>
                        <li>User</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8.5 bg-white rounded-lg shadow-2xl px-3 md:px-7 pt-3">
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
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-2 sm:px-4 py-4 font-medium">helo</td>
                    <td class="px-2 sm:px-4 py-4 text-gray-400">hai</td>
                    <td class="px-2 sm:px-4 py-4">kamu</td>
                    <td class="px-2 sm:px-4 py-4">
                        <button class=hover:text-purple-600 transition font-medium">Edit</button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-2 sm:px-4 py-4 font-medium">helo</td>
                    <td class="px-2 sm:px-4 py-4 text-gray-400">hai</td>
                    <td class="px-2 sm:px-4 py-4">kamu</td>
                    <td class="px-2 sm:px-4 py-4">
                        <button class=hover:text-purple-600 transition font-medium">Edit</button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-2 sm:px-4 py-4 font-medium">helo</td>
                    <td class="px-2 sm:px-4 py-4 text-gray-400">hai</td>
                    <td class="px-2 sm:px-4 py-4">kamu</td>
                    <td class="px-2 sm:px-4 py-4">
                        <button class=hover:text-purple-600 transition font-medium">Edit</button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-2 sm:px-4 py-4 font-medium">helo</td>
                    <td class="px-2 sm:px-4 py-4 text-gray-400">hai</td>
                    <td class="px-2 sm:px-4 py-4">kamu</td>
                    <td class="px-2 sm:px-4 py-4">
                        <button class=hover:text-purple-600 transition font-medium">Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-center py-5 md:py-11.5">
            <x-button type="admin">View All</x-button>
        </div>
    </div>
@endsection
