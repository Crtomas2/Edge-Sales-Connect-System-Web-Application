<x-sidebar-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Promo Merchandiser List') }}
            </h2>
        </div>
    </x-slot>
    <div> <livewire:promodisers-component /> </div>
    
</x-sidebar-layout>