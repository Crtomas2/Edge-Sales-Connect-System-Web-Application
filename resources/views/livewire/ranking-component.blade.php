<div class="container mx-auto items-center" style="padding: 30px;">
    <div style="border: 1px lightgray solid; border-radius: 5px;"> 
        <div style="border-bottom: 1px #d3d3d3 solid; background-color:#f7f7f7; padding: 10px;">
            <center><h1 class="text-xl font-bold">Total No. of Item Sold Per Promo Merchandiser</h1></center>
        </div>
        <div style="background-color: white; padding:10px;">
            <div class="table-auto">
                <table class="table-auto container mx-auto px-8">
                    <thead class="py-10">
                        <tr>
                            <th align="center">FIRSTNAME</th>
                            <th align="center">LASTNAME</th>
                            <th align="center">TOTAL QUANTITY</th>
                            <th align="center">TOTAL AMOUNT</th>
                            <th align="center">TIMESTAMP</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y items-center">
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
                              <x-jet-label for="search">Search</x-jet-label>
                              <x-jet-input id="search" type="text" class="block mt-1" wire:model="searchTerm" placeholder="Search" />
                          </div>
                          <div class="mr-4">
                              <x-jet-label for="letterFilter">Filter by Letter</x-jet-label>
                              <select id="letterFilter" wire:model="selectedLetter" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1">
                                  <option value="">Select a letter</option>
                                  @foreach(range('A', 'Z') as $letter)
                                      <option value="{{ $letter }}">{{ $letter }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="pt-5">
                              <x-jet-button wire:click="resetDateFilter">Clear</x-jet-button>
                          </div>
                      </div>
                        @if ($promodiser->count() > 0)
                            @foreach ($promodiser as $rank)
                                <tr>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $rank->firstname }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $rank->lastname }}</td>   
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $rank->total }}</td>     
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ '₱' . number_format($rank->total_amount, 2, '.', ',') }}</td>
                                    <td align="center" class="border-b border-slate-200 p-4 pl-8 pr-5">{{ $rank->created_at }}</td>     
                                </tr>    
                                @if ($loop->last && $topPromodisersOfMonth->isNotEmpty())
                                    <tr>
                                        <td colspan="5" class="border-b border-slate-200 p-4 pl-8 pr-5">
                                            <strong>Top Promodisers of the Month:</strong>
                                            @foreach ($topPromodisersOfMonth as $promodiser)
                                                {{ $promodiser->firstname }} {{ $promodiser->lastname }} ({{ $promodiser->total }}),
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <center>No Information Available</center>
                                </td>
                            </tr>
                        @endif 
                    </tbody>
                </table>
            </div> 
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-10 shadow sm:rounded-bl-md sm:rounded-br-md">
                {{  $promodiser->links() }}
            </div>
        </div>
    </div> 
  </div>
  