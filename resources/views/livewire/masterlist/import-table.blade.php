<div class="relative border border-gray-300 rounded-md overflow-hidden">
    <table class="w-full text-left divide-y table-auto">
        <thead>
            <tr class="bg-gray-50 dark:bg-ray-500/10">
                <th class="p-0">
                    <button type="button" class="flex rows-center w-full 4 py-2 whitespace-nowrap space-x-1 font-medium text-sm text-gray-600 dark:text-gray-300 cursor-default">
                        <span>Item No.</span>
                    </button>
                </th>
                <th class="p-0">
                    <button type="button" class="flex items-center w-full px-4 py-2 whitespace-nowrap space-x-1 font-medium text-sm text-gray-600 dark:text-gray-300 cursor-default">
                        <span>Barcode No.</span>
                    </button>
                </th>
                <th class="p-0">
                    <button type="button" class="flex items-center w-full px-4 py-2 whitespace-nowrap space-x-1 font-medium text-sm text-gray-600 dark:text-gray-300 cursor-default">
                        <span>Description</span>
                    </button>
                </th>
                <th class="p-0">
                    <button type="button" class="flex items-center w-full px-4 py-2 whitespace-nowrap space-x-1 font-medium text-sm text-gray-600 dark:text-gray-300 cursor-default">
                        <span>Item Division</span>
                    </button>
                </th>
                <th class="p-0">
                    <button type="button" class="flex items-center w-full px-4 py-2 whitespace-nowrap space-x-1 font-medium text-sm text-gray-600 dark:text-gray-300 cursor-default">
                        <span>Size Code</span>
                    </button>
                </th>
                <th class="p-0">
                    <button type="button" class="flex items-center w-full px-4 py-2 whitespace-nowrap space-x-1 font-medium text-sm text-gray-600 dark:text-gray-300 cursor-default">
                        <span>Color Code</span>
                    </button>
                </th>
                <th class="p-0">
                    <button type="button" class="flex items-center w-full px-4 py-2 whitespace-nowrap space-x-1 font-medium text-sm text-gray-600 dark:text-gray-300 cursor-default">
                        <span>Variant Code</span>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            @if($temp_data->count() > 0)
            @foreach($temp_data as $row)
            <tr>
                <td>
                    <div class="px-4 py-3">
                        {{ $row->item_number }}
                    </div>
                </td>
                <td>
                    <div class="px-4 py-3">
                        {{ $row->barcode_number }}
                    </div>
                </td>
                <td>
                    <div class="px-4 py-3">
                        {{ $row->description }}
                    </div>
                </td>
                <td>
                    <div class="px-4 py-3">
                        {{ $row->item_division }}
                    </div>
                </td>
                <td>
                    <div class="px-4 py-3">
                        {{ $row->size_code }}
                    </div>
                </td>
                <td>
                    <div class="px-4 py-3">
                        {{ $row->color_code }}
                    </div>
                </td>
                <td>
                    <div class="px-4 py-3">
                        {{ $row->variant_code }}
                    </div>
                </td>
                <td>
                    <div class="px-4 py-3">
                        {{ $row->unit_measure }}
                    </div>
                </td>
                <td>
                    <div class="px-4 py-3">
                        {{ $row->barcode_class }}
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6">
                    <div class="px-4 py-3 text-center">
                        No data yet.
                    </div>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="py-2 px-4 border-t border-gray-300 bg-gray-50">
        {{ $temp_data->links() }}
    </div>
</div>
