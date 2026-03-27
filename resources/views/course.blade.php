@extends('layouts.guest-layout')

@section('title', 'Course')

@section('content')
    <section class="flex flex-col gap-3 w-full">
        <h1 class="font-bold text-4xl">All Course</h1>
        <form action="" method="GET" class="flex gap-3">
            @csrf
            <x-input name="search" placeholder="Search for course" type="search"/>
            <x-button>Search</x-button>
        </form>
    </section>

    <section class="flex gap-4 mt-5">
        <x-button type="category">Java</x-button>
        <x-button type="category">Javascript</x-button>
        <x-button type="category">Python</x-button>
        <x-button type="category">C</x-button>
        <x-button type="category">PHP</x-button>
    </section>

    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 my-15 sm:my-20 justify-between gap gap-16">
        <x-card />
    </section>
@endsection
