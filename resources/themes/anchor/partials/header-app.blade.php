<header x-data="{ mobileMenuOpen: false }" class="absolute z-30 w-full">
    <x-container>
        <div class="relative z-30 flex h-24 items-center justify-between md:space-x-8">
            <div class="inline-flex">
                <!-- data-replace='{ "translate-y-12": "translate-y-0", "scale-110": "scale-100", "opacity-0": "opacity-100" }' -->
                <a href="{{ route('home') }}" class="grayscale-100 flex transform items-center justify-center space-x-3 text-blue-500 brightness-0 transition-all duration-300 ease-out hover:brightness-100">
                    <x-logo class="h-7 w-auto"></x-logo>
                </a>
            </div>
            <div class="-my-2 -mr-2 flex flex-grow justify-end md:hidden">
                <button @click="mobileMenuOpen = true" type="button" class="inline-flex items-center justify-center rounded-full p-2 text-zinc-400 transition duration-150 ease-in-out hover:bg-zinc-100 hover:text-zinc-500 focus:bg-zinc-100 focus:text-zinc-500 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16">
                        </path>
                    </svg>
                </button>
            </div>

            @include('theme::partials.menus.app')

        </div>
    </x-container>

    @include('theme::partials.menus.app-mobile')
</header>
