<div class="flex flex-col gap-6 items-center">
    @if ($round == 1)
        <h4 class="sm:text-2xl">Round {{ $round }}</h4>
        <div class="flex flex-col sm:flex-row gap-8 sm:gap-16 w-full">
            <x-pickem-card url='storage/{{ $currentRound[0][0]->style->name }}/{{ $currentRound[0][0]->name }}' id=0
                style='{{ $currentRound[0][0]->style->name }}' />
            <x-pickem-card url='storage/{{ $currentRound[0][1]->style->name }}/{{ $currentRound[0][1]->name }}' id=1
                style='{{ $currentRound[0][1]->style->name }}' />
        </div>
    @elseif ($round == 5)
        <h4 class="sm:text-2xl">Winner!!! {{ $round }}</h4>
        <div class="flex flex-col sm:flex-row gap-8 sm:gap-16 w-full">
            <x-pickem-card url='storage/{{ $currentRound[0]->style->name }}/{{ $currentRound[0]->name }}' id=0
                style='{{ $currentRound[0]->style->name }}' :winner='true' />
        </div>
    @elseif ($round > 1)
        <h4 class="sm:text-2xl">Round {{ $round }}</h4>
        <div class="flex flex-col sm:flex-row gap-8 sm:gap-16 w-full">
            <x-pickem-card url='storage/{{ $currentRound[0]->style->name }}/{{ $currentRound[0]->name }}' id=0
                style='{{ $currentRound[0]->style->name }}' />
            <x-pickem-card url='storage/{{ $currentRound[1]->style->name }}/{{ $currentRound[1]->name }}' id=1
                style='{{ $currentRound[1]->style->name }}' />
        </div>
    @else
        <div class="grid place-items-center h-full">
            <button type="button" wire:click='startGame()'
                class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold
             text-white shadow-sm hover:bg-indigo-400 focus-visible:outline
             focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Start
                game</button>
        </div>
    @endif
    {{-- @if ($nextRound)
        {{ count($nextRound) }}
        @foreach ($nextRound as $item)
            <p>{{ $item }}</p>
        @endforeach
        <h1>BREAK</h1>
        {{ count($currentRound) }}
        @foreach ($currentRound as $itemm)
            <p>1 -{{ $itemm[0] }}</p>
            <p>2 -{{ $itemm[1] }}</p>
        @endforeach
    @endif --}}

</div>
