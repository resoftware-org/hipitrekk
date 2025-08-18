@props([
    'position' => 'bottom',
])
<div x-data="{ dropdownOpen: false }"
    :class="{ 'block z-50 w-auto lg:w-full dark:bg-zinc-900 dark:border-zinc-800': open, 'hidden': !open }"
    class="relative flex-shrink-0 dark:text-zinc-200 sm:flex sm:w-auto sm:items-center sm:bg-transparent sm:p-0" x-cloak>
    <button @click="dropdownOpen=!dropdownOpen"
        class="group-hover:autoflow-auto items flex w-full w-full items-center justify-between space-x-1 space-x-1.5 overflow-hidden rounded-lg p-2.5 text-[13px] hover:bg-zinc-200/70 hover:text-black dark:hover:bg-zinc-700/60 dark:hover:text-zinc-100 lg:p-2">
        <span class="relative flex items-center space-x-2">
            <x-avatar src="{{ auth()->user()->avatar() }}" alt="{{ auth()->user()->name }} photo" size="2xs" />
            <span @class([
                'flex-shrink-0 ease-out duration-50',
                'hidden' => $position != 'bottom',
            ])>{{ Auth::user()->name }}</span>
        </span>
        <svg :class="{ 'rotate-180': '{{ $position }}' == 'bottom' }"
            class="relative right-0 mr-4 h-4 w-4 -translate-x-0.5 fill-current duration-0 ease-out group-hover:delay-150 group-hover:duration-300"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <div wire:ignore x-show="dropdownOpen" @mouse.leave="dropdownOpen=false" @click.away="dropdownOpen=false"
        x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 sm:scale-95"
        x-transition:enter-end="transform opacity-100 sm:scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 sm:scale-100"
        x-transition:leave-end="transform opacity-0 sm:scale-95" @class([
            'z-50',
            'left-0  absolute w-full bottom-0 sm:origin-bottom mb-12' =>
                $position == 'bottom',
            'top-0 sm:origin-top right-0 mr-5 mt-14 w-full max-w-xs fixed' =>
                $position != 'bottom',
        ]) x-cloak>
        <div
            class="mt-1 rounded-xl border border-zinc-200/70 bg-white pt-0 text-zinc-600 shadow-md dark:border-white/10 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white/70 dark:shadow-xl sm:space-y-0.5 sm:border">
            <div class="overflow-hidden text-ellipsis whitespace-nowrap px-[18px] py-3.5 text-[13px] font-bold">
                {{ auth()->user()->email }}</div>
            <div class="my-2 h-px w-full bg-slate-100 dark:bg-zinc-700"></div>
            <div class="relative px-2 py-1">
                <x-app.light-dark-toggle></x-app.light-dark-toggle>
            </div>
            <div class="my-2 h-px w-full bg-slate-100 dark:bg-zinc-700"></div>
            <div class="relative flex flex-col space-y-1 p-2">
                <x-app.sidebar-link :hideUntilGroupHover="false" href="{{ route('notifications') }}" icon="phosphor-bell-duotone"
                    active="false">Notifications</x-app.sidebar-link>
                <x-app.sidebar-link :hideUntilGroupHover="false" href="{{ '/profile/' . auth()->user()->username }}"
                    icon="phosphor-planet-duotone" active="false">Public Profile</x-app.sidebar-link>
                {{-- @subscriber
                                <x-app.sidebar-link href="{{ '/profile/' . auth()->user()->username }}" icon="phosphor-credit-card">Manage Subscription</x-app.sidebar-link>
                @endsubscriber --}}

                <x-app.sidebar-link :hideUntilGroupHover="false" href="{{ route('settings.profile') }}"
                    icon="phosphor-gear-duotone" active="false">Settings</x-app.sidebar-link>
                @notsubscriber
                    <x-app.sidebar-link href="/settings/subscription"
                        icon="phosphor-sparkle-duotone">Upgrade</x-app.sidebar-link>
                @endnotsubscriber
                @if (auth()->user()->isAdmin())
                    <x-app.sidebar-link :hideUntilGroupHover="false" :ajax="false" href="/admin" icon="phosphor-crown-duotone"
                        active="false">View Admin</x-app.sidebar-link>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button onclick="event.preventDefault(); this.closest('form').submit();"
                        class="relative flex w-full cursor-pointer select-none items-center rounded-lg p-2 text-sm outline-none transition-colors hover:bg-zinc-200 hover:text-zinc-700 data-[disabled]:pointer-events-none data-[disabled]:opacity-50 dark:hover:bg-zinc-700/60 dark:hover:text-zinc-100">
                        <x-phosphor-sign-out-duotone class="ml-1 mr-2 h-5 w-auto flex-shrink-0" />
                        <span>Log out</span>
                    </button>
                </form>
                @impersonating
                    <x-app.sidebar-link href="{{ route('impersonate.leave') }}" icon="phosphor-user-circle-duotone"
                        active="false">Leave impersonation</x-app.sidebar-link>
                @endImpersonating
            </div>
        </div>
    </div>
</div>
