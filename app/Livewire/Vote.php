<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Like;

class Vote extends Component
{
    public $item;
    public $disabled = false;

    public function like($id)
    {
        $this->disabled = true;
        $like = Like::where('image_id', $id)->first();
        $like->increment('up');
    }

    public function dislike($id)
    {
        $this->disabled = true;
        $like = Like::where('image_id', $id)->first();
        $like->increment('down');
    }


    public function render()
    {
        return view('livewire.vote');
    }
}
