<div class="flex justify-center ml-2">
    <div class="flex">
        <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Admin Users Count</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{ $totalUser }}</p>
        </a>

        <div class="px-4">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sales Representative Users Count</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{ $totalUsers }}</p>
            </a>
        </div>

        <div class="px-4">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Sales Collected</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{ $formattedTotal }}</p>
            </a>
        </div>
        <div class="px-4">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Monthly Collected Sales</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{ $monthTotal }}</p>
            </a>
        </div>
       
     
        <div class="px-4">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Quantity</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{ $quantity }}</p>
            </a>
        </div>
        
        <div class="px-4">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Daily Sales</h5>
                {{-- <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">No. of Item Sold for the Day</h5> --}}
                <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{ $totalSales }}</p>
            </a>
        </div>
        <div class="px-4">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">No. of Item Sold for the Day</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{ $totalQuantity }}</p>
            </a>
        </div>
        
    </div>
</div>


{{-- <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Amount of Sales</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $formattedTotal }}</p>
</a> --}}

{{-- <div class="px-4">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Active Promodisers</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $active }}</p>
            </a>
        </div> --}}