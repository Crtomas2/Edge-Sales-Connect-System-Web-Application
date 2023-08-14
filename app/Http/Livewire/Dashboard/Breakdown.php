<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\SMSApi;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Breakdown extends Component
{
    public $searchTerm;

    public function render()
    {
        $tryCount = SMSApi::groupBy('outlet')->select('outlet', DB::raw('count(*) as total'))->get();

        $tryCount = SMSApi::groupBy('outlet')->select('outlet', DB::raw('count(*) as total'))->paginate(5);



        // $pagination = SMSApi::groupBy('outlet')->select('outlet', DB::raw('count(*) as total'))->paginate(5);
 
        // dd($tryCount);

        // $smsApi = SMSApi::groupBy('outlet')->count();

       
        // $pagination = SMSApi::groupBy('outlet')->paginate(5);

        // dd($pagination);

    //     $total = 0;
    //     foreach($pagination as $code){
    //     $total += $code->running_total;
    // }

        // $smsApi =SMSApi::groupBy('outlet')->get();
        // $sales = SMSApi::groupBy('outlet')->count();

        // $sales = DB::table('s_m_s_apis')
        // ->select('outlet')
        // ->groupBy('outlet')
        // ->count();

        // $sales = SMSApi::all();

        // $sales = SMSApi::groupBy('outlet')->count();

        // $sales = SMSApi::groupBy('outlet')->count();

        // $sales = SMSApi::all()->count();
        
        // $sales = SMSApi::groupBy('outlet')->count();

        // $sales = SMSApi::groupBy('outlet')->get()->count();

        // $rowCount = DB::table('table_name')
        // ->select('column_name')
        // ->groupBy('column_name')
        // ->count();

        // $rowCount = DB::table('table_name')->count();

        // $rowCount = DB::table('table_name')
        // ->where('column_name', '=', 'value')
        // ->orWhere('column_name', '=', 'other_value')
        // ->count();

     
        return view('livewire.dashboard.breakdown', compact('tryCount'));
    }
}
