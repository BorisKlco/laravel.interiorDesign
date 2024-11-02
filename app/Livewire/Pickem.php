<?php

namespace App\Livewire;

use App\Models\Image;
use App\Models\Style;
use Livewire\Component;
use Illuminate\Support\Arr;

class Pickem extends Component
{
    public $currentRound;
    public $nextRound;
    public $round;

    public function userPick($id)
    {
        if ($this->round == 1) {
            $pick = $this->currentRound->shift();
        } else {
            $pick = $this->currentRound->shift(2);
        }
        $this->nextRound->push(($pick[$id]));
        if (count($this->currentRound) == 0) {
            $this->currentRound = $this->nextRound;
            $this->nextRound = collect();
            $this->round++;
        }
    }

    public function startGame()
    {
        $styles = Style::all();
        $this->currentRound = $styles->map(fn($style) => Image::with('style')->where('style_id', '=', $style->id)
            ->inRandomOrder()
            ->take(2)
            ->get());
        $this->round = 1;
        $this->nextRound = collect();
    }

    public function render()
    {
        return view('livewire.pickem');
    }
}
