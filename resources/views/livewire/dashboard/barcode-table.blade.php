<div class="container mx-auto items-center" style="padding: 30px;">
    <div style="border: 1px lightgray solid; border-radius: 5px;">
        <div style="border-bottom: 1px lightgray solid; background-color:#f7f7f7; padding: 10px;">
          <center><h1 style="font-size: 22px; bold;">Barcode Table Summary</h1></center>
       </div>
       <div style="background-color: white; padding:10px;">
        <div class="table-auto">
            <table class="table-auto container mx-auto px-8">   
                <thead>
                  <tr>
                      <th>TIMESTAMP</th>
                      <th>Brand</th>
                      <th>Product Barcode No</th>
                      <th>Color Code</th>
                      <th>Item Sold Count</th>
                  </tr>
                </thead>
                <div class="flex items-center justify-center pb-4">
                  <div class="mr-4">
                      <x-jet-label>Start date</x-jet-label>
                      <x-jet-input type="datetime-local" class="block mt-1" wire:model.difer="startDate" placeholder="Start date" />
                      <x-jet-input-error for="startDate" class="mt-2" />
                  </div>
                  <div class="mr-4">
                      <x-jet-label>End date</x-jet-label>
                      <x-jet-input type="datetime-local" class="block mt-1" wire:model.difer="endDate" placeholder="End date" />
                      <x-jet-input-error for="endDate" class="mt-2" />
                  </div>
                  <div class="mr-4">
                    <x-jet-label for="brandFilter">Brand</x-jet-label>
                    <select id="brandFilter" wire:model="selectedFilter" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1">
                        <option value="">Select a brand</option>
                        @foreach($brandFilters as $brand)
                        <option value="{{ $brand['value'] }}">{{ $brand['name'] }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="mr-4">
                      <x-jet-label for="search">Search</x-jet-label>
                      <x-jet-input id="search" type="text" class="block mt-1" wire:model="searchTerm" placeholder="Search" />
                  </div>
                 
                  <div class="pt-5">
                      <x-jet-button wire:click="resetDateFilter">Clear</x-jet-button>
                  </div>
              </div>
                <tbody class="divide-y items-center">
                    @if ($tryCount->count() > 0)
                      @foreach ($tryCount as $outlet)
                      <tr>
                        <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $outlet->created_at }}</td>       
                        <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $outlet->brand }}</td>           
                        <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $outlet->barcode_number }}</td>
                        <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $outlet->color }}</td>
                        <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $outlet->total  }}</td>                    
                      </tr>    
                      @endforeach
                    @else
                          <tr>
                              <td colspan="11">
                                  <center>No Information Available</center>
                              </td>
                          </tr>
                    @endif                   
                </tbody>
              </table>
        </div> 
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-10 shadow sm:rounded-bl-md sm:rounded-br-md">
          {{ $tryCount->links() }}
      </div>
       </div>
    </div> 
   </div>