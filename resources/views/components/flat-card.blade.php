@props(['title' => null, 'footer' => null])

<div {{ $attributes->merge(['class' => 'relative bg-white shadow rounded-md overflow-hidden'])}}>
    @isset($title)
    <div class="relative py-4 px-4 border-b">
        <span class="text-base font-bold">
            {{ $title }}
        </span>
    </div>
    @endisset
    <div class="relative py-4 px-4">
        {{ $slot }}
    </div>
    @isset($footer)
    <div class="border-t bg-gray-100 text-xs text-gray-500 px-4 py-1">
        {{ $footer }}
    </div>
    @endisset
</div>