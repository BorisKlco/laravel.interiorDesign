<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Image;

class Search extends Component
{
    use WithPagination;

    #[Validate('required')]
    public $query = '';
    public $querySplit = [];

    public function updatedQuery($value)
    {
        $this->querySplit = preg_split('/[\s,]+/', $value);
    }

    public function render()
    {
        $search = $this->querySplit;

        $searchResult = Image::with('style', 'tags')
            ->where(function ($query) use ($search) {
                foreach ($search as $item) {
                    $query->where('desc', 'LIKE', '%' . $item . '%');
                }
            })->paginate(12);

        return view('livewire.search', ['results' => $searchResult]);
    }
}
