@props(['type' => null, 'active' => false])

@if ($type == 'select')
    <option {{ $active ? 'selected' : '' }} {{ $attributes }}>{{ $slot }}</option>
@else
    <a class="w-1/4 border-b-2 px-1 py-4 text-center text-sm font-medium
   {{ $active ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}"
        {{ $attributes }} aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a>
@endif
