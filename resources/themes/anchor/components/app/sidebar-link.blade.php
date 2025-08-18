@props([
    'href' => '',
    'icon' => 'phosphor-house-duotone',
    'active' => false,
    'hideUntilGroupHover' => true,
    'target' => '_self',
    'ajax' => true,
])

@php
    $isActive = filter_var($active, FILTER_VALIDATE_BOOLEAN);
@endphp

<a {{ $attributes }} href="{{ $href }}" @if (($href ?? false) && $target == '_self' && $ajax) wire:navigate @else @if ($ajax) target="_blank" @endif @endif
    class="@if ($isActive) {{ 'text-zinc-900 border-zinc-200 dark:border-zinc-700 shadow-sm bg-white font-medium dark:border-white dark:bg-zinc-700/60 dark:text-zinc-100' }}@else{{ 'border-transparent' }} @endif group-hover:autoflow-auto items flex h-auto w-full items-center justify-start space-x-2 overflow-hidden rounded-lg border px-2.5 py-2 text-sm transition-colors hover:bg-zinc-100 hover:text-zinc-900 dark:hover:bg-zinc-700/60 dark:hover:text-zinc-100">
    <x-dynamic-component :component="$icon" class="h-5 w-5 flex-shrink-0" />
    <span class="duration-50 flex-shrink-0 ease-out">{{ $slot }}</span>
</a>
