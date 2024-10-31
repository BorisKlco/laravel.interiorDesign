<div
    class="absolute divide-x divide-gray-400 border-t border-gray-400 bg-white/40 -bottom-10 w-full group-hover:bottom-0 opacity-0 group-hover:opacity-100 transition-all duration-200 flex">
    @if ($disabled)
        <p class="inline-flex items-center justify-center w-full h-[3rem] bg-gray-300/70 font-semibold">Thank you for
            voting.</p>
    @else
        <button wire:click='like({{ $item->id }})' type="button"
            class="h-[3rem] basis-1/2 text-center hover:text-xl transition-all duration-75">🥰</button>
        <button wire:click='dislike({{ $item->id }})' type="button"
            class="h-[3rem] basis-1/2 text-center hover:text-xl transition-all duration-75">🙅‍♀️</button>
    @endif
</div>
