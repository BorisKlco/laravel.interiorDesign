<x-layout>
    <x-slot:pageTitle>
        Interior Design
        @if (request()->query('style'))
            - {{ Str::ucfirst(request()->query('style')) }}
        @endif
    </x-slot:pageTitle>
    <div class="flex-1 bg-gray-200 overflow-y-auto">
        <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="mb-4">
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select a category</label>
                    <select id="tabs" name="tabs" onchange="location.replace('?style=' + this.value)"
                        class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <x-category type="select" :active="!request()->query('style')" value="/">All</x-category>
                        @foreach (App\Enums\Category::cases() as $category)
                            <x-category type="select" :active="request()->query('style') == $category->value"
                                value="{{ $category->value }}">{{ $category->name }}</x-category>
                        @endforeach
                    </select>
                </div>
                <div class="hidden sm:block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex" aria-label="Tabs">
                            <x-category href="/" :active="!request()->query('style')">All</x-category>
                            @foreach (App\Enums\Category::cases() as $category)
                                <x-category href="?style={{ $category->value }}"
                                    :active="request()->query('style') == $category->value">{{ $category->name }}</x-category>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>

            <x-image-cards :img='$image' />

            {{ $image->onEachSide(1)->links() }}

        </section>
    </div>
</x-layout>
