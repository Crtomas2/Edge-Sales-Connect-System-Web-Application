<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use App\Models\SMSApi;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class BarcodeTable extends Component
{
    use WithPagination, Actions;

    /**
     * Filter by date variable, search 
     * declaration
     */
    public $searchTerm;
    public $startDate; 
    public $endDate; 

    /**
     * Brand filter variable declaration
     */
    public $selectedFilter = '';
    public $brandFilters = [];

    public function fetchBrandFilters()
    {
        $this->brandFilters = [
            [
                'id' => '1',
                'name' => 'Skechers',
                'value' => 'Skechers'
            ],
            [
                'id' => '2',
                'name' => 'Saucony',
                'value' => 'Saucony'
            ],
            [
                'id' => '3',
                'name' => 'Merrell',
                'value' => 'Merrell',
            ],
            [
                 'id' =>'4',
                 'name' => 'Mario Dboro',
                 'value' => 'Mario Dboro'
            ],
            [
                 'id' => '5',
                 'name' => 'Florsheim',
                 'value' => 'Florsheim'
            ]
        ];
    }

    public function mount()
    {
        $this->fetchBrandFilters();
    }

    public function resetDateFilter()
    {
        $this->startDate = null;
        $this->endDate = null;
        $this->selectedFilter = null;
        $this->searchTerm = null;
    }

    
    public function render()
    {
        $search = '%'.$this->searchTerm.'%';
        $brandFilter = '%'.$this->selectedFilter.'%';

       $query = SMSApi::groupBy('barcode_number')
       ->select('barcode_number','brand','created_at','color',DB::raw('count(*) as total'));

       if($brandFilter){
           $query->where('brand','like',$brandFilter);  
       }

        if($this->startDate && $this->endDate){
            $startDate = Carbon::parse($this->startDate)->startOfDay();
            $endDate = Carbon::parse($this->endDate)->endOfDay();
            $query->whereBetween('created_at',[$startDate,$endDate]);    
        }

        $tryCount = $query->where(function ($innerQuery) use ($search){
            $innerQuery->where('barcode_number','like',$search);
        })->paginate(5);
        
        return view('livewire.dashboard.barcode-table', compact('tryCount'));
    }
}
