<x-layouts.marketing>

    <x-elements.back-button class="mx-auto mt-4 max-w-3xl md:mt-8" text="Return Back Home" :href="route('home')" />

    <article id="post-{{ $page['id'] }}" class="prose prose-lg mx-auto mb-32 max-w-3xl px-5 lg:prose-xl lg:px-0">

        <meta property="name" content="{{ $page['title'] }}">
        <meta property="author" typeof="Person" content="admin">
        <meta property="dateModified" content="{{ Carbon\Carbon::parse($page['updated_at'])->toIso8601String() }}">
        <meta property="datePublished" content="{{ Carbon\Carbon::parse($page['created_at'])->toIso8601String() }}">

        <div class="mx-auto mt-6 max-w-4xl">

            <h1 class="flex flex-col leading-none">
                <span>{{ $page['title'] }}</span>
                {{-- <span class="mt-0 mt-10 text-base font-normal">Written on <time datetime="{{ Carbon\Carbon::parse($page->created_at)->toIso8601String() }}">{{ Carbon\Carbon::parse($page->created_at)->toFormattedDateString() }}</time>. Posted in <a href="{{ route('blog.category', $page->category->slug) }}" rel="category">{{ $page->category->name }}</a>.</span> --}}
            </h1>

        </div>

        @if ($page['image'])
            <div class="relative">
                <img class="h-auto w-full rounded-lg" src="{{ url($page['image']) }}" alt="{{ url($page['image']) }}"
                    srcset="{{ url($page['image']) }}">
            </div>
        @endif

        <div class="mx-auto max-w-4xl">
            {!! $page['body'] !!}
        </div>

    </article>

</x-layouts.marketing>
