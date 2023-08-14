<?php

namespace App\Http\Livewire\Stores;

use App\Models\Store;
use Livewire\Component;
use App\Models\StoreFile;
use App\Models\StoreItem;
use App\Models\Storegroup;
use App\Jobs\FileUploadJob;
use App\Models\LocationCode;
use App\Models\Storelocation;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use WireUi\Traits\Actions;
use App\Models\StoreTempData as TempData;

class Import extends Component
{
    use WithFileUploads, Actions;

    public bool $active;

    public $file;

    protected $listeners = [
        'toggleImport' => 'toggleImport'
    ];

    public function toggleImport($value)
    {
        $this->active = $value;
    }

    public function updatedFile()
    {
        $this->validate(
            [ 'file' => ['required', 'max:20480', 'mimes:csv,xlsx,xls,mp3']]
        );

        // dd($this->file);
    }

    public function import()
    {
        try {            
            // Validate if file uploaded has mime type of csv, xlsx, or xls
            $this->validate([
                'file' => ['required', 'max:20480', 'mimes:csv,xlsx,xls,mp3']
            ]);
    
            $file = $this->file->store('imports');
    
            // Import the data from the file using FastExcel
            $collection = (new FastExcel())->import(storage_path('app/' . $file));
    
            // Store each row in the database
            foreach ($collection as $row) {
                TempData::create([
                    'storename' => $row['storename'],
                    'storelocation' => $row['storelocation'],
                    'location_code' => $row['location_code'],
                    'store_group' => $row['store_group'],
                ]);
            }
    
            $this->emit('refresh');
        } catch (\Exception $e) {
            // Return an error
            $this->addError('file', $e->getMessage());
        }
    }
    

    public function upload()
    {
        $tempData = TempData::get();
    
        try {
            DB::beginTransaction();
    
            $failedData = collect();
    
            foreach ($tempData as $row) {
                try {
                    // Find or create the related models based on the imported data
                    $store = Store::firstOrCreate(['Storename' => $row->storename]);
    
                    $storelocation = Storelocation::firstOrCreate(['Storelocations' => $row->storelocation]);
    
                    $locationcode = LocationCode::firstOrCreate(['LocationCode' => $row->location_code]);
    
                    $storegroup = Storegroup::firstOrCreate(['StoreGroup' => $row->store_group]);
    
                    // Check if the StoreItem already exists based on the related model IDs
                    $existingStoreItem = StoreItem::where('store_id', $store->id)
                        ->where('storelocation_id', $storelocation->id)
                        ->where('locationcode_id', $locationcode->id)
                        ->where('storegroup_id', $storegroup->id)
                        ->first();
    
                    if ($existingStoreItem) {
                        // Skip creating a new entry if it already exists
                        continue;
                    }
    
                    // Create the StoreItem record
                    $storeItem = StoreItem::create([
                        'store_id' => $store->id,
                        'storelocation_id' => $storelocation->id,
                        'locationcode_id' => $locationcode->id,
                        'storegroup_id' => $storegroup->id,
                    ]);
                } catch(\Exception $e) {
                    $failedData->push($row);
                }                 
            }
    
            DB::commit();
    
            // Get the count of rows in the 'temp_data' table
            $dataCount = $tempData->count();
    
            // Remove the current data on 'temp_data' table after successful insertion
            TempData::truncate();
    
            // Return a message to the user if rows are added successfully
            $this->emit('tempDataUploaded');
            $this->active = false;
    
            // Return a session message
            $this->notification([
                'icon' => 'success',
                'title' => 'Stores imported!',
                'description' => $dataCount . ' stores were imported successfully.'
            ]);
    
            if ($failedData->count() > 0) {
                $this->notification([
                    'icon' => 'warning',
                    'title' => 'Some stores failed',
                    'description' => $failedData->count() . ' stores were not imported.'
                ]);
            }
        } catch (\Exception $e) {
            DB::rollback();
    
            $this->addError('temp_data', $e->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.stores.import');
    }
}
