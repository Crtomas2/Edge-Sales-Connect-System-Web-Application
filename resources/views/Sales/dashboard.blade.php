<x-sidebar-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Sales Representative Dashboard') }}
        </h2>
    </x-slot>
       
    <div class="py-10">
        <div class="max-w-7xl mx-auto  sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden text-blue-100 text-2xl font-bold shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-800 border-b  border-blue-200">
                    You're logged in! Welcome to Edge Scanner.
                </div>
            </div>
        </div>
    </div>
    <!--start: component1 -->
    <div>
        <livewire:card-component/>
    </div> 
    <!--end: component1 -->
    <!--whole Line Chart Components-->
    <div>
        @php
        $smsApi = App\Models\SMSApi::get();
        $rtotal = $smsApi->sum('unit_price');
        $formattedTotal = '₱' . number_format($rtotal, 2, '.', ',');
        $quantity = $smsApi->sum('total_quantity');
    
        $totalSalesChartModel = (new \Asantibanez\LivewireCharts\Models\LineChartModel())
            ->setTitle('Total Monthly Sales')
            ->addPoint('Total Monthly Sales', $rtotal);
    
        $totalQuantityChartModel = (new \Asantibanez\LivewireCharts\Models\LineChartModel())
            ->setTitle('Total Quantity')
            ->addPoint('Total Quantity', $quantity);   
    @endphp
      <div class="flex flex-row mt-4">
         <div class="card mb-4 w-1/2">
             <div class="card-header">
                 <h1 class="card-title mb-0 items-center"></h1>
             </div>
             <div class="card-body">
                 <div class="max-w-2xl mx-auto px-8 py-5">
                     <div class="bg-white h-64 p-4">
                         <livewire:livewire-line-chart
                             key="{{ $totalSalesChartModel->reactiveKey() }}"
                             :line-chart-model="$totalSalesChartModel"
                         />
                         <div class="text-center mt-6">
                             <h2>Total Monthly Sales: {{ $formattedTotal }}</h2>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
      
         <div class="card mb-4 w-1/2 ml-auto items-center">
             <div class="card-header">
                 <h1 class="card-title mb-0 items-center"></h1>
             </div>
             <div class="card-body">
                 <div class="max-w-2xl mx-auto px-8 py-5">
                     <div class="bg-white h-64 p-4">
                         <livewire:livewire-line-chart
                             key="{{ $totalQuantityChartModel->reactiveKey() }}"
                             :line-chart-model="$totalQuantityChartModel"
                         />
                         <div class="text-center mt-6">
                            <h2>Total Quantity: {{ $quantity }}</h2>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
      </div>
    
      @php
    $smsApi = App\Models\SMSApi::get();
    $totalSales = App\Models\SMSApi::whereDate('created_at', today())->sum('unit_price');
    $formattedTotalSales = '₱' . number_format($totalSales, 2);
    
    $totalQuantity = App\Models\SMSApi::whereDate('created_at', today())->sum('total_quantity');
    
    $totalSalesLineChartModel = (new \Asantibanez\LivewireCharts\Models\LineChartModel())
        ->setTitle('Total Daily Sales')
        ->addPoint('Total Daily Sales', $totalSales);
    
    $totalQuantityLineChartModel = (new \Asantibanez\LivewireCharts\Models\LineChartModel())
        ->setTitle('No. of Item Sold for the Day')
        ->addPoint('No. of Item Sold for the Day', $totalQuantity);
    @endphp
    <div class="flex flex-row">
        <!-- Total Daily Sales Line Chart -->
        <div class="card mb-4 w-1/2 ml-auto items-center">
            <div class="card-header">
                <h1 class="card-title mb-0 items-center"></h1>
            </div>
            <div class="card-body">
                <div class="max-w-2xl mx-auto px-8 py-5">
                    <div class="bg-white h-64 p-4">
                        <livewire:livewire-line-chart
                            key="{{$totalSalesLineChartModel->reactiveKey() }}"
                            :line-chart-model="$totalSalesLineChartModel"
                        />
                        <div class="text-center mt-6">
                            {{-- <h2>SMS API Total Cost: {{$formattedTotal}}</h2> --}}
                            <h2>Today's Total Sales: {{$formattedTotalSales}}</h2>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    
        <!-- Number of Items Sold Line Chart -->
        <div class="card mb-4 w-1/2 ml-auto items-center">
            <div class="card-header">
                <h1 class="card-title mb-0 items-center"></h1>
            </div>
            <div class="card-body">
                <div class="max-w-2xl mx-auto px-8 py-5">
                    <div class="bg-white h-64 p-4">
                        <livewire:livewire-line-chart
                            key="{{$totalQuantityLineChartModel->reactiveKey() }}"
                            :line-chart-model="$totalQuantityLineChartModel"
                        />
                        <div class="text-center mt-6">
                            {{-- <h2>SMS API Total Cost: {{$formattedTotal}}</h2> --}}
                            <h2>No. of Item Sold for the Day: {{$totalQuantity}}</h2>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    </div>
    <!--whole Line Chart Components-->
     <!--start: barcode-table-component -->
     <div class="item-center">
        <center><livewire:dashboard.barcode-table/></center>
    </div>
    <!--end: barcode-table-component -->
    <!--start: dashboard-component -->
    <div class="item-center">
        <center><livewire:dashboard-component/></center>
    </div>
    <!--end: dashboard-component -->
    <!--start: promodisers-ranking-component -->
    <div class="flex items-center">
        <livewire:ranking-component/>
    </div>   
    <!--end: promodisers-ranking-component -->

</x-sidebar-layout>