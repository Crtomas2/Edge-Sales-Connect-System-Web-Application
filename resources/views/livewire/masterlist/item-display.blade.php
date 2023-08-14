<div class="max-w-7xl mx-auto sm:px-6 py-12 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex items-center space-x-4 px-4 py-5">
            <x-jet-input type="text" class="block mt-1" wire:model="searchTerm" placeholder="Search" />
            <div class="flex-1"></div>
            <div class="flex-none">
                <x-jet-button wire:click="$emit('toggleImport', true)">Import</x-jet-button>
            </div>
            {{-- <div class="flex-none">
                <x-jet-button wire:click="createPromodiser()">Create</x-jet-button>
            </div> --}}
        </div>
        <div class="relative max-w-full overflow-x-scroll">
            <table class="table-auto overflow-scroll w-full max-w-full px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <thead class="px-4 py-3 bg-gray-200 text-right sm:px-6 border-b sm:rounded-bl-md sm:rounded-br-md">
                    <tr height="50">
                        <th align="center" role="button" wire:click="setSort('item_code', '{{ $sortBy === 'item_code' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Item No.</span>
                                @if($sortBy)
                                    @if($sortBy === 'item_code')
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
                        <th role="button" align="center" wire:click="setSort('barcode_number', '{{ $sortBy === 'barcode_number' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Barcode No.</span>
                                @if($sortBy)
                                    @if($sortBy === 'barcode_number')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" style="height: 16px; width: 16px;">
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
                        <th role="button" align="center"  wire:click="setSort('description', '{{ $sortBy === 'description' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Description</span>
                                @if($sortBy)
                                    @if($sortBy === 'description')
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
                        <th role="button" align="center" wire:click="setSort('item_division', '{{ $sortBy === 'item_division' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Item Division</span>
                                @if($sortBy)
                                    @if($sortBy === 'item_division')
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
                        <th role="button" align="center" wire:click="setSort('size_code', '{{ $sortBy === 'size_code' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Size Code</span>
                                @if($sortBy)
                                    @if($sortBy === 'size_code')
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
                        <th role="button" align="center" wire:click="setSort('color_code', '{{ $sortBy === 'color_code' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Color Code</span>
                                @if($sortBy)
                                    @if($sortBy === 'color_code')
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
                        <th role="button" align="center" wire:click="setSort('variant_code', '{{ $sortBy === 'variant_code' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Variant Code</span>
                                @if($sortBy)
                                    @if($sortBy === 'variant_code')
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
                        <th role="button" align="center" wire:click="setSort('unit_measure', '{{ $sortBy === 'unit_measure' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Unit of Measure</span>
                                @if($sortBy)
                                    @if($sortBy === 'unit_measure')
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
                        <th role="button" align="center" wire:click="setSort('barcode_class', '{{ $sortBy === 'barcode_class' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Barcode Class</span>
                                @if($sortBy)
                                    @if($sortBy === 'barcode_class')
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
                     
                        <th role="button" align="center" wire:click="setSort('created_at', '{{ $sortBy === 'created_at' && $sortDirection === 'ASC' ? 'DESC' : 'ASC'}}')">
                            <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                <span>Uploaded At</span>
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
                        {{-- <th align="center">
                            Actions
                        </th> --}}
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @if($temp_data->count() > 0)
                        @foreach($temp_data as $line)
                        <tr>
                            {{-- <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $promodiser->id }}</td> --}}
                            <td class="border-b border-slate-200 p-4 pl-8">{{ $line->item_number}}</td>
                            <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $line->barcode_number }}</td>
                            <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $line->description }}</td>
                            <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $line->item_division }}</td>
                            <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $line->size_code}}</td>
                            <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $line->color_code }}</td>
                            <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $line->variant_code }}</td>
                            <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $line->unit_measure }}</td>
                            <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $line->barcode_class }}</td>
                            <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $line->created_at }}</td>
                            <td align="right">
                                {{-- <div class="flex px-4">
                                    <button type="button" wire:click.prevent="editPromodiser({{$promodiser->id}})" class="btn btn-primary ml-2">Edit</a>
                                    <button type="button" wire:click.prevent="assignPromodiser({{$promodiser->id}})" class="btn btn-primary ml-2">Assign</a>
                                    <button type="button" wire:click.prevent="deleteConfirmation({{$promodiser->id}})" class="btn btn-danger ml-2">Delete</button>
                                </div> --}}
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr height="50">
                            <td colspan="12">
                                <center>No Items found.</center>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
            {{  $temp_data->links() }}
        </div>
    </div>

    <livewire:masterlist.import/>
</div>
