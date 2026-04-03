<div class="rounded-xl shadow-2xl relative overflow-hidden flex flex-col h-full">
    <img src="{{ asset('assets/img-card.png') }}" alt=""
        class="w-full h-[243px] object-center object-cover rounded-t-xl transition-transform duration-300 hover:scale-110">
    <div class="flex flex-col gap-3 py-5 px-4 bg-[#F5F5F5] rounded-b-xl flex-1 justify-between">
        <div class="flex flex-col gap-3">
            <h2 class="text-xl">{{ $course->title }}</h2>
            <div class="flex gap-3 items-center">
                <img src="{{ asset('assets/author-img.png') }}" alt="">
                <h3 class="text-base text-slate-500">{{ $course->user->name }}</h3>
            </div>
            <p class="text-base text-slate-600">{{ $course->description }}</p>
        </div>
        <div class="">
            <x-button href='/lesson'>Read More</x-button>
        </div>
    </div>
    <div
        class="text-base font-semibold text-center text-white rounded-l-lg px-4 py-1 bg-primary absolute top-[31px] right-0">
        {{ $course->category->name }}
    </div>
</div>
