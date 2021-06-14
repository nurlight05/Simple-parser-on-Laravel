<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Log;

class Logs extends Component
{
    public $perPage = 20;

    public function loadMore()
    {
        $this->perPage = $this->perPage + 20;
    }

    public function render()
    {
        $logs = Log::paginate($this->perPage);
        return view('livewire.logs', compact('logs'));
    }
}
