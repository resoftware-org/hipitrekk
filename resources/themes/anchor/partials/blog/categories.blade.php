<div class="flex w-full items-center justify-start md:justify-center">
    <ul class="mt-5 inline-flex w-auto self-start rounded-full border border-zinc-100 border-zinc-200 bg-zinc-100 px-3 py-2 text-xs font-medium text-zinc-600 md:mt-7 md:self-center">
        <li class="mr-4 hidden font-bold uppercase text-zinc-800 md:block">Categories:</li>
        <li class="@if (!isset($category)) {{ 'text-zinc-800' }} @endif"><a href="{{ route('blog') }}">View
                All</a></li>
        <li class="mx-2">&middot;</li>
        @foreach (\Wave\Category::all() as $cat)
            <li class="@if (isset($category) && isset($category->slug) && $category->slug == $cat->slug) {{ 'text-zinc-800' }} @endif"><a href="{{ route('blog.category', ['category' => $cat]) }}">{{ $cat->name }}</a></li>
            @if (!$loop->last)
                <li class="mx-2">&middot;</li>
            @endif
        @endforeach
    </ul>
</div>
