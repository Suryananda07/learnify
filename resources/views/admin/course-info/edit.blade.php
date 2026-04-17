@extends('layouts.admin-layout')

@section('title', 'Edit Course')

@section('content')
    @php
        $topicsData = old('title_topic')
            ? collect(old('title_topic'))
                ->map(
                    fn($title, $i) => [
                        'title' => $title,
                        'content' => old('content_topic')[$i] ?? '',
                    ],
                )
                ->values()
            : $course->topics
                ->map(
                    fn($topic) => [
                        'title' => $topic->title,
                        'content' => $topic->content,
                    ],
                )
                ->values();

        $questionsData = old('questions')
            ? collect(old('questions'))->values()
            : $course->quizQuestions
                ->map(
                    fn($q) => [
                        'question' => $q->question,
                        'options' => [$q->option_a, $q->option_b, $q->option_c, $q->option_d],
                        'correct' => $q->correct_answer,
                    ],
                )
                ->values();
    @endphp
    <div x-data='{
        topics: @json($topicsData),
        questions: @json($questionsData)
    }'
        class="flex flex-col">
        <div class="flex justify-between ">
            <h1 class="font-medium text-base sm:text-lg sm:text-2xl">Add Course</h1> <img
                src="{{ asset('assets/author-img.png') }}" alt="" class="size-7 sm:size-10 rounded-full">
        </div>
        <form method="POST" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data"
            class="flex flex-col gap-4 mt-8">
            @csrf
            @method('PUT')
            <h2 class="text-lg font-semibold">Title</h2>
            <x-input name="title" placeholder="Enter Course Title" :required="true"
                value="{{ old('title', $course->title) }}" />
            <h2 class="text-lg font-semibold">Description</h2>
            <textarea name="description" id="" rows="10" placeholder="Enter description course"
                class="w-full px-4 py-2.5 rounded-[10px] border text-sm outline-none transition-all duration-300 border-gray-300 bg-white focus:border-primary focus:ring-2 focus:ring-primary/20">{{ old('description', $course->description) }}
            </textarea>
            <h2 class="text-lg font-semibold">Link video materi</h2>
            <x-input name="url_video" placeholder="Enter url video" type="url" :required="true"
                value="{{ old('url_video', $course->url_video) }}" />
            <h2 class="text-lg font-semibold">Tips</h2>
            <textarea name="tips" id="" rows="10" placeholder="Enter tips course"
                class="w-full px-4 py-2.5 rounded-[10px] border text-sm outline-none transition-all duration-300 border-gray-300 bg-white focus:border-primary focus:ring-2 focus:ring-primary/20">{{ old('tips', $course->tips) }}
            </textarea>
            <h2 class="text-lg font-semibold">Duration video (minutes)</h2>
            <x-input name="duration_video" placeholder="Enter duration video" type="number" :required="true"
                value="{{ old('duration_video', $course->duration_video) }}" />
            <h2 class="text-lg font-semibold">Duration lessons (minutes)</h2>
            <x-input name="duration_lesson" placeholder="Enter duration lessons" type="number" :required="true"
                value="{{ old('duration_lesson', $course->duration_lesson) }}" />
            <h2 class="text-lg font-semibold">Image course</h2>
            <x-input name="image" type="file" />
            <div class="flex flex-col">
                <h2 class="text-lg font-semibold">Category Course</h2>
                <select name="category_id" id=""
                    class="'w-full px-4 py-2.5 rounded-[10px] border text-sm outline-none transition-all duration-300' border-gray-300 bg-white focus:border-primary focus:ring-2 focus:ring-primary/20'w-full px-4 py-2.5 rounded-[10px] border text-sm outline-none transition-all duration-300' ">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected($category->id == $course->category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-3">Content</h2> <template x-for="(topic, index) in topics"
                    :key="index">
                    <div class="flex flex-col gap-3 border pt-6 p-4 rounded-lg relative mb-4">
                        <button type="button" x-show="topics.length > 1" @click="topics.splice(index, 1)"
                            class="absolute -top-3 left-1/2 -translate-x-1/2 bg-white border rounded-full w-8 h-8 flex items-center justify-center shadow text-red-500 hover:bg-red-100">
                            &minus;
                        </button>
                        <input type="text" :name="'title_topic[' + index + ']'" placeholder="Enter Topic Title"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                            x-model="topic.title">
                        <textarea :name="'content_topic[' + index + ']'" placeholder="Enter Content Topic" rows="10"
                            class="w-full px-4 py-2.5 rounded-[10px] border text-sm outline-none transition-all duration-300 border-gray-300 bg-white focus:border-primary focus:ring-2 focus:ring-primary/20"
                            x-model="topic.content">
                        </textarea>
                    </div>
                </template>
                <x-button buttonType="button" class="text-white" @click="topics.push({ title: '', content: '' })"> <x-slot:icon> <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" viewBox="0 0 448 512">
                            <path
                                d="M256 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 160-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0 0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160 160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0 0-160z" />
                        </svg> </x-slot:icon> Add Subtopic </x-button>
                <div class="space-y-6 mt-8">
                    <h2 class="text-lg font-semibold">Quiz Questions</h2> <template x-for="(q, qIndex) in questions"
                        :key="qIndex">
                        <div class="border pt-6 p-4 rounded-lg space-y-4 relative">
                            <button type="button" x-show="questions.length > 1" @click="questions.splice(qIndex, 1)"
                                class="absolute -top-3 left-1/2 -translate-x-1/2 bg-white border rounded-full w-8 h-8 flex items-center justify-center shadow text-red-500 hover:bg-red-100">
                                &minus; </button>
                            <input type="text" :name="'questions[' + qIndex + '][question]'" placeholder="Question"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                                x-model="q.question">
                            <div class="space-y-3"> <template x-for="(opt, oIndex) in q.options" :key="oIndex">
                                    <label
                                        class="flex items-center gap-3 border border-gray-300 rounded-lg px-4 py-2 cursor-pointer hover:border-purple-500 transition">
                                        <input type="radio" :name="'questions[' + qIndex + '][correct]'"
                                            :value="oIndex" x-model="q.correct" class="accent-purple-600"> <input
                                            type="text" :name="'questions[' + qIndex + '][options][' + oIndex + ']'"
                                            :placeholder="'Option ' + String.fromCharCode(65 + oIndex)"
                                            class="w-full outline-none bg-transparent" x-model="q.options[oIndex]"> </label>
                                </template> </div>
                        </div>
                    </template>
                    <x-button buttonType="button" class="text-white"
                        @click="questions.push({ question: '', options: ['', '', '', ''], correct: null })"> <x-slot:icon> <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" viewBox="0 0 448 512">
                                <path
                                    d="M256 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 160-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0 0 160c0 17.7 0 32 32 32s32-14.3 32-32l0-160 160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0 0-160z" />
                            </svg> </x-slot:icon> Add Question </x-button>
                </div>
                <div class="flex justify-end"> <x-button size="large" buttonType="submit"> Save </x-button> </div>
        </form>
    </div>
@endsection
