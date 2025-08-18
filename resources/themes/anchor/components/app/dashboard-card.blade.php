<a href="{{ $href ?? '' }}" @if ($target ?? false) target="_blank" @endif
    class="group relative flex w-full overflow-hidden rounded-lg border border-slate-200 bg-white p-5 duration-300 ease-out hover:scale-[1.01] dark:border-zinc-700 dark:bg-zinc-800">
    <span class="relative flex h-full flex-col items-start justify-center space-y-3 pb-1 pr-0">
        <span
            class="block text-lg font-bold leading-tight tracking-tight text-slate-700 dark:text-white">{{ $title ?? '' }}</span>
        <span class="block text-sm opacity-60 dark:text-zinc-200">{{ $description ?? '' }}</span>
        <span
            class="relative -mt-1 mb-2 inline-flex w-auto items-center justify-start text-xs leading-none tracking-tight text-slate-600 dark:text-slate-300">
            <span class="mr-0 inline-block flex-shrink-0">{{ $linkText ?? '' }}</span>
            <svg class="ml-2 mt-0.5 stroke-slate-600 stroke-1" fill="none" width="10" height="10"
                viewBox="0 0 10 10" aria-hidden="true">
                <path class="opacity-0 transition group-hover:opacity-100" d="M0 5h7"></path>
                <path class="transition group-hover:translate-x-[3px]" d="M1 1l4 4-4 4"></path>
            </svg>
            <span
                class="absolute bottom-0 left-0 h-px w-0 translate-y-1 bg-slate-400 duration-200 ease-out group-hover:w-full"></span>
        </span>
    </span>
    <img src="{{ $image ?? '' }}" class="h-32 w-auto dark:brightness-90 dark:invert">
</a>
