<x-sidebar-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Item Master list') }}
            </h2>
        </div>
    </x-slot>

        <livewire:masterlist.item-display/>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="needs-validation" method="POST" action="{{ route('test-upload.upload') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="relative p-4">
                        <div>
                            <div class="flex items-center">
                                <div class="flex-1">
                                    <label for="file" class="col-sm-2 col-form-label">
                                        Data File
                                    </label><br>

                                    <small id="fileHelpBlock" class="form-text text-muted">
                                        File must be an excel Excel file or a comma seperated value(CSV) .
                                    </small>
                                </div>
                                <div class="flex-1">
                                    <input type="file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file" name="file" aria-describedBy="fileHelpBlock" required />
                                    @error('file') 
                                        <x-jet-input-error>
                                            {{ $message }} 
                                        </x-jet-input-error>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        <x-jet-button>
                            Submit
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table-auto w-full px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <thead class="px-4 py-3 bg-gray-200 text-right sm:px-6 border-b sm:rounded-bl-md sm:rounded-br-md">
                        <tr height="50">
                            <th align="center" role="button">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Item Code</span>
                                </div>
                            </th>
                            <th align="center" role="button">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Barcode No.</span>
                                </div>
                            </th>
                            <th align="center" role="button">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Color</span>
                                </div>
                            </th>
                            <th role="button" align="center">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Size Code</span>
                                </div>
                            </th>
                            <th role="button" align="center">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Unit of Measure Code</span>
                                </div>
                            </th>
                            <th role="button" align="center">
                                <div class="flex items-center justify-center space-x-4 py-2 pl-8 pr-4">
                                    <span>Barcode Class</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @if($temp_data->count() > 0)
                            @foreach($temp_data as $row)
                            <tr>
                                <td class="border-b border-slate-200 p-4 pl-8">{{ $row->item_code }}</td>
                                <td align="center" class="border-b border-slate-200 p-4 pl-8">{{ $row->barcode_number }}</td>
                                <td class="border-b border-slate-200 p-4 pl-8">{{ $row->color }}</td>
                                <td class="border-b border-slate-200 p-4 pl-8">{{ $row->size_code }}</td>
                                <td class="border-b border-slate-200 p-4 pl-8">{{ $row->unit_measure }}</td>
                                <td class="border-b border-slate-200 p-4 pl-8">{{ $row->barcode_class }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr height="50">
                                <td colspan="6">
                                    <center>No temporary data found.</center>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="flex items-center justify-between px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <div class="flex-1 px-4 py-3 bg-gray-50 text-right sm:px-6">
                        {{ $temp_data->links() }}
                    </div>
                    
                    <form action="{{ route('test-upload.store') }}" method="POST">
                        @csrf
                        <x-jet-button>
                            Submit
                        </x-jet-button>
                    </form>
                </div>
            </div>
        </div>       
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
        })();
    </script> --}}
</x-sidebar-layout>

