@props([
    'title' => '',
    'description' => '',
    'border' => true,
])

<div
    class="@if ($border) {{ 'pb-5 border-b border-gray-200 dark:border-gray-800' }} @endif space-y-0.5">
    <h3 class="text-lg font-semibold tracking-tight dark:text-zinc-100 sm:text-xl">{{ $title ?? '' }}</h3>
    <p class="text-xs text-zinc-500 dark:text-zinc-400 sm:text-sm">{{ $description ?? '' }}</p>
</div>
