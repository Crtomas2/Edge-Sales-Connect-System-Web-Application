<div class="container mx-auto items-center py-8">
    <div class="border border-lightgray rounded-lg"> 
        <div class="border-b-2 border-gray-300 bg-gray-100 p-4">
            <h1 class="text-2xl font-bold ">Total Accumulated Sales (Per Branch)</h1>
        </div>
        <div class="bg-white p-2">
          <div class="flex items-center justify-center pb-4">
            <div class="mr-4">
                <x-jet-label for="outletFilters">Outlet</x-jet-label>
                <select id="outletFilters" wire:model="selectedOutlet" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  resize rounded-md shadow-sm block mt-1">
                    <option value="">Select a outlet</option>
                    @foreach($outletFilters as $outlet)
                    <option value="{{ $outlet['value'] }}">{{ $outlet['name'] }}</option>
                    @endforeach
                </select>
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
                <x-jet-label>Start date</x-jet-label>
                <x-jet-input type="datetime-local" class="block mt-1" wire:model.difer="startDate" placeholder="Start date" />
                <x-jet-input-error for="startDate" class="mt-2" />
            </div>
            <div class="mr-4">
                <x-jet-label>End date</x-jet-label>
                <x-jet-input type="datetime-local" class="block mt-1" wire:model.difer="endDate" placeholder="End date" />
                <x-jet-input-error for="endDate" class="mt-2" />
            </div>
            <div class="pt-6">
              <x-jet-button wire:click="resetDateFilter">Clear</x-jet-button>
          </div>
        </div>
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th align="center">BRAND</th>
                            <th align="center">OUTLET</th>
                            <th align="center">UNIT PRICE</th>
                            <th align="center">SOLD ITEM COUNT</th>
                            <th align="center">SUB-TOTAL</th>
                            <th align="center">TIMESTAMP</th>

                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        @if ($tryCount1->isEmpty())
                            <tr>
                                <td colspan="6" class="p-4">
                                    <center>No Information Available</center>
                                </td>
                            </tr>
                        @else
                            @foreach ($tryCount1 as $outlet)
                                <tr>
                                    <td align="center" class="p-4">{{ $outlet->brand }}</td>
                                    <td align="center" class="p-4">{{ $outlet->outlet }}</td>   
                                    <td align="center" class="p-4">{{ $outlet->unit_price }}</td>   
                                    <td align="center" class="p-4">{{ $outlet->total }}</td>   
                                    <td align="center" class="p-4">₱{{ $outlet->subtotal }}</td>
                                    <td align="center" class="p-4">{{ $outlet->created_at }}</td> 
                                </tr>    
                            @endforeach 
                            <tr>
                                <td align="center" colspan="6" class="p-4">GRAND TOTAL: {{ $formattedTotal }}</td>
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
