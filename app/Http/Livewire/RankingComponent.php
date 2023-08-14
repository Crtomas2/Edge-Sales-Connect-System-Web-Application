<?php

namespace App\Http\Livewire;

use App\Models\SMSApi;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class RankingComponent extends Component
{
    Use WithPagination;
    /**
     * Filter by date variable, search 
     * declaration
     */
    public $searchTerm;
    public $startDate; 
    public $endDate; 

    /**
     * Filter by letter variable
     */
    public $selectedLetter;
    public $letterFilter = [];

    public function getTopPromodisersOfMonth()
    {
        $currentMonth = Carbon::now()->month();

        $topPromodisers = SMSApi::select('firstname','lastname')
        ->selectRaw('COUNT(*) as total')
        ->groupBy('firstname','lastname')
        ->orderbyDesc('total')
        ->whereMonth('created_at', $currentMonth)
        ->limit(10)
        ->get();

        return $topPromodisers;
    }

    public function resetDateFilter()
    {
        $this->startDate = null;
        $this->endDate = null;
        $this->searchTerm = null;
        $this->selectedLetter = null;
    }

    public function render()
    {
        $search = '%'.$this->searchTerm.'%';
        $letterFilter = $this->selectedLetter;
        
    
        $promodiser = SMSApi::groupBy('firstname', 'lastname')
            ->select('firstname', 'lastname', 'total_quantity', 'unit_price', 'created_at')
            ->selectRaw('COUNT(*) as total')
            ->selectRaw('SUM(unit_price * total_quantity) as total_amount')
            ->when($this->startDate && $this->endDate, function ($query) {
                $startDate = Carbon::parse($this->startDate)->startOfDay();
                $endDate = Carbon::parse($this->endDate)->endOfDay();
                return $query->whereBetween('created_at', [$startDate, $endDate]);
            })
            ->when($this->searchTerm, function ($query) use ($search) {
                return $query->where(function ($innerQuery) use ($search) {
                    $innerQuery->where('firstname', 'LIKE', $search)
                        ->orWhere('lastname', 'LIKE', $search);
                });
            })
            ->when($letterFilter, function ($query) use ($letterFilter){
                return $query->where('firstname','LIKE',$letterFilter.'%');
                    // ->orWhere('lastname','LIKE',$letterFilter.'%');
            })->paginate(5);
            
            
        $rtotal = $promodiser->sum('unit_price');
        $formattedTotal = '₱' . number_format($rtotal, 2, '.', ',');

        $topPromodisersOfMonth = $this->getTopPromodisersOfMonth();
    
        return view('livewire.ranking-component', compact('promodiser', 'formattedTotal','topPromodisersOfMonth'));
    }
    
}
