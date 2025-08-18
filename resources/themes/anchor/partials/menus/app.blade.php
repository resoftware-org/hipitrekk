<div x-data="{ open: false }" class="flex h-full md:flex-1">
    <div class="hidden h-full flex-1 space-x-8 font-semibold md:flex">
        <a href="{{ route('wave.dashboard') }}"
            class="@if (Request::is('dashboard')) {{ 'text-zinc-900' }}@else{{ 'text-zinc-800 hover:text-zinc-900' }} @endif inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm leading-5 transition duration-150 ease-in-out focus:outline-none">Dashboard</a>
        <div x-data="{ dropdown: false }" @mouseenter="dropdown = true" @mouseleave="dropdown=false" @click.away="dropdown=false"
            class="relative inline-flex cursor-pointer items-center border-b-2 border-transparent px-1 pt-1 text-sm leading-5 text-zinc-800 transition duration-150 ease-in-out hover:border-zinc-300 hover:text-zinc-900">
            <span>Resources</span>
            <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <div x-show="dropdown" x-transition:enter="duration-200 ease-out scale-95"
                x-transition:enter-start="opacity-50 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition duration-100 ease-in scale-100"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="absolute left-1/2 top-0 mt-20 w-screen max-w-xs -translate-x-1/2 transform px-2 sm:px-0" x-cloak>
                <div class="rounded-xl border border-zinc-100 shadow-md">
                    <div class="shadow-xs overflow-hidden rounded-xl">
                        <div class="relative z-20 grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                            <a href="{{ url('docs') }}"
                                class="-m-3 block space-y-1 rounded-xl px-5 py-3 transition duration-150 ease-in-out hover:border-l-2 hover:border-blue-500 hover:bg-zinc-100">
                                <p class="text-base font-medium leading-6 text-zinc-900">
                                    Documentation
                                </p>
                                <p class="text-xs leading-5 text-zinc-500">
                                    View The Wave Docs
                                </p>
                            </a>
                            <a href="https://devdojo.com/course/wave" target="_blank"
                                class="-m-3 block space-y-1 rounded-xl px-5 py-3 transition duration-150 ease-in-out hover:bg-zinc-100">
                                <p class="text-base font-medium leading-6 text-zinc-900">
                                    Videos
                                </p>
                                <p class="text-xs leading-5 text-zinc-500">
                                    Watch videos to learn how to use Wave.
                                </p>
                            </a>
                            <a href="{{ route('blog') }}"
                                class="-m-3 block space-y-1 rounded-xl px-5 py-3 transition duration-150 ease-in-out hover:bg-zinc-100">
                                <p class="text-base font-medium leading-6 text-zinc-900">
                                    From The Blog
                                </p>
                                <p class="text-xs leading-5 text-zinc-500">
                                    View your application blog.
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#"
            class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm leading-5 transition duration-150 ease-in-out hover:text-zinc-900">Support</a>
    </div>

    <div class="flex sm:ml-6 sm:items-center">

        @if (auth()->user()->onTrial())
            <div class="relative hidden h-full items-center justify-center md:flex">
                <span class="rounded-md border border-zinc-200 bg-red-100 px-3 py-1 text-xs text-red-600">You have
                    {{ auth()->user()->daysLeftOnTrial() }} @if (auth()->user()->daysLeftOnTrial() > 1)
                        {{ 'Days' }}@else{{ 'Day' }}
                    @endif left on your Trial</span>
            </div>
        @endif

        @include('theme::partials.notifications')

        <!-- Profile dropdown -->
        <div @click.away="open = false" class="relative ml-3 flex h-full items-center" x-data="{ open: false }">
            <div>
                <button @click="open = !open"
                    class="flex rounded-full border-2 border-transparent text-sm transition duration-150 ease-in-out focus:border-zinc-300 focus:outline-none"
                    id="user-menu" aria-label="User menu" aria-haspopup="true" x-bind:aria-expanded="open"
                    aria-expanded="true">
                    <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->avatar() . '?' . time() }}"
                        alt="{{ auth()->user()->name }}'s Avatar">
                </button>
            </div>

            <div x-show="open" x-transition:enter="duration-100 ease-out scale-95"
                x-transition:enter-start="opacity-50 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition duration-50 ease-in scale-100"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 top-0 mt-20 w-56 origin-top-right transform rounded-xl" x-cloak>

                <div class="rounded-xl border border-zinc-100 bg-white shadow-md" role="menu"
                    aria-orientation="vertical" aria-labelledby="options-menu">
                    <a href="{{ route('wave.profile', auth()->user()->username) }}"
                        class="block px-4 py-3 text-zinc-700 hover:text-zinc-800">

                        <span class="block truncate text-sm font-medium leading-tight">
                            {{ auth()->user()->name }}
                        </span>
                        <span class="text-xs leading-5 text-zinc-600">
                            View Profile
                        </span>
                    </a>
                    @impersonating
                        <a href="{{ route('impersonate.leave') }}"
                            class="block border-t border-zinc-100 bg-blue-50 px-4 py-2 text-sm leading-5 text-blue-900 text-zinc-700 hover:bg-blue-100 focus:bg-blue-200 focus:outline-none">Leave
                            impersonation</a>
                    @endImpersonating
                    <div class="border-t border-zinc-100"></div>
                    <div class="py-1">

                        <div class="block px-4 py-1">
                            <span
                                class="my-1 -ml-1 inline-block rounded bg-zinc-200 px-2 text-xs font-medium leading-5 text-zinc-600">{{ auth()->user()->roles->first()->name }}</span>
                        </div>
                        @trial
                            <a href="{{ route('wave.settings', 'plans') }}"
                                class="block px-4 py-2 text-sm leading-5 text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900 focus:bg-zinc-100 focus:text-zinc-900 focus:outline-none">Upgrade
                                My Account</a>
                        @endtrial
                        @if (!auth()->guest() && auth()->user()->isAdmin())
                            <a href="/admin"
                                class="block px-4 py-2 text-sm leading-5 text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900 focus:bg-zinc-100 focus:text-zinc-900 focus:outline-none"><i
                                    class="fa fa-bolt"></i> Admin</a>
                        @endif
                        <a href="{{ route('wave.profile', auth()->user()->username) }}"
                            class="block px-4 py-2 text-sm leading-5 text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900 focus:bg-zinc-100 focus:text-zinc-900 focus:outline-none">My
                            Profile</a>
                        <a href="{{ route('wave.settings') }}"
                            class="block px-4 py-2 text-sm leading-5 text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900 focus:bg-zinc-100 focus:text-zinc-900 focus:outline-none">Settings</a>

                    </div>
                    <div class="border-t border-zinc-100"></div>
                    <div class="py-1">
                        <a href="{{ route('logout') }}"
                            class="block w-full px-4 py-2 text-left text-sm leading-5 text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900 focus:bg-zinc-100 focus:text-zinc-900 focus:outline-none"
                            role="menuitem">
                            Sign out
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
