<div {{ $attributes->twMerge('lg:px-5 mx-auto w-full lg:px-0') }}>
    <a href="{{ $href ?? '' }}" wire:navigate
        class="group mb-3 inline-flex cursor-pointer items-center rounded-full border border-zinc-200 bg-zinc-100 px-2.5 py-1.5 text-xs font-semibold text-zinc-900 md:mb-6 lg:mb-1">
        <svg class="relative -ml-0.5 mr-2 h-3.5 w-3.5 translate-x-1 duration-200 ease-out group-hover:translate-x-0.5"
            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        {{ $text ?? '' }}
    </a>
</div>
