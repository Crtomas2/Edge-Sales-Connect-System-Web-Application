<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SMSApi;
use App\Models\NewTable;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use function GuzzleHttp\Promise\all;

class SMSController extends Controller
{
    //

    Use WithPagination;

    protected $queryString = [
       'sortBy',
       'sortDirection'
    ];

    public $sortBy = 'ID';
    public $sortDirection = 'ASC';


    public function index(Request $request)
    {
        $smsApi = SMSAPI::all();

        // $smsApi = SMSApi::paginate(10);

        //dd($smsApi);

        if($request->acceptsJson() && $request->expectsJson()) {
            return $smsApi;
        }

        return view('ess-api.index', compact('smsApi'));
       
        //return response()->json(SMSApi::all(),200);
    }

    public function show(SMSApi $smsapi)
    {
        //return SMSApi::find();
        return $smsapi;

        // $smsapi = SMSApi::all();
    }

    public function create(Request $request)
    {
        // dd($request->all());
        try {
            $data = $request->all();

            DB::beginTransaction();

        // $myArray = array_unique($data['barcode_number']);
       /**
        * Array variable
        */     
        // $array = explode(",",$request['barcodes']);
        $barcodes = $data['barcode_number'];
        $sCode = $data['stock_code'];
        $color = $data['color'];
        $size = $data['size'];
        $u_price = $data['unit_price'];
        $r_total = $data['running_total'];
        $remarks = $data['remarks_age_gender'];
        $quantity = $data['total_quantity'];
        $brand = $data['brand'];
        $outlet = $data['outlet'];
        $fullname = $data['full_name'];
        $mobileno = $data['mobile_number'];
        $now = Carbon::now();

        // dd($barcodes);
        for ($i=0; $i <count($barcodes) ; $i++ ){
            DB::table('s_m_s_apis')->insert([
                array(
                    'barcode_number' => $barcodes[$i],
                    'stock_code'=>$sCode[$i],
                    'color'=> $color[$i],
                    'size'=>$size[$i],
                    'unit_price'=> $u_price[$i],
                    'running_total'=>$r_total[$i],
                    'remarks_age_gender'=>$remarks[$i],
                    'total_quantity'=> $quantity[$i],
                    'brand' => $brand[$i], 
                    'outlet' => $outlet[$i],      
                    'full_name' => $fullname[$i],
                    'mobile_number'  =>  $mobileno[$i],
                    'created_at' => $now->format('Y-m-d H:i:s'),
                    'updated_at' => $now->format('Y-m-d H:i:s')
                )
            ]);
            // $array  = array([
            //     'barcode_number' => $barcodes[$i],
            //     'stock_code'=>$sCode[$i],
            //     'color'=> $color[$i],
            //     'size'=>$size[$i],
            //     'unit_price'=> $u_price[$i],
            //     'running_total'=>$r_total[$i],
            //     'remarks_age_gender'=>$remarks[$i],
            //     'total_quantity'=> $quantity[$i],
            //     'brand' => $brand[$i], 
            //     'outlet' => $outlet[$i],      
            //     'full_name' => $fullname[$i],
            //     'mobile_number'  =>  $mobileno[$i],
            // ]);
        }
            // DB::table('s_m_s_apis')->insert($array);


        // foreach($myArray as $barcodes){
        //     $newData = SMSApi::updateOrCreate([
        //     'barcode_number' => $barcodes,
        //     'stock_code'=>$data['stock_code'],
        //     'color'=>$data['color'],
        //     'size'=>$data['size'],
        //     'unit_price'=>$data['unit_price'],
        //     'running_total'=>$data['running_total'],
        //     'remarks_age_gender'=>$data['remarks_age_gender'],
        //     'total_quantity'=>$data['total_quantity'],
        //     'brand' =>$data['brand'], 
        //     'outlet' => $data['outlet'],      
        //     'full_name' => $data['full_name'],
        //     'mobile_number'  => $data['mobile_number'],     
        //      ]);   
        //   } 
           
            DB::commit();
    
            if($request->wantsJson()) {
                return response()->json([
                // 'data' => $newData,
                // 'data' => $newData,
                // 'data' => $newData,
                // 'data' => $newData,
                // 'data' => $newData,
                // 'data' => $newData,
                // 'data' => $newData,
                // 'data' => $newData,
                // 'data' => $newData,
                // 'data' => $newData,
                // 'data' => $newData,
                // 'data' => $newData,       
                ]);
            }
            } catch (\Exception $e) {
                DB::rollBack();

                if($request->wantsJson()) {
                    return response()->json([
                        'message' => 'Failed to create data'
                    ]);
                }
            } 

    }

    public function store(Request $request)
    {
       $smsapi = SMSApi::save();

       return response()->json($request,200);
              
    }
       
}
