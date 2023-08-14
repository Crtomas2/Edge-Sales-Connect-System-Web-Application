<x-sidebar-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Sales Data List') }}
            </h2>
            <div>
                {{-- <a href="{{ route('ess-api.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    Create
                </a> --}}
            </div>
        </div>
    </x-slot>

    <div>
          <livewire:time-component/>
    </div>
  
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex items-center justify-end">
                <livewire:export-button :model="\App\Models\SMSApi::class" filetype="csv" />
            </div>
        </div>
        <livewire:sales-data-component />
    </div>
</x-sidebar-layout>

