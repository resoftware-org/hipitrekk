<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('theme::partials.head', ['seo' => $seo ?? null])
    <!-- Used to add dark mode right away, adding here prevents any flicker -->
    <script>
        if (typeof(Storage) !== "undefined") {
            if (localStorage.getItem('theme') && localStorage.getItem('theme') == 'dark') {
                document.documentElement.classList.add('dark');
            }
        }
    </script>
</head>

<body x-data class="@if (config('wave.dev_bar')) {{ 'pb-10' }} @endif flex flex-col bg-zinc-50 dark:bg-zinc-900 lg:min-h-screen">

    <x-app.sidebar />

    <div class="flex min-h-screen flex-col justify-stretch pl-0 lg:pl-64">
        {{-- Mobile Header --}}
        <header class="sticky top-0 z-40 -mb-px block flex h-[72px] items-center justify-between border-b border-zinc-200/70 bg-gray-50 px-5 dark:border-zinc-700 dark:bg-zinc-900 lg:hidden">
            <button x-on:click="window.dispatchEvent(new CustomEvent('open-sidebar'))" class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md text-zinc-700 hover:bg-gray-200/70 dark:text-zinc-200 dark:hover:bg-zinc-700/70">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                </svg>
            </button>
            <x-app.user-menu position="top" />
        </header>
        {{-- End Mobile Header --}}
        <main class="flex flex-1 flex-col lg:h-screen lg:pt-4 xl:px-0">
            <div class="h-full flex-1 overflow-hidden border-l-0 border-t border-zinc-200/70 bg-white dark:border-zinc-700 dark:bg-zinc-800 lg:rounded-tl-xl lg:border-l">
                <div class="scrollbar-hidden h-full w-full px-5 sm:px-8 lg:overflow-y-scroll lg:px-5 lg:pt-5">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    @livewire('notifications')
    @if (!auth()->guest() && auth()->user()->hasChangelogNotifications())
        @include('theme::partials.changelogs')
    @endif
    @include('theme::partials.footer-scripts')
    {{ $javascript ?? '' }}

</body>

</html>
