<x-layout>
    <x-slot:pageTitle>
        Interior Design - Detail
    </x-slot:pageTitle>
    <div class="flex-1 bg-gray-200">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
                <!-- Image gallery -->
                <div class="flex flex-col rounded-md overflow-hidden border border-gray-400 shadow-md">
                    <!-- Image selector -->

                    @php
                        $filename = 'storage/' . $item->style->name . '/' . $item->name;
                    @endphp

                    <section class="aspect-[7/9] w-full bg-cover" style="background-image: url('{{ asset($filename) }}')">
                    </section>

                    <div class="">
                        @php
                            $up = $item->likes->up;
                            $down = $item->likes->down;
                            $c = 2;
                            $score = (($up + $c) / ($up + $down + 2 * $c)) * 100;
                            $score = round($score);
                        @endphp
                        <div class="h-2 bg-indigo-800" style="width:{{ $score }}%"></div>

                        <livewire:vote :key="$item->id" :$item :detail='true'>

                    </div>
                </div>

                <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                        Description:
                    </h1>


                    <div class="mt-6">
                        <h3 class="sr-only">Description</h3>

                        <div class="space-y-6 text-base text-gray-700">
                            <p>{{ $item->desc }}</p>
                        </div>
                    </div>

                    <div class="pt-4">
                        @php
                            $colors = [
                                'slate',
                                'zinc',
                                'neutral',
                                'red',
                                'orange',
                                'amber',
                                'lime',
                                'green',
                                'emerald',
                                'teal',
                                'cyan',
                                'sky',
                                'indigo',
                                'purple',
                                'fuchsia',
                                'pink',
                                'rose',
                            ];
                        @endphp
                        @foreach ($item->tags as $tag)
                            @php
                                $color = Arr::random($colors);
                            @endphp
                            <span
                                class="inline-flex items-center rounded-md bg-{{ $color }}-50 px-2 py-1 mb-1 text-xs font-medium ring-1 ring-inset text-{{ $color }}-700 ring-{{ $color }}-600/10">{{ $tag->name }}</span>
                        @endforeach
                    </div>


                    <div class="mt-6 flex">
                        <a href="/download/{{ $item->id }}"
                            class="flex gap-3 max-w-xs items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-lg font-medium
                                text-white hover:bg-indigo-700 focus:outline-none focus:ring-2
                                focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout>
