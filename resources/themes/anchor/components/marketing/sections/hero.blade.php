<section class="relative">

    <figure class="-z-1 absolute left-0 top-0 h-screen w-full overflow-hidden">
        <div class="absolute inset-0 z-[1] bg-black/50"></div> <!-- Overlay -->
        <img alt="ALT-TEXT" class="animate-zoom h-full w-full transform object-cover" src="{{ Vite::asset('resources/themes/anchor/assets/images/home-hero.jpg') }}">
    </figure>

    <div class="relative z-[2] h-screen w-full p-16">
        <div class="mx-auto flex h-full max-w-3xl flex-col items-center justify-center gap-6 text-center">
            <h1 class="text-5xl leading-tight text-white">Descubre momentos inolvidables junto a tu caballo</h1>
            <p class="text-lg text-white">Explora caminos escondidos con nuestras rutas de trekking a caballo</p>
            <div class="mx-auto flex flex-col items-center justify-center gap-3 md:flex-row md:gap-2">
                <x-button size="lg" color="primary" class="w-full lg:w-auto">Más información</x-button>
                <x-button size="lg" color="secondary" class="w-full lg:w-auto">Planifica tu ruta</x-button>
            </div>
        </div>
    </div>

    <div class="flex w-full flex-shrink-0 items-center border-t border-zinc-200 bg-white lg:h-[150px]">
        <div class="mx-auto grid h-auto max-w-7xl grid-cols-1 space-y-5 divide-y divide-zinc-200 px-8 py-10 md:px-12 lg:grid-cols-3 lg:space-y-0 lg:divide-x lg:divide-y-0 lg:divide-zinc-200 lg:px-20 lg:py-0">
            <div class="">
                <h3 class="flex items-center font-medium text-zinc-900">
                    Key Feature
                </h3>
                <p class="mt-2 text-sm font-medium text-zinc-500">
                    Why might users be interested in using your product. <span class="hidden lg:inline">Tell them more
                        here.</span>
                </p>
            </div>
            <div class="pt-5 lg:px-10 lg:pt-0">
                <h3 class="font-medium text-zinc-900">Pain Points</h3>
                <p class="mt-2 text-sm text-zinc-500">
                    What are some pain points that your SaaS aims to solve? <span class="hidden lg:inline">Explain
                        here.</span>
                </p>
            </div>
            <div class="pt-5 lg:px-10 lg:pt-0">
                <h3 class="font-medium text-zinc-900">Unique Advantage</h3>
                <p class="mt-2 text-sm text-zinc-500">
                    Explain your unique advantage over others in the market.
                </p>
            </div>
        </div>
    </div>

</section>
