<?php

namespace App\Http\Livewire\Masterlist;

use App\Models\NewTable;
use App\Models\TempData;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;


class ItemDisplay extends Component
{
    use WithPagination, Actions;

    public $searchTerm;

    public $sortBy = 'ID';
    public $sortDirection = 'ASC';

    public $showItemImport = false;

    protected $queryString = [
        'searchTerm' => ['as' => 'q'],
        'sortBy', 
        'sortDirection'
    ];
    protected $listeners = [
        'tempDataUploaded' => 'render',
    ];

    public function setSort($query, $direction)
    {
        $this->sortBy = $query;
        $this->sortDirection = $direction;
    }

    public function render()
    {
        $temp_data = NewTable::get();

        $temp_data = NewTable::where('item_number','like','%'.$this->searchTerm.'%')
        ->orWhere('barcode_number','like','%'.$this->searchTerm.'%')
        ->orWhere('description','like','%'.$this->searchTerm.'%')
        ->orWhere('item_division','like','%'.$this->searchTerm.'%')
        ->orWhere('size_code','like','%'.$this->searchTerm.'%')
        ->orWhere('color_code','like','%'.$this->searchTerm.'%')
        ->orWhere('variant_code','like','%'.$this->searchTerm.'%')
        ->orWhere('unit_measure','like','%'.$this->searchTerm.'%')
        ->orWhere('barcode_class','like','%'.$this->searchTerm.'%')
        ->orWhere('created_at','like','%'.$this->searchTerm.'%')
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate(4);


        // $temp_data = $temp_data->orderBy($this->sortBy, $this->sortDirection);


        return view('livewire.masterlist.item-display',compact('temp_data'));
    }
}
