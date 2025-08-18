<header x-data="{
    mobileMenuOpen: false,
    scrolled: false,
    showOverlay: false,
    topOffset: '5',
    evaluateScrollPosition() {
        if (window.pageYOffset > this.topOffset) {
            this.scrolled = true;
        } else {
            this.scrolled = false;
        }
    }
}" x-init="window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
        mobileMenuOpen = false;
    }
});
$watch('mobileMenuOpen', function(value) {
    if (value) { document.body.classList.add('overflow-hidden'); } else { document.body.classList.remove('overflow-hidden'); }
});
evaluateScrollPosition();
window.addEventListener('scroll', function() {
    evaluateScrollPosition();
})"
    :class="{
        'border-gray-200/60 bg-white/90 border-b backdrop-blur-lg': scrolled,
        'border-transparent border-b bg-transparent translate-y-0':
            !scrolled
    }"
    class="sticky top-0 z-50 box-content h-24 w-full">
    <div x-show="showOverlay" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" class="absolute inset-0 h-screen w-full pt-24" x-cloak>
        <div class="h-full w-screen bg-black/50"></div>
    </div>
    <x-container>
        <div class="z-30 flex h-24 items-center justify-between md:space-x-8">
            <div class="z-20 flex w-full items-center justify-between md:w-auto">
                <div class="relative z-20 inline-flex">
                    <a href="{{ route('home') }}"
                        class="flex items-center justify-center space-x-3 font-bold text-zinc-900">
                        <x-logo class="h-8 w-auto md:h-9"></x-logo>
                    </a>
                </div>
                <div class="flex flex-grow justify-end md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                        class="inline-flex items-center justify-center rounded-full p-2 text-zinc-400 transition duration-150 ease-in-out hover:bg-zinc-100 hover:text-zinc-500">
                        <svg x-show="!mobileMenuOpen" class="h-6 w-6" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16">
                            </path>
                        </svg>
                        <svg x-show="mobileMenuOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <nav :class="{
                'hidden': !
                    mobileMenuOpen,
                'block md:relative absolute top-0 left-0 md:w-auto w-screen md:h-auto h-screen pointer-events-none md:z-10 z-10': mobileMenuOpen
            }"
                class="h-full md:flex">
                <ul :class="{
                    'hidden md:flex': !
                        mobileMenuOpen,
                    'flex flex-col absolute md:relative md:w-auto w-screen h-full md:h-full md:overflow-auto overflow-scroll md:pt-0 mt-24 md:pb-0 pb-48 bg-white md:bg-transparent': mobileMenuOpen
                }"
                    id="menu"
                    class="pointer-events-auto ml-0 flex h-full w-full flex-1 items-stretch justify-start gap-x-8 border-t border-gray-100 md:w-auto md:flex-row md:items-center md:justify-center md:border-t-0">
                    <li x-data="{ open: false }" @mouseenter="showOverlay=true" @mouseleave="showOverlay=false"
                        class="group z-30 flex h-auto flex-col items-start border-b border-gray-100 md:h-full md:flex-row md:items-center md:border-b-0">
                        <a href="#_" x-on:click="open=!open"
                            class="flex h-16 w-full items-center gap-1 px-7 text-sm font-semibold text-gray-700 transition duration-300 hover:bg-gray-100 hover:text-gray-900 md:h-full md:w-auto md:px-0 md:hover:bg-transparent">
                            <span class="">Platform</span>
                            <svg :class="{ 'group-hover:-rotate-180': !mobileMenuOpen, '-rotate-180': mobileMenuOpen && open }"
                                class="h-5 w-5 transition-all duration-300 ease-out" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" class=""></path>
                            </svg>
                        </a>
                        <div :class="{
                            'hidden md:block opacity-0 invisible md:absolute': !
                                open,
                            'md:invisible md:opacity-0 md:hidden md:absolute': open
                        }"
                            class="left-0 top-0 w-screen space-y-3 border-b border-t border-gray-100 bg-white transition-transform duration-300 ease-out md:mt-24 md:block md:-translate-y-2 md:shadow-md md:group-hover:visible md:group-hover:block md:group-hover:translate-y-0 md:group-hover:opacity-100"
                            x-cloak>
                            <ul class="mx-auto flex max-w-7xl flex-col justify-between md:flex-row md:px-16">
                                <li class="w-full border-l border-gray-100 md:w-1/5">
                                    <a href="#_" onclick="demoButtonClickMessage(event)"
                                        class="block h-full p-6 text-lg font-semibold hover:bg-gray-50 lg:p-7 lg:py-10">
                                        <img src="/wave/img/icons/anchor.png" class="h-auto w-12"
                                            alt="feature 1 icon" />
                                        <span class="my-2 block text-xs font-bold uppercase text-slate-800">Feature
                                            One</span>
                                        <span class="block text-xs font-medium leading-5 text-slate-500">Highlight your
                                            main feature here</span>
                                    </a>
                                </li>
                                <li class="w-full border-l border-gray-100 md:w-1/5">
                                    <a href="#_"
                                        onclick="event.preventDefault(); new FilamentNotification().title('Modify this button in your theme folder').icon('heroicon-o-pencil-square').iconColor('info').send()"
                                        class="block h-full p-6 text-lg font-semibold hover:bg-gray-50 lg:p-7 lg:py-10">
                                        <img src="/wave/img/icons/turtle.png" class="h-auto w-12"
                                            alt="feature 2 icon" />
                                        <span class="my-2 block text-xs font-bold uppercase text-slate-800">Feature
                                            Two</span>
                                        <span class="block text-xs font-medium leading-5 text-slate-500">Brief
                                            description of another feature</span>
                                    </a>
                                </li>
                                <li class="w-full border-l border-gray-100 md:w-1/5">
                                    <a href="#_"
                                        onclick="event.preventDefault(); new FilamentNotification().title('Modify this button in your theme folder').icon('heroicon-o-pencil-square').iconColor('info').send()"
                                        class="block h-full p-6 text-lg font-semibold hover:bg-gray-50 lg:p-7 lg:py-10">
                                        <img src="/wave/img/icons/compass.png" class="h-auto w-12"
                                            alt="feature 3 icon" />
                                        <span class="my-2 block text-xs font-bold uppercase text-slate-800">Feature
                                            Three</span>
                                        <span class="block text-xs font-medium leading-5 text-slate-500">Describe
                                            another one of your features here</span>
                                    </a>
                                </li>
                                <li class="w-full border-l border-gray-100 md:w-1/5">
                                    <a href="#_"
                                        onclick="event.preventDefault(); new FilamentNotification().title('Modify this button in your theme folder').icon('heroicon-o-pencil-square').iconColor('info').send()"
                                        class="block h-full p-6 text-lg font-semibold hover:bg-gray-50 lg:p-7 lg:py-10">
                                        <img src="/wave/img/icons/lighthouse.png" class="h-auto w-12"
                                            alt="feature 4 icon" />
                                        <span class="my-2 block text-xs font-bold uppercase text-slate-800">Feature
                                            Four</span>
                                        <span class="block text-xs font-medium leading-5 text-slate-500">Add a fourth
                                            feature or even a resource here</span>
                                    </a>
                                </li>
                                <li class="w-full border-l border-r border-gray-100 md:w-1/5">
                                    <a href="#_"
                                        onclick="event.preventDefault(); new FilamentNotification().title('Modify this button in your theme folder').icon('heroicon-o-pencil-square').iconColor('info').send()"
                                        class="block h-full p-6 text-lg font-semibold hover:bg-gray-50 lg:p-7 lg:py-10">
                                        <img src="/wave/img/icons/chest.png" class="h-auto w-12" alt="feature 5 icon" />
                                        <span class="my-2 block text-xs font-bold uppercase text-slate-800">Feature
                                            Five</span>
                                        <span class="block text-xs font-medium leading-5 text-slate-500">Add another
                                            feature highlight or link to a page</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li x-data="{ open: false }" @mouseenter="showOverlay=true" @mouseleave="showOverlay=false"
                        class="group z-30 flex h-auto flex-col items-start border-b border-gray-100 md:h-full md:flex-row md:items-center md:border-b-0">
                        <a href="#_" x-on:click="open=!open"
                            class="flex h-16 w-full items-center gap-1 px-7 text-sm font-semibold text-gray-700 transition duration-300 hover:bg-gray-100 hover:text-gray-900 md:h-full md:w-auto md:px-0 md:hover:bg-transparent">
                            <span class="">Resources</span>
                            <svg :class="{ 'group-hover:-rotate-180': !mobileMenuOpen, '-rotate-180': mobileMenuOpen && open }"
                                class="h-5 w-5 transition-all duration-300 ease-out" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" class=""></path>
                            </svg>
                        </a>
                        <div :class="{
                            'hidden md:block opacity-0 invisible md:absolute': !
                                open,
                            'md:invisible md:opacity-0 md:hidden md:absolute': open
                        }"
                            class="left-0 top-0 w-screen space-y-3 border-b border-t border-gray-100 bg-white transition-transform duration-300 ease-out md:mt-24 md:block md:-translate-y-2 md:shadow-md md:group-hover:visible md:group-hover:block md:group-hover:translate-y-0 md:group-hover:opacity-100"
                            x-cloak>
                            <ul class="mx-auto flex max-w-7xl flex-col justify-between md:flex-row md:px-12">
                                <div
                                    class="flex w-full flex-col divide-x divide-zinc-100 border-l border-r border-zinc-100 md:flex-row">
                                    <div class="w-auto divide-y divide-zinc-100">
                                        <a href="#_"
                                            onclick="event.preventDefault(); new FilamentNotification().title('Modify this button in your theme folder').icon('heroicon-o-pencil-square').iconColor('info').send()"
                                            class="group block p-7 text-sm hover:bg-neutral-100">
                                            <span class="mb-1 block font-medium text-black">Authentication</span>
                                            <span class="block font-light leading-5 opacity-50">Configure the login,
                                                register, and forgot password for your app</span>
                                        </a>
                                        <a href="#_"
                                            onclick="event.preventDefault(); new FilamentNotification().title('Modify this button in your theme folder').icon('heroicon-o-pencil-square').iconColor('info').send()"
                                            class="group block p-7 text-sm hover:bg-neutral-100">
                                            <span class="mb-1 block font-medium text-black">Roles and
                                                Permissions</span>
                                            <span class="block leading-5 opacity-50">We utilize the bullet-proof Spatie
                                                Permissions package</span>
                                        </a>
                                    </div>
                                    <div class="w-auto divide-y divide-zinc-100">
                                        <a href="#_"
                                            onclick="event.preventDefault(); new FilamentNotification().title('Modify this button in your theme folder').icon('heroicon-o-pencil-square').iconColor('info').send()"
                                            class="block p-7 text-sm hover:bg-neutral-100">
                                            <span class="mb-1 block font-medium text-black">Posts and Pages</span>
                                            <span class="block font-light leading-5 opacity-50">Easily write blog
                                                articles and create pages for your application</span>
                                        </a>
                                        <a href="#_"
                                            onclick="event.preventDefault(); new FilamentNotification().title('Modify this button in your theme folder').icon('heroicon-o-pencil-square').iconColor('info').send()"
                                            class="block p-7 text-sm hover:bg-neutral-100">
                                            <span class="mb-1 block font-medium text-black">Themes</span>
                                            <span class="block leading-5 opacity-50">Kick-start your app with a
                                                pre-built theme or create your own</span>
                                        </a>
                                    </div>
                                    <div class="w-auto divide-y divide-zinc-100">
                                        <a href="#_"
                                            onclick="event.preventDefault(); new FilamentNotification().title('Modify this button in your theme folder').icon('heroicon-o-pencil-square').iconColor('info').send()"
                                            class="block p-7 text-sm hover:bg-neutral-100">
                                            <span class="mb-1 block font-medium text-black">Settings and More</span>
                                            <span class="block leading-5 opacity-50">Easily create and update app
                                                settings. And so much more</span>
                                        </a>
                                        <a href="#_"
                                            onclick="event.preventDefault(); new FilamentNotification().title('Modify this button in your theme folder').icon('heroicon-o-pencil-square').iconColor('info').send()"
                                            class="block p-7 text-sm hover:bg-neutral-100">
                                            <span class="mb-1 block font-medium text-black">Subscriptions</span>
                                            <span class="block leading-5 opacity-50">Integration payments and let users
                                                subscribe to a plan</span>
                                        </a>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>
                    <li class="h-16 flex-shrink-0 border-b border-gray-100 md:h-full md:border-b-0">
                        <a href="{{ route('pricing') }}"
                            class="flex h-full items-center px-7 text-sm font-semibold text-gray-700 transition duration-300 hover:bg-gray-100 hover:text-gray-900 md:px-0 md:hover:bg-transparent">
                            Pricing
                        </a>
                    </li>
                    <li class="h-16 flex-shrink-0 border-b border-gray-100 md:h-full md:border-b-0">
                        <a href="{{ route('blog') }}"
                            class="flex h-full items-center px-7 text-sm font-semibold text-gray-700 transition duration-300 hover:bg-gray-100 hover:text-gray-900 md:px-0 md:hover:bg-transparent">Blog</a>
                    </li>

                    @guest
                        <li
                            class="relative z-30 flex h-auto w-full flex-shrink-0 flex-col items-center justify-center space-y-3 px-7 pt-3 text-sm md:hidden">
                            <x-button href="{{ route('login') }}" tag="a" class="w-full text-sm"
                                color="secondary">Login</x-button>
                            <x-button href="{{ route('register') }}" tag="a" class="w-full text-sm">Sign
                                Up</x-button>
                        </li>
                    @else
                        <li class="flex w-full items-center justify-center px-7 pt-3 md:hidden">
                            <x-button href="{{ route('login') }}" tag="a" class="w-full text-sm">View
                                Dashboard</x-button>
                        </li>
                    @endguest

                </ul>
            </nav>

            @guest
                <div
                    class="relative z-30 hidden h-full flex-shrink-0 items-center justify-center space-x-3 text-sm md:flex">
                    <x-button href="{{ route('login') }}" tag="a" class="text-sm"
                        color="secondary">Login</x-button>
                    <x-button href="{{ route('register') }}" tag="a" class="text-sm">Sign Up</x-button>
                </div>
            @else
                <x-button href="{{ route('login') }}" tag="a" class="text-sm"
                    class="relative z-20 ml-2 hidden flex-shrink-0 md:block">View Dashboard</x-button>
            @endguest

        </div>
    </x-container>

</header>
