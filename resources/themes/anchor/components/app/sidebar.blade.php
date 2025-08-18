<div x-data="{ sidebarOpen: false }" @open-sidebar.window="sidebarOpen = true" x-init="$watch('sidebarOpen', function(value) {
    if (value) { document.body.classList.add('overflow-hidden'); } else { document.body.classList.remove('overflow-hidden'); }
});"
    class="relative z-50 w-screen md:w-auto" x-cloak>
    {{-- Backdrop for mobile --}}
    <div x-show="sidebarOpen" @click="sidebarOpen=false"
        class="fixed right-0 top-0 z-50 h-screen w-screen bg-black/20 duration-300 ease-out dark:bg-white/10"></div>

    {{-- Sidebar --}}
    <div :class="{ '-translate-x-full': !sidebarOpen }"
        class="@if (config('wave.dev_bar')) {{ 'pb-10' }} @endif group fixed left-0 top-0 z-50 flex h-dvh w-64 -translate-x-full items-stretch overflow-hidden bg-zinc-50 transition-[width,transform] duration-150 ease-out dark:bg-zinc-900 md:h-screen lg:translate-x-0">
        <div class="flex h-svh w-full flex-col justify-between overflow-auto pb-2.5 pt-4 md:h-full">
            <div class="relative flex flex-col">
                <button x-on:click="sidebarOpen=false"
                    class="ml-4 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md text-zinc-400 hover:bg-gray-200/70 hover:text-zinc-800 dark:hover:bg-zinc-700/70 dark:hover:text-zinc-200 lg:hidden">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="flex items-center space-x-2 px-5">
                    <a href="/"
                        class="flex items-center justify-center space-x-1 py-4 pl-0.5 font-bold text-zinc-900">
                        <x-logo class="h-7 w-auto" />
                    </a>
                </div>
                <div class="flex items-center px-4 pb-3 pt-1">
                    <div class="relative flex h-full w-full items-center rounded-lg">
                        <x-phosphor-magnifying-glass
                            class="absolute left-0 ml-2 h-5 w-5 -translate-y-px text-gray-400" />
                        <input type="text"
                            class="duration-50 ease w-full rounded-lg border border-zinc-200 bg-zinc-200/70 py-2 pl-8 text-sm focus:border-zinc-300 focus:bg-white focus:ring focus:ring-zinc-200 dark:border-zinc-700/70 dark:bg-zinc-950 dark:text-zinc-200 dark:placeholder-zinc-400 dark:ring-zinc-700/70 dark:focus:border-zinc-700 dark:focus:ring-zinc-700/70"
                            placeholder="Search">
                    </div>
                </div>

                <div
                    class="flex h-full w-full flex-col items-center justify-start space-y-1.5 px-4 text-slate-600 dark:text-zinc-400">
                    <x-app.sidebar-link href="/dashboard" icon="phosphor-house"
                        :active="Request::is('dashboard')">Dashboard</x-app.sidebar-link>
                    <x-app.sidebar-link href="#" icon="phosphor-cube" :active="Request::is('map')">View
                        Map</x-app.sidebar-link>
                    <x-app.sidebar-link href="#" icon="phosphor-compass"
                        :active="Request::is('map.compass')">Compass</x-app.sidebar-link>
                    <x-app.sidebar-link href="#" icon="phosphor-line-segments" :active="Request::is('planner')">Route
                        planner</x-app.sidebar-link>
                    <x-app.sidebar-link href="#" icon="phosphor-bookmarks"
                        :active="Request::is('bookmarks')">Bookmarks</x-app.sidebar-link>
                    <x-app.sidebar-link href="/journeys" icon="phosphor-footprints"
                        :active="Request::is('journeys')">Journeys</x-app.sidebar-link>
                    <x-app.sidebar-link href="#" icon="phosphor-pencil-line"
                        active="false">Stories</x-app.sidebar-link>
                </div>
            </div>

            <div class="relative space-y-1.5 px-2.5 text-zinc-700 dark:text-zinc-400">

                <div x-show="sidebarTip" x-data="{ sidebarTip: $persist(true) }" class="px-1 py-3" x-collapse x-cloak>
                    <div
                        class="relative w-full space-y-1 rounded-lg border border-zinc-200/60 bg-zinc-50 px-4 py-3 text-zinc-700 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-100">
                        <button @click="sidebarTip=false"
                            class="absolute right-0 top-0 z-50 mr-2.5 mt-2.5 cursor-pointer rounded-full p-1.5 text-zinc-500 opacity-80 hover:bg-zinc-100 hover:opacity-100 dark:text-zinc-400 hover:dark:bg-zinc-700 hover:dark:text-zinc-300">
                            <x-phosphor-x-bold class="h-3 w-3" />
                        </button>
                        <h5 class="-translate-y-0.5 pb-1 text-sm font-bold">Under development</h5>
                        <p class="block text-balance pb-1 text-xs opacity-80">App: <em>{{ config('app.url') }}</em></p>
                        <p class="block text-balance pb-1 text-xs opacity-80">App version: <x-version /></p>
                    </div>
                </div>

                <x-app.sidebar-link :href="route('changelogs')" icon="phosphor-book-open-text-duotone"
                    :active="Request::is('changelog') || Request::is('changelog/*')">Changelog</x-app.sidebar-link>

                <div class="my-2 h-px w-full bg-slate-100 dark:bg-zinc-700"></div>
                <x-app.user-menu />
            </div>
        </div>
    </div>
</div>
