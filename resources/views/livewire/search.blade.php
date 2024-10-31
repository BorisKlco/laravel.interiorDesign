<div class="flex-1 bg-gray-200">
    <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 sm:py-16 lg:max-w-7xl lg:px-8">
        <div class="flex flex-col items-center gap-6 mb-12">
            <h1 class="text-4xl font-bold">Search</h1>
            <input wire:model.live.debounce="query" type="text" placeholder="patterned pillows, leather sofa"
                class="rounded-md bg-white/10 border border-gray-400 px-5 py-4 w-full max-w-2xl shadow-lg">
        </div>
        @if (!empty($query))

            <ul class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($results as $item)
                    @php
                        $filename =
                            'storage/' . $item->style->name . '/' . substr($item->name, 0, -5) . '-min-min.webp';
                    @endphp
                    <li class="group relative overflow-hidden rounded-md aspect-[7/9] bg-cover hover:border border-gray-400 hover:shadow-lg hover:contrast-[1.03] transition-all"
                        style="background-image: url('{{ asset($filename) }}')">
                        <p
                            class="absolute -top-36 h-[2rem] group-hover:top-0 transition-all duration-200 pl-2 pt-2 font-bold">
                            <span
                                class="select-none inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 shadow-sm">{{ $item->style->name }}</span>

                            @php
                                $colors = [
                                    'red',
                                    'orange',
                                    'amber',
                                    'lime',
                                    'green',
                                    'emerald',
                                    'teal',
                                    'sky',
                                    'indigo',
                                    'purple',
                                    'fuchsia',
                                    'pink',
                                    'rose',
                                ];
                            @endphp

                            @foreach ($item->tags as $tag)
                                @break($loop->iteration > 3)
                                @php
                                    $color = Arr::random($colors);
                                @endphp
                                <span
                                    class="hidden sm:inline-flex items-center rounded-md bg-{{ $color }}-50 px-2 py-1 mb-1 text-xs font-medium text-{{ $color }}-700 ring-1 ring-inset ring-{{ $color }}-600/10">{{ $tag->name }}</span>
                            @endforeach
                        </p>
                        <p
                            class="absolute sm:hidden -top-16 h-full w-full group-hover:top-0 opacity-0 group-hover:opacity-100 transition-all duration-200 pr-2 pt-2 flex items-center justify-center">
                            <span
                                class="select-none inline-flex items-center text-sm font-medium text-gray-600 rounded-md bg-gray-50 px-2 py-1 ring-1 ring-inset ring-gray-500/10">
                                <a href="detail/{{ $item->id }}">Open</a>
                            </span>
                        </p>
                        <form id="likes-{{ $item->id }}"
                            class="absolute divide-x divide-gray-400 border-t border-gray-400 bg-white/40 -bottom-10 w-full group-hover:bottom-0 opacity-0 group-hover:opacity-100 transition-all duration-200 flex">
                            @csrf
                            <button hx-post="/t/{{ $item->id }}?vote=1" hx-target="#likes-{{ $item->id }}"
                                class="h-[3rem] basis-1/2 text-center hover:text-xl transition-all duration-75">🥰</button>
                            <button hx-post="/t/{{ $item->id }}?vote=0" hx-target="#likes-{{ $item->id }}"
                                class="h-[3rem] basis-1/2 text-center hover:text-xl transition-all duration-75">🙅‍♀️</button>
                        </form>
                        <a href="detail/{{ $item->id }}" class="hidden sm:block absolute w-full h-[85%]">
                        </a>
                    </li>
                @endforeach
            </ul>
            {{ $results->links() }}
        @endif
    </div>
</div>
