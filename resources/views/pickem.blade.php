<x-layout>
    <x-slot:pageTitle>
        Pick'em - Match of living rooms!
    </x-slot:pageTitle>
    <div class="flex-1 bg-gray-200">
        <div class="mx-auto max-w-2xl px-4 py-6 sm:px-6 sm:py-16 lg:max-w-7xl lg:px-8 ">
            <div class="flex flex-col items-center gap-3 mb-4 sm:mb-12">
                <h1 class="text-xl sm:text-4xl font-bold">Pick'em</h1>
                <div class="flex flex-col items-center">
                    <h2 class="sm:text-xl">8 styles, 2 pictures from each.</h2>
                    <h2 class="sm:text-xl">Only 1 winner!</h2>
                </div>
            </div>
            {{-- <div class="flex flex-col gap-6 items-center">
                <h4 class="sm:text-2xl">Round 1</h4>
                <div class="flex flex-col sm:flex-row gap-8 sm:gap-16 w-full">
                    <x-pickem-card url='/images/bohemian/01f562260b794d9498f81fcc5863289d.webp' />
                    <x-pickem-card url='/images/country/0a40a276d9fc4ca882f7998c6befe7f8.webp' />
                </div>
            </div> --}}
            <livewire:pickem>
        </div>
</x-layout>
