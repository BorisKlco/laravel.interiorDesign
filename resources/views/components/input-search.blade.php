@props(['name'])

@php
    $default = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-md bg-white/10 border border-gray-400 px-5 py-4 w-full max-w-2xl shadow-lg',
        'value' => old($name),
    ];
@endphp

<input {{ $attributes($default) }}>
