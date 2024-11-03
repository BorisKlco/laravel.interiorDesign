@props(['url', 'id', 'style', 'winner' => false, 'detail' => false])

@php
    $defaults = [
        'class' =>
            'group relative aspect-[7/9] w-full bg-cover rounded-md ring-indigo-400 ring-1 hover:ring hover:shadow-lg hover:scale-[1.01] transition-all',
        'style' => 'background-image: url(' . $url . ');',
    ];
@endphp
@if ($winner)
    <a href="/detail/{{ $detail }}" {{ $attributes($defaults) }}>
        <span
            class="select-none inline-flex items-center
        rounded-md bg-gray-50
        px-2 py-1 mt-4 ml-4
        font-medium text-gray-600
        ring-1 ring-inset ring-gray-500/10 shadow-sm">{{ Str::ucfirst($style) }}</span>
    </a>
@else
    <section {{ $attributes($defaults) }}>
        <span
            class="select-none inline-flex items-center
        rounded-md bg-gray-50
        px-2 py-1 mt-4 ml-4
        font-medium text-gray-600
        ring-1 ring-inset ring-gray-500/10 shadow-sm">{{ Str::ucfirst($style) }}</span>
        <button wire:click='userPick({{ $id }})'
            class="absolute -top-16 text-6xl h-full w-full
            group-hover:top-0 opacity-0 group-hover:opacity-100
            transition-all duration-200
            flex items-center justify-center">
            💖
        </button>
    </section>
@endif
