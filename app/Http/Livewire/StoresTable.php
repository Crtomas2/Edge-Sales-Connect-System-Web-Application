<?php

namespace App\Http\Livewire;

use App\Models\LocationCode;
use App\Models\Store;
use App\Models\Storegroup;
use Livewire\Component;
use App\Models\StoreItem;
use App\Models\Storelocation;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class StoresTable extends Component
{
    use WithPagination;

    protected $queryString = [
        'searchTerm' => ['as' => 'q'],
        'sortBy', 
        'sortDirection'
    ];

    public $searchTerm;

    public $store_id,$storelocation_id,$locationcode_id,$storegroup_id;

    public $storeName,$storeLocation,$locationCode,$storeGroup;


    
    public $currentStore = null;

    protected $listeners = [
        'updatedStore' => 'mount',
        'deletedStore' => 'mount',
        'showCreate' => 'create',
        'hideStoreCreate' => 'hideStoreCreate',
        'tempDataUploaded' => 'render'
    ];

    /**
     * Modal Variables
     * 
     */
    public $showStoreEdit = false;
    public $showStoreCreate = false;
    public $confirmStoreDeletion = false;

    public $sortBy = 'ID';
    public $sortDirection = 'ASC';
    

    public function cancelEdit()
    {
        $this->showStoreEdit = false;

        $this->reset();
    }

    public function mount()
    {
        $this->storeitem = StoreItem::all();
    }
    public function create()
    {
        $this->showStoreCreate = true;
    }

    public function hideStoreCreate()
    {
        $this->showStoreCreate = false;

        $this->emit('hideStoreCreateModal');
    }

    public function editStore($id)
    {
        $this->currentStore = StoreItem::find($id);

        if($this->currentStore) {
            $this->showStoreEdit = true;
        }
    }

    public function hideStoreEdit()
    {
        $this->showStoreEdit = false;

        $this->currentStore = null;

    }

    public function deleteStore($id)
    {
        $this->currentStore = StoreItem::find($id);

        $this->confirmStoreDeletion = true;
    }

    public function hideStoreDelete()
    {
        $this->confirmStoreDeletion = false;
        
        $this->currentStore = null;
    }

    public function destroyStore()
    {
        try {
            DB::beginTransaction();
            
            $this->currentStore->delete();

            DB::commit();

            $this->hideStoreDelete();

            session()->flash('flash.banner', 'Store deleted successfully!');
        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('flash.banner', 'Store deleted successfully!');
            session()->flash('flash.bannerStyle', 'danger');

        }


    }

    public function setSort($query ,$direction)
    {
        $this->sortBy = $query;
        $this->sortDirection = $direction;
    }

    public function render()
    {
        /**
         * Option 1 search query
         */
        // $stores = StoreItem::orderBy($this->sortBy, $this->sortDirection);
        // $stores = $stores->orderBy($this->sortBy, $this->sortDirection)
        // $stores = $stores->paginate(10);
      
        $stores = StoreItem::whereHas('storeName', function (Builder $query){
             $query->where('Storename','like','%'.$this->searchTerm.'%');   
        })
        ->orWhereHas('storeLocation', function (Builder $query){
            $query->where('Storelocations','like','%'.$this->searchTerm.'%');   
       }) 
       ->orWhereHas('locationCode', function (Builder $query){
            $query->where('LocationCode','like','%'.$this->searchTerm.'%');   
       }) 
       ->orWhereHas('storeGroup', function (Builder $query){
            $query->where('StoreGroup','like','%'.$this->searchTerm.'%');   
       })->orderBy($this->sortBy, $this->sortDirection)->paginate(4);


        return view('livewire.stores-table', compact('stores'));
    }
}