<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SMSApi;
use Faker\Core\Barcode;
use App\Models\NewTable;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use function GuzzleHttp\Promise\all;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SMSController extends Controller
{
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
        return $smsapi;
    }   
    
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*.barcode_number' => 'required|exists:new_tables,barcode_number',
            '*.stock_code' => 'required|exists:new_tables,item_number',
            '*.color' => 'required|exists:new_tables,color_code',
            '*.size' => 'required|exists:new_tables,size_code',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 400);
        }
    
        try {
            $data = json_decode($request->getContent(), true);

            DB::beginTransaction();
            foreach ($data as $item) {
                $barcode = $item['barcode_number'];
                $stockCode = $item['stock_code'];
                $color = $item['color'];
                $size = $item['size'];
                $unitPrice = $item['unit_price'];
                $remarks = $item['remarks'];
                $totalQuantity = $item['total_quantity'];
                $brand = $item['brand'];
                $outlet = $item['outlet'];
                $firstName = $item['firstname'];
                $lastName = $item['lastname'];
                $now = Carbon::now();

                DB::table('s_m_s_apis')->Insert([
                    'barcode_number' => $barcode,
                    'stock_code' => $stockCode,
                    'color' => $color,
                    'size' => $size,
                    'unit_price' => $unitPrice,
                    'remarks' => $remarks,
                    'total_quantity' => $totalQuantity,
                    'brand' => $brand,
                    'outlet' => $outlet,
                    'firstname' => $firstName,
                    'lastname' => $lastName,
                    'created_at' => $now->format('Y-m-d H:i:s'),
                    'updated_at' => $now->format('Y-m-d H:i:s')
                ]);
            }
            DB::commit();
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Successfully inserted the data.',
                ], 200);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Failed to create the data',
                ], 400);
            }
        }
    }

    public function store(Request $request)
    {
       $smsapi = SMSApi::save();
   
       return response()->json($request,200);

    }
       
}
        // $this->validate($request,[
        //     'barcode_number' => 'required|exists:new_tables,barcode_number',
        //     'stock_code' => 'required|exists:new_tables,item_number',
        //     'color' => 'required|exists:new_tables,color_code',
        // ]);
        // $this->validate($request,[
        //     'size' => 'required|exists:new_tables,size_code',
        //     'outlet'=> 'required|exists:stores,Storename'    
        // ]);