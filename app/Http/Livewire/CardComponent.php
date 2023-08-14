<?php

namespace App\Http\Livewire;

use App\Models\Promodisers;
use App\Models\SMSApi;
use App\Models\User;
use Livewire\Component;

class CardComponent extends Component
{
    public $totalSales;

    public $totalQuantity;

    public $monthSales;
    
    public function mount()
    {
        $this->totalSales = $this->getTotalSalesToday();

        $this->totalQuantity = $this->getTotalQuantityToday();
    } 

    public function getTotalSalesToday()
    {
        $totalSales = SMSApi::whereDate('created_at', today())->sum('unit_price');
        return '₱' . number_format($totalSales, 2);
    }

    public function getTotalQuantityToday()
    {
        return SMSApi::whereDate('created_at', today())->sum('total_quantity');
    }

    public function render()
    {   
        $smsApi = SMSApi::get();

        $totalUser = User::where('UserRole', 'Admin')->count();

        $totalUsers = User::where('UserRole', 'Sales Representative')->count();


        $quantity = $smsApi->sum('total_quantity');

        $rtotal = $smsApi->sum('unit_price');
        $formattedTotal = '₱' . number_format($rtotal, 2, '.', ',');

        $active = Promodisers::where('promodiser_status',0)
                    ->orWhereNull('promodiser_status')
                    ->count();

        $currentMonth = now()->format('Y-m');
        $totalSales = SMSApi::where('created_at', 'like', $currentMonth . '%')->sum('unit_price');
        $monthTotal = '₱' . number_format($totalSales, 2, '.', ',');
                                
                            
        // $totalUser  = User::where('UserRole','0')->count();

        return view('livewire.card-component',compact('totalUser','formattedTotal','quantity','active','monthTotal','totalUsers'));
    }
}
