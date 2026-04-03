@extends('layouts.admin-layout')

@section('title', 'Add Course')

@section('content')
<div x-data="{
    topics: [{ title: '', content: '' }],
    questions: [
        { question: '', options: ['', '', '', ''], correct: null }
    ]
}" class="flex flex-col">

    <div class="flex justify-between ">
        <h1 class="font-medium text-base sm:text-lg sm:text-2xl">Add Course</h1>
        <img src="{{ asset('assets/author-img.png') }}" alt="" class="size-7 sm:size-10 rounded-full">
    </div>

    <form method="POST" action="" class="flex flex-col gap-6 mt-8">
        @csrf

        <!-- ================= TITLE ================= -->
        <h2 class="text-lg font-semibold">Title</h2>
        <x-input name="title" placeholder="Enter Course Title" :required="true" />

        <!-- ================= TOPICS ================= -->
        <div>
            <h2 class="text-lg font-semibold mb-3">Content</h2>

            <template x-for="(topic, index) in topics" :key="index">
                <div class="flex flex-col gap-3 border pt-6 p-4 rounded-lg relative mb-4">

                    <!-- hapus topic -->
                    <button type="button"
                        x-show="topics.length > 1"
                        @click="topics.splice(index, 1)"
                        class="absolute -top-3 left-1/2 -translate-x-1/2 bg-white border rounded-full w-8 h-8 flex items-center justify-center shadow text-red-500 hover:bg-red-100">
                        &minus;
                    </button>

                    <input type="text"
                        :name="'title_topic[' + index + ']'"
                        placeholder="Enter Topic Title"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                        x-model="topic.title">

                    <input type="text"
                        :name="'content_topic[' + index + ']'"
                        placeholder="Enter Content Topic"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                        x-model="topic.content">
                </div>
            </template>

            <!-- tambah topic -->
            <x-button buttonType="button" class="text-white"
                @click="topics.push({ title: '', content: '' })">
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-white"
                        viewBox="0 0 448 512">
                        <path
                            d="M256 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 160-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0 0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160 160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0 0-160z" />
                    </svg>
                </x-slot:icon>
                Add Subtopic
            </x-button>
        </div>

        <!-- ================= QUIZ ================= -->
        <div class="space-y-6 mt-8">
            <h2 class="text-lg font-semibold">Quiz Questions</h2>

            <template x-for="(q, qIndex) in questions" :key="qIndex">
                <div class="border pt-6 p-4 rounded-lg space-y-4 relative">

                    <!-- hapus soal -->
                    <button type="button"
                        x-show="questions.length > 1"
                        @click="questions.splice(qIndex, 1)"
                        class="absolute -top-3 left-1/2 -translate-x-1/2 bg-white border rounded-full w-8 h-8 flex items-center justify-center shadow text-red-500 hover:bg-red-100">
                        &minus;
                    </button>

                    <!-- pertanyaan -->
                    <input type="text"
                        :name="'questions[' + qIndex + '][question]'"
                        placeholder="Question"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                        x-model="q.question">

                    <!-- options -->
                    <div class="space-y-3">
                        <template x-for="(opt, oIndex) in q.options" :key="oIndex">
                            <label
                                class="flex items-center gap-3 border border-gray-300 rounded-lg px-4 py-2 cursor-pointer hover:border-purple-500 transition">

                                <input type="radio"
                                    :name="'questions[' + qIndex + '][correct]'"
                                    :value="oIndex"
                                    x-model="q.correct"
                                    class="accent-purple-600">

                                <input type="text"
                                    :name="'questions[' + qIndex + '][options][' + oIndex + ']'"
                                    :placeholder="'Option ' + String.fromCharCode(65 + oIndex)"
                                    class="w-full outline-none bg-transparent"
                                    x-model="q.options[oIndex]">
                            </label>
                        </template>
                    </div>
                </div>
            </template>

            <!-- tambah soal -->
            <x-button buttonType="button" class="text-white"
                @click="questions.push({ question: '', options: ['', '', '', ''], correct: null })">
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-white"
                        viewBox="0 0 448 512">
                        <path
                            d="M256 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 160-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0 0 160c0 17.7 0 32 32 32s32-14.3 32-32l0-160 160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0 0-160z" />
                    </svg>
                </x-slot:icon>
                Add Question
            </x-button>
        </div>

        <!-- ================= ACTION ================= -->
        <div class="flex justify-end">
            <x-button size="large" buttonType="submit">
                Publish
            </x-button>
        </div>
    </form>
</div>
@endsection