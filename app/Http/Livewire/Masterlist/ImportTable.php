<?php

namespace App\Http\Livewire\Masterlist;

use App\Models\TempData;
use Livewire\Component;
use Livewire\WithPagination;

class ImportTable extends Component
{
    use WithPagination;

    protected $listeners = [
        'refresh' => 'render',
        'tempDataUploaded' => 'render'
    ];
    
    public function render()
    {
        $temp_data = TempData::paginate(2);
        
        return view('livewire.masterlist.import-table', compact('temp_data'),[
            'temp_data' => $temp_data,
        ]);
    }
}
