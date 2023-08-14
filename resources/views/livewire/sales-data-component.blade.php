<div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="w-full flex flex-col lg:flex-row lg:items-center gap-4 px-4 py-5">
            <div>
                <x-jet-label for="search">Search</x-jet-label>
                <x-jet-input id="search" type="text" class="block mt-1 w-full" wire:model="searchTerm" placeholder="Search" />
            </div>
            <div class="flex-1 relative grid grid-cols-12 gap-4">
                <div class="col-span-12 lg:col-span-9 flex flex-col lg:flex-row lg:items-center gap-4">
                    <div>
                        <x-jet-label>Start Date</x-jet-label>
                        <x-jet-input type="datetime-local" class="block mt-1 w-full" wire:model="startDate" placeholder="Start date" />
                        <x-jet-input-error for="startDate" class="mt-2" />
                    </div>
                    <div>
                        <x-jet-label>End Date</x-jet-label>
                        <x-jet-input type="datetime-local" class="block mt-1 w-full" wire:model="endDate" placeholder="End date" />
                        <x-jet-input-error for="endDate" class="mt-2" />
                    </div>
                    <div>
                        <x-jet-button 
                        wire:click="resetDateFilter">Clear</x-jet-button>
                    </div>
                </div> 
                <div class="col-span-12 lg:col-span-3">
                    <x-jet-label for="brandFilter">Brand</x-jet-label>
                    <select id="brandFilter" wire:model="selectedFilter" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1">
                        <option value="">Select a brand</option>
                        @foreach($brandFilters as $brand)
                        <option value="{{ $brand['value'] }}">{{ $brand['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12 lg:col-span-3">
                    <x-jet-label for="outletFilter">Outlet</x-jet-label>
                    <select id="outletFilter" wire:model="selectedOutlet" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1">
                        <option value="">Select a outlet</option>
                        @foreach($outletFilters as $outlet)
                        <option value="{{ $outlet['value'] }}">{{ $outlet['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12 lg:col-span-3">
                    <x-jet-label for="letterFilter">Filter by Letter</x-jet-label>
                    <select id="letterFilter" wire:model="selectedLetter" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1">
                        <option value="">Select a letter</option>
                        @foreach(range('A', 'Z') as $letter)
                            <option value="{{ $letter }}">{{ $letter }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <div class="relative">
            <div class="max-w-full overflow-x-scroll">
                <table class="table-auto overflow-scroll w-full max-w-full px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <thead class="px-4 py-3 bg-gray-200 text-right sm:px-6 border-b sm:rounded-bl-md sm:rounded-br-md">
                        <tr height="50">
                            <th role="button" align="center" wire:click="setSort('created_at', '{{ $sortBy === 'created_at' && $sortDirection === 'ASC' ? 'DESC' : 'ASC' }}')">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Data Sent</span>
                                    @if($sortBy)
                                        @if($sortBy === 'created_at')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <!--Firstname-->
                            <th align="center" role="button" wire:click="setSort('firstname', '{{ $sortBy === 'firstname' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                                <div class="flex items-center justify-center space-x-5 py-2 pl-8 pr-4">
                                    <span>
                                        Promo Merchandiser Firstname  
                                    </span>
                                    @if($sortBy)
                                        @if($sortBy === 'firstname')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <!--Lastname-->
                            <th align="center" role="button" wire:click="setSort('lastname', '{{ $sortBy === 'lastname' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                                <div class="flex items-center justify-center space-x-5 py-2 pl-8 pr-4">
                                    <span>
                                        Promo Merchandiser Lastname
                                    </span>
                                    @if($sortBy)
                                        @if($sortBy === 'lastname')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <!--Outlet-->
                            <th role="button" align="center" wire:click="setSort('outlet', '{{ $sortBy === 'outlet' && $sortDirection === 'ASC' ? 'DESC' : 'ASC' }}')">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Outlet</span>
                                    @if($sortBy)
                                        @if($sortBy === 'outlet')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <!--brand-->
                            <th role="button" align="center" wire:click="setSort('brand', '{{ $sortBy === 'brand' && $sortDirection === 'ASC' ? 'DESC' : 'ASC' }}')">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Brand</span>
                                    @if($sortBy)
                                        @if($sortBy === 'brand')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <!--Barcode No.-->
                            <th align="center" role="button" wire:click="setSort('barcode_number', '{{ $sortBy === 'barcode_number' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                                <div class="flex items-center justify-center space-x-5 py-2 pl-8 pr-4">
                                    <span>Barcode Number</span>
                                    @if($sortBy)
                                        @if($sortBy === 'barcode_number')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <!--Item No.-->
                            <th align="center" role="button" wire:click="setSort('stock_code', '{{ $sortBy === 'stock_code' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Item No.</span>
                                    @if($sortBy)
                                        @if($sortBy === 'stock_code')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <!--Color-->
                            <th align="center" role="button" wire:click="setSort('color', '{{ $sortBy === 'color' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Color</span>
                                    @if($sortBy)
                                        @if($sortBy === 'color')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <!--Size-->
                            <th align="center" role="button" wire:click="setSort('size', '{{ $sortBy === 'size' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Size</span>
                                    @if($sortBy)
                                        @if($sortBy === 'size')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <th align="center" role="button" wire:click="setSort('total_quantity', '{{ $sortBy === 'total_quantity' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Total Quantity</span>
                                    @if($sortBy)
                                        @if($sortBy === 'total_quantity')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <!--unit price-->
                            <th align="center" role="button" wire:click="setSort('unit_price', '{{ $sortBy === 'unit_price' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Unit Price</span>
                                    @if($sortBy)
                                        @if($sortBy === 'unit_price')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <!--remarks-->
                            <th align="center" role="button" wire:click="setSort('remarks', '{{ $sortBy === 'remarks' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>
                                        Remarks
                                        (Age & Gender)
                                    </span>
                                    @if($sortBy)
                                        @if($sortBy === 'remarks')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
                                                @if($sortDirection === 'ASC')
                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                @else
                                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                @endif
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>


                        </tr>
                    </thead>
                    <tbody class="divide-y" wire:loading.remove wire:target="searchTerm, selectedFilter, startDate, endDate,selectedOutlet,selectedLetter">
                        @if($smsPaginate->count() > 0)
                            @foreach($smsPaginate as $itemCode )
                                <tr>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->created_at }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->firstname }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->lastname }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->outlet }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->brand }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->barcode_number }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->stock_code }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->color }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->size }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->total_quantity }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->unit_price }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->remarks }}</td>
                                    {{-- <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $loop->iteration }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $itemCode->Fullname }}</td> --}}    
                                </tr>
                            @endforeach
                                    {{-- <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5"></td>
                                    <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5"></td>
                                    <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5"></td>
                                    <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5"></td>
                                    <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5"></td>
                                    <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5"></td> 
                                    <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5"></td>
                                    <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5"></td>
                                    <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5"></td>
                                    <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5"></td>
                                    <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5">Running Total : {{ $formattedTotal }}</td> --}}
                        @else
                        {{-- <td align="center"class="border-b border-slate-200 p-4 pl-8 pr-5">Total Quantity : {{ $quantity }}</td> --}}
                            <tr>
                                <td colspan="11">
                                    <center>No items found.</center>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="block w-full bg-white" wire:loading wire:target="searchTerm, selectedFilter, startDate, endDate">
                    <div class="flex items-center justify-center py-4">
                        <svg class="animate-spin mx-auto h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        <div>
            Total Quantity: {{ $quantity }}
        </div>
        <div>
            Total Amount : {{ $formattedTotal }}
        </div>
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-10 shadow sm:rounded-bl-md sm:rounded-br-md">
        {{$smsPaginate->links() }}
    </div>

    
    

    <x-jet-dialog-modal wire:model="confirmingExport">
        <x-slot name="title">
            Export Sales Data Report Filter
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="submitExportData" id="exportForm">
                <div class="relative cols-12 gap-4">
                    <div class="col-span-6">
                        <x-jet-label>Start date</x-jet-label>
                        <x-jet-input type="datetime-local" class="block mt-1" wire:model.difer="startDate" placeholder="Start date" />
                        <x-jet-input-error for="startDate" class="mt-2" />
                    </div>
                    <div class="col-span-6">
                        <x-jet-label>End date</x-jet-label>
                        <x-jet-input type="datetime-local" class="block mt-1" wire:model.difer="endDate" placeholder="End date" />
                        <x-jet-input-error for="endDate" class="mt-2" />
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-3">
                    <x-jet-label for="brandFilter">Brand</x-jet-label>
                    <select id="brandFilter" wire:model="selectedFilter" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1">
                        <option value="">Select a brand</option>
                        @foreach($brandFilters as $brand)
                        <option value="{{ $brand['value'] }}">{{ $brand['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12 lg:col-span-3">
                    <x-jet-label for="outletFilters">Outlet</x-jet-label>
                    <select id="outletFilters" wire:model="selectedOutlet" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1">
                        <option value="">Select a outlet</option>
                        @foreach($outletFilters as $outlet)
                        <option value="{{ $outlet['value'] }}">{{ $outlet['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12 lg:col-span-3">
                    <x-jet-label for="letterFilter">Filter by Letter</x-jet-label>
                    <select id="letterFilter" wire:model="selectedLetter" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1">
                        <option value="">Select a letter</option>
                        @foreach(range('A', 'Z') as $letter)
                            <option value="{{ $letter }}">{{ $letter }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12 lg:col-span-3">
                    <x-jet-label for="search">Search</x-jet-label>
                    <x-jet-input id="search" type="text" class="block mt-1" wire:model="searchTerm" placeholder="Search" />
                </div>
                
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button>Cancel</x-jet-secondary-button>
            <x-jet-button class="ml-2" form="exportForm" wire:loading.attr="disabled" >Export</x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>




           