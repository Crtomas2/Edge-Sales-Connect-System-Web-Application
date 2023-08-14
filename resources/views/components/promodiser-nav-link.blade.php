@props(['active' => false, 'icon' => null])

@php
    $activeClasses = $active 
        ? 'text-blue-700 bg-blue-100 hover:bg-blue-200'
        : 'hover:bg-gray-200'

@endphp
<a {{ $attributes->merge(['class' => 'flex items-center py-2 px-2 -mx-2 rounded ' . $activeClasses]) }}>
    {{ $icon }}
    <template x-if="open">
        <span class="ml-2 font-bold">{{ $slot }}</span>
    </template>
</a>