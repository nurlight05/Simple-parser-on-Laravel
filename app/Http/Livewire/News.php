<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\News as News2;

class News extends Component
{
    public $perPage = 20;

    public function loadMore()
    {
        $this->perPage = $this->perPage + 20;
    }

    public function render()
    {
        $news = News2::latest()->paginate($this->perPage);
        return view('livewire.news', compact('news'));
    }
}
