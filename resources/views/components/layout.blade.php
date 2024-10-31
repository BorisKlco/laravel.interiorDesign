<!DOCTYPE html>
<html lang="en" class="h-screen bg-gray-100 font-google-fonts">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $pageTitle }}</title>
</head>

<body class="flex flex-col h-full">
    <header class="bg-gradient-to-r from-gray-900 to-zinc-800">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5 drop-shadow-[1px_1px_0px_rgba(255,0,0,0.5)]">
                    <span class="sr-only">Interior Design</span>
                    <img class="h-12 w-auto drop-shadow-[-1px_-1.5px_0px_rgba(22,29,67,0.75)]"
                        src="{{ Vite::asset('resources/images/logo.png') }}" alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button id="open-menu" type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <x-nav-link href="/" :active="request()->routeIs('home')">🎨Styles</x-nav-link>
                <x-nav-link href="/pickem" :active="request()->is('pickem')">⚔️Pick'em</x-nav-link>
                <x-nav-link href="/search" :active="request()->is('search')">🔎Search</x-nav-link>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div id="mobile-menu" class="lg:hidden hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10 bg-black opacity-50"></div>
            <div
                class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-gray-300 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                    </a>
                    <button type="button" id="close-menu"
                        class="-m-2.5 rounded-md p-2.5 text-gray-700 hover:rotate-90 transition-all duration-500">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Add your menu items here -->
                <nav class="flex flex-col gap-y-4 pt-10">
                    <x-nav-link :mobile='true' href="/" :active="request()->routeIs('home')">🎨Styles</x-nav-link>
                    <x-nav-link :mobile='true' href="/pickem" :active="request()->is('pickem')">⚔️Pick'em</x-nav-link>
                    <x-nav-link :mobile='true' href="/search" :active="request()->is('search')">🔎Search</x-nav-link>
                </nav>
            </div>
        </div>
    </header>
    {{ $slot }}
</body>

</html>
