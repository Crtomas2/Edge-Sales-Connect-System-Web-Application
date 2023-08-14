<?php

namespace App\Http\Livewire\Masterlist;
use Livewire\Component;
use App\Models\TempData;
use WireUi\Traits\Actions;
use App\Jobs\FileUploadJob;
use App\Models\NewTable;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class Import extends Component
{
    use WithFileUploads, Actions;

    public $active;

    public $file;

    protected $listeners = [
        'toggleImport' => 'toggleActive'
    ];

    public function toggleActive($active)
    {
        $this->active = $active;
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
            // dd($this->file);

            // Validate if file uploaded has mime type of csv, xlsx, or xls
            $this->validate(
                [ 'file' => ['required', 'max:20480', 'mimes:csv,xlsx,xls,mp3']]
            );

            // Delete all rows on the temp_data table
            // TempData::truncate();

            $file = $this->file->store('imports');

            // dd(storage_path('app\\' . $file));

            // Insert new rows to the 'temp_data' table
            $collection = (new FastExcel())->import(storage_path('app\\' . $file), function ($line) {
                return TempData::create([
                    'item_number' => $line['item_number'],
                    'barcode_number' => $line['barcode_number'],
                    'description' => $line['description'],
                    'item_division' =>$line['item_division'],
                    'size_code' =>$line['size_code'],
                    'color_code' =>$line['color_code'],
                    'variant_code' =>$line['variant_code'],
                    'unit_measure' =>$line['unit_measure'],
                    'barcode_class' =>$line['barcode_class'],
                ]);
            });

            $this->emit('refresh');

        } catch (\Exception $e) {
            // Return an error
            $this->addError('file', $e->getMessage());
        }
    }

    public function upload()
    {
        $chunkSize = 500; // Adjust the chunk size according to your needs

        $temp_data = TempData::get();
        $failedData = collect();

        try {
            DB::beginTransaction();

            $temp_data->chunk($chunkSize)->each(function ($chunk) use (&$failedData) {
                try {
                    $rows = [];

                    foreach ($chunk as $row) {
                        $rows[] = [
                            'item_number' => $row->item_number,
                            'barcode_number' => $row->barcode_number,
                            'description' => $row->description,
                            'item_division' => $row->item_division,
                            'size_code' => $row->size_code,
                            'color_code' => $row->color_code,
                            'variant_code' => $row->variant_code,
                            'unit_measure' => $row->unit_measure,
                            'barcode_class' => $row->barcode_class,
                            'created_at' => $row->created_at,
                            'updated_at' => $row->updated_at,
                        ];
                    }

                    NewTable::insert($rows);
                } catch (\Exception $e) {
                    $failedData = $failedData->merge($chunk);
                }
            });

            DB::commit();

            // Get the count of rows in the 'temp_data' table
            $dataCount = $temp_data->count();

            // Remove the current data on 'temp_data' table after successful insertion
            TempData::truncate();

            // Return a session message
            $this->notification([
                'icon' => 'success',
                'title' => 'Masterlists imported!',
                'description' => $dataCount . ' Masterlist were imported successfully.'
            ]);

            if ($failedData->count() > 0) {
                $this->notification([
                    'icon' => 'warning',
                    'title' => 'Masterlists imported Failed!',
                    'description' => $failedData->count() . ' Masterlist were not imported.'
                ]);
            }

            $this->active = false;
        } catch (\Exception $e) {
            DB::rollback();
            $this->addError('temp_data', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.masterlist.import');
    }
}
