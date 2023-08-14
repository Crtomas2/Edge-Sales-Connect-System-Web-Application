<?php

namespace App\Http\Livewire;

use Carbon\Carbon;

use Livewire\Component;

class TimeComponent extends Component
{
    public $today;
    public $currentDateTime;

    public function mount()
    {
        $this->today = Carbon::today()->format('M,d,Y');
        // $this->currentDateTime = Carbon::now();
    }

    public function render()
    {
        return view('livewire.time-component');
    }
}
