<x-sidebar-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Store Master List') }}
            </h2>
        </div>
    </x-slot>

    <livewire:stores-table />
</x-sidebar-layout>