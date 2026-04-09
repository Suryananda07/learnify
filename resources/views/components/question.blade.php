@props(['question', 'results' => null])

@php
    $options = [$question->option_a, $question->option_b, $question->option_c, $question->option_d];

    $labels = ['A', 'B', 'C', 'D'];

    $result = $results[$question->id] ?? null;
@endphp

<div class="p-5 md:px-10 md:py-6 bg-purple-100 rounded-xl flex flex-col gap-6">
    <div class="flex items-center gap-3 md:gap-6">
        <div class="flex justify-center items-center bg-white px-5 py-2 rounded-full">
            <p class="text-2xl md:text-3xl font-bold">{{ $question->order + 1 }}</p>
        </div>
        <p class="text-base md:text-xl">{{ $question->question }}</p>
    </div>
    <div class="flex flex-col gap-2">
        @foreach ($options as $index => $option)
            @php
                $isUserAnswer = $result && $result['user_answer'] == $index;
                $isCorrectAnswer = $result && $result['correct_answer'] == $index;

                $class = 'border-gray-300 bg-white';

                if ($result) {
                    if ($isCorrectAnswer) {
                        $class = 'border-green-500 bg-green-100';
                    } elseif ($isUserAnswer && !$result['is_correct']) {
                        $class = 'border-red-500 bg-red-100';
                    }
                }
            @endphp

            <label class="block mb-3 cursor-pointer">
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $index }}" class="hidden peer"
                    {{ $isUserAnswer ? 'checked' : '' }} {{ $results ? 'disabled' : '' }}>

                <div
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl border transition-all duration-200
            {{ $class }}
            {{ !$results ? 'hover:border-purple-300 hover:bg-gray-50 peer-checked:border-purple-500 peer-checked:bg-purple-100' : '' }}
        ">
                    <span class="font-semibold text-gray-700">{{ $labels[$index] }}</span>
                    <span class="text-gray-800">{{ $option }}</span>

                    @if ($result)
                        @if ($isCorrectAnswer)
                            <span class="ml-auto text-green-600 font-semibold">✔</span>
                        @elseif($isUserAnswer && !$result['is_correct'])
                            <span class="ml-auto text-red-600 font-semibold">✖</span>
                        @endif
                    @endif
                </div>
            </label>
        @endforeach
    </div>
</div>
