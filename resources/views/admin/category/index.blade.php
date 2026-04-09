@extends('layouts.admin-layout')

@section('title', 'Category')

@section('content')
    <div>
        <div class="flex justify-between">
            <h1 class="font-medium text-base sm:text-lg sm:text-2xl">Users</h1>
            <a href="{{ route('profiles.edit', auth()->id()) }}">
                <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('assets/author-img.png') }}"
                    alt="" class="size-10 rounded-full">
            </a>
        </div>
        <p class="mt-10 text-[#717182] text-xs sm:text-base">Admin > Categories</p>
        <div class="mt-11">
            <h2 class="font-medium text-xl">Add Categories</h2>
            <div class="flex gap-3 items-start w-full mt-2">
                <form action="{{ route('category') }}" method="POST" class="flex gap-3 flex-1">
                    @csrf
                    <x-input name="name" placeholder="add name category" />
                    <x-button buttonType="submit">Add</x-button>
                </form>
            </div>
        </div>
        <div class="mt-8.5 bg-white rounded-lg shadow-2xl px-3 md:px-7 pt-3">
            <table class="w-full text-[8px] md:text-xs lg:text-sm mt-4">
                <thead>
                    <tr class="bg-[#ECE9FC] rounded-xl">
                        <th class="text-left px-2 sm:px-4 py-3 font-medium rounded-l-xl">Name</th>
                        <th class="text-left px-2 sm:px-4 py-3 font-medium">Total Course</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($categories as $category)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-2 sm:px-4 py-4 font-medium">{{ $category->name }}</td>
                            <td class="px-2 sm:px-4 py-4 text-gray-400">{{ $category->courses_count }} Course</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
