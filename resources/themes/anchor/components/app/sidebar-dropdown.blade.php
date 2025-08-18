<div x-data="{ {{ $id }}: {{ $open ?? false }} }"
    :class="{
        'bg-zinc-200/70 dark:bg-zinc-800 dark:ring-zinc-800 ease-out duration-300 ring-2 ring-zinc-200/50 rounded-lg': {{ $id }} ==
            true
    }"
    class="relative w-full select-none">
    <div @click="{{ $id }}=!{{ $id }}"
        class="@if ($active) {{ 'text-zinc-900 bg-white border-zinc-200 shadow-sm font-medium dark:bg-zinc-700/60 dark:text-zinc-100' }} @endif duration-50 group-hover:autoflow-auto items flex h-auto w-full cursor-pointer items-center justify-start overflow-hidden rounded-lg border px-2.5 py-2 text-sm transition-colors ease-linear"
        :class="{
            'text-zinc-900 bg-white border-zinc-200 dark:border-zinc-700 shadow-sm font-medium dark:bg-zinc-700/60 dark:text-zinc-100': {{ $id }} ==
                true,
            'hover:bg-zinc-100 dark:hover:bg-zinc-700/60 hover:text-zinc-900 border-transparent dark:hover:text-zinc-100': (
                {{ $id }} == false && {{ !$active }})
        }">
        <div class="relative flex h-auto w-full items-center">
            <x-dynamic-component :component="$icon" class="mr-2 h-5 w-5 flex-shrink-0" />
            <span class="mr-0">{{ $text }}</span>
            <span :class="{ 'rotate-180': {{ $id }} == true }"
                class="ml-auto mr-0.5 h-4 w-4 duration-300 ease-out">
                <x-phosphor-caret-down class="h-full w-full" />
            </span>
        </div>

        <template x-teleport="#{{ $id }}">
            <div class="relative space-y-1 p-1" x-show="{{ $id }}" x-collapse x-cloak>
                {{ $slot }}
            </div>
        </template>
    </div>

    <div id="{{ $id }}"></div>

</div>
