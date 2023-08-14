<x-app-layout>
    @php
        $promodiserCount = \App\Models\Promodisers::all()->count();
        $storeCount = \App\Models\StoreItem::all()->count();
        $salesdataCount = \App\Models\SMSApi::all()->count();

        $columnChartModel = (new \Asantibanez\LivewireCharts\Models\ColumnChartModel())
            ->setTitle('Summary View per Tabs')
            ->addColumn('Promodisers', $promodiserCount, '#f6ad55')
            ->addColumn('Stores', $storeCount, '#fc8181')
            ->addColumn('SalesData', $salesdataCount, '#90cdf4')

        ;
    @endphp

    <div class="max-w-2xl mx-auto px-8 py-4">
        <div class=" bg-white h-64 p-4">
            <livewire:livewire-column-chart
                :column-chart-model="$columnChartModel"
            />
        </div>
    </div>
</x-app-layout> 

