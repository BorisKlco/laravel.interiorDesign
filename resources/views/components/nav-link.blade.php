@props(['mobile' => false, 'active' => false])

@if ($mobile)
    <a {{ $attributes }}
        class="inline-flex items-center justify-center text-lg font-semibold leading-6 text-gray-700 py-4 border
    w-full hover:text-gray-950 transition-all duration-100 underline-offset-8
    hover:underline hover:border-gray-800
    {{ $active ? 'border-gray-600 ' : 'border-gray-400 ' }}"
        aria-current="{{ $active ? 'page' : 'false' }}">
        {{ $slot }}</a>
@else
    <a {{ $attributes }}
        class="inline-flex items-center text-md font-semibold leading-6 text-stone-300
    hover:text-white transition-all duration-100
    {{ $active ? 'underline underline-offset-8 decoration-stone-300' : '' }}"
        aria-current="{{ $active ? 'page' : 'false' }}">
        {{ $slot }}</a>
@endif
