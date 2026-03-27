@props([
    'placeholder' => '',
    'label' => null,
    'name',
    'type' => 'text',
    'required' => false,
])

<div class="flex flex-col gap-2 flex-1">
    @if ($label)
        <label for="{{ $name }}" class="text-base text-gray-600">
            {{ $label }}
            @if ($required)
                <span class="text-red-700">*</span>
            @endif
        </label>
    @endif

    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->class([
            'w-full px-4 py-2.5 rounded-[10px] border text-sm outline-none transition-all duration-300',
            'border-red-400 bg-red-50 focus:ring-2 focus:ring-red-300' => $errors->has($name),
            'border-gray-300 bg-white focus:border-primary focus:ring-2 focus:ring-primary/20' => !$errors->has($name),
        ]) }}
        value="{{ old($name) }}" />

    @error($name)
        <p class="text-xs text-red-500 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-red-500" viewBox="0 0 640 640">
                <path
                    d="M320 64C177.8 64 64 177.8 64 320C64 462.2 177.8 576 320 576C462.2 576 576 462.2 576 320C576 177.8 462.2 64 320 64zM320 192C337.7 192 352 206.3 352 224L352 320C352 337.7 337.7 352 320 352C302.3 352 288 337.7 288 320L288 224C288 206.3 302.3 288 320 192zM352 416C352 433.7 337.7 448 320 448C302.3 448 288 433.7 288 416C288 398.3 302.3 384 320 384C337.7 384 352 398.3 352 416z" />
            </svg>
            {{ $message }}
        </p>
    @enderror
</div>
