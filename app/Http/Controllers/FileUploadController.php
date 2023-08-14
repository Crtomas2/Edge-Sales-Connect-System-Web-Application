<?php

namespace App\Http\Controllers;

use App\Jobs\FileUploadJob;
use App\Models\NewTable;
use App\Models\TempData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class FileUploadController extends Controller
{
    public function index(Request $request)
    {
        /**
         * REST API Get request item information
         */
        $barcode = $request->query('barcode_number');

        $tempData = NewTable::query();

        if ($barcode) {
            $tempData->where('barcode_number', $barcode);
        } elseif ($request->acceptsJson() && $request->expectsJson()) {
            return $tempData->get();
        } else {
            $tempData = $tempData->get();

            return view('file.test-upload', compact('tempData'));
        }

        $tempData = $tempData->first();

        if (!$tempData) {
            // If no matching data found, return an empty result
            return response()->json([]);
        }

        // Retrieve the corresponding information
        $itemNo = $tempData->item_number;
        $size = $tempData->size_code;
        $colorCode = $tempData->color_code;

        // Create an array with the retrieved information
        $result = [
            'barcode_number' => $barcode,
            'item_number' => $itemNo,
            'size_code' => $size,
            'color_code' => $colorCode,
        ];

        if ($request->acceptsJson() && $request->expectsJson()) {
            return response()->json($result);
        }

        return view('file.test-upload', compact('result'));
    }

    
    public function upload (Request $request) {
        try {
            // Validate if file uploaded has mime type of csv, xlsx, or xls
            $request->validate([
                'file' => ['required', 'max:20480', 'mimes:csv,xlsx,xls']
            ]);
            
            // Delete all rows on the temp_data table
            // TempData::truncate();
            // Insert new rows to the 'temp_data' table
            $collection = (new FastExcel())->import($request->file, function ($line) {
                return Tempdata::create([
                    'item_code' => $line['item_code'],
                    'barcode_number' => $line['barcode_number'],
                    'color' => $line['color'],
                    'size_code' =>$line['size_code'],
                    'unit_measure' =>$line['unit_measure'],
                    'barcode_class' =>$line['barcode_class'],
                ]);
            });

            // Get all rows from the 'storetemp_data' table
            $temp_data = TempData::all();
            // Return a session message
            session()->flash('flash.banner', 'Data imported successfully.');
            session()->flash('flash.bannerStyle', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Return an error
            return redirect()->back()->withErrors([
                'file' => $e->getMessage()
            ]);
        }
    }
    public function view ()
    {
        session()->flash('flash.banner', 'You must upload a file first.');
        session()->flash('flash.bannerStyle', 'danger');
        // Redirect user if routed here

        return redirect()->route('test-upload.index');
    }
    public function store (Request $request)
    {
        /**
         * TODO: Create an algorithm that will store the
         * data from 'temp_data' table to another specific table
         */
        $temp_data  = TempData::get();
        $chunkSize = 20;
        try {
            DB::beginTransaction();
            if($temp_data ->count() >= $chunkSize) {
                foreach($temp_data ->chunk($chunkSize) as $chunk) {
                    // dd(true, $chunk);
                    foreach($chunk as $row) {
                        // dd($row);
                        NewTable::insert([
                            'item_code' => $row->item_code,
                            'barcode_number' => $row->barcode_number,
                            'color' => $row->color,
                            'size_code'=>$row->size_code,
                            'unit_measure'=>$row->unit_measure,
                            'barcode_class'=>$row->barcode_class,
                        ]);
                        // dispatch(new FileUploadJob($row));
                    }
                }
            } else {
                foreach($temp_data as $row) {
                    //dd('else', $row);
                    NewTable::insert([
                        'item_code' => $row->item_code,
                        'barcode_number' => $row->barcode_number,
                        'color' => $row->color,
                        'size_code'=>$row->size_code,
                        'unit_measure'=>$row->unit_measure,
                        'barcode_class'=>$row->barcode_class,
                    ]);
                }
            }
            
            DB::commit();
   
           // Get the count of rows in the 'temp_data' table
           $temp_data_count = $temp_data->count();
   
           // Remove the current data on 'temp_data' table after successful insertion
          TempData::truncate();
   
           // Return a message to user if rows are added successfully
           session()->flash('flash.banner', $temp_data_count. ' rows were added successfully.');
           session()->flash('flash.bannerStyle', 'success');

           return redirect()->route('test-upload.upload');

        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('flash.banner', $e->getMessage());
            session()->flash('flash.bannerStyle', 'danger');

            return redirect()->route('test-upload.index');
        }
        
    }

}
        

