<a href="{{ $href }}"
    class="@if ($href == RalphJSmit\Livewire\Urls\Facades\Url::current()) {{ 'bg-zinc-100 dark:bg-zinc-700/70 text-zinc-900 dark:text-zinc-200 font-semibold' }}@else{{ 'hover:bg-zinc-100 hover:dark:bg-zinc-700/70 hover:dark:text-zinc-200 text-zinc-600 dark:text-zinc-400 font-medium' }} @endif focus-visible:ring-ring group relative flex items-center justify-start whitespace-nowrap rounded-md px-4 py-3 text-sm transition-colors focus-visible:outline-none focus-visible:ring-1 disabled:pointer-events-none disabled:opacity-50 md:py-1.5">
    <span class="@if ($href == RalphJSmit\Livewire\Urls\Facades\Url::current()) {{ 'w-full h-1 lg:h-5/6' }}@else{{ 'h-0' }} @endif absolute bottom-0 left-0 block w-full translate-y-2 rounded-full transition-all duration-300 ease-out lg:top-1/2 lg:w-1 lg:-translate-x-1.5 lg:-translate-y-1/2"
        style="background:{{ config('wave.primary_color') }}"></span>
    <x-dynamic-component :component="$icon" class="h-5 w-5 flex-shrink-0 md:-ml-1.5 md:mr-1 md:h-4 md:w-4" />
    <span class="hidden truncate md:inline-block">{{ $slot }}</span>
</a>
