@if ($paginator->hasPages())
    <div>
        <span class="relative z-0 inline-flex shadow-sm">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <div
                    class="focus:shadow-outline-blue relative inline-flex items-center rounded-l-md border border-zinc-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-zinc-400 transition duration-150 ease-in-out focus:z-10 focus:border-blue-300 focus:outline-none active:bg-zinc-100 active:text-zinc-500">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="focus:shadow-outline-blue relative inline-flex items-center rounded-l-md border border-zinc-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-zinc-700 transition duration-150 ease-in-out hover:text-zinc-800 focus:z-10 focus:border-blue-300 focus:outline-none active:bg-zinc-100 active:text-zinc-500">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="relative -ml-px inline-flex items-center border border-zinc-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-zinc-700">
                        ...
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <div
                                class="focus:shadow-outline-blue relative -ml-px hidden items-center border border-zinc-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-zinc-400 transition duration-150 ease-in-out focus:z-10 focus:border-blue-300 focus:outline-none active:bg-zinc-100 active:text-zinc-700 md:inline-flex">
                                {{ $page }}
                            </div>
                        @else
                            <a href="{{ $url }}"
                                class="focus:shadow-outline-blue relative -ml-px hidden items-center border border-zinc-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-zinc-700 transition duration-150 ease-in-out hover:text-zinc-500 focus:z-10 focus:border-blue-300 focus:outline-none active:bg-zinc-100 active:text-zinc-700 md:inline-flex">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="focus:shadow-outline-blue relative -ml-px inline-flex items-center rounded-r-md border border-zinc-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-zinc-700 transition duration-150 ease-in-out hover:text-zinc-800 focus:z-10 focus:border-blue-300 focus:outline-none active:bg-zinc-100 active:text-zinc-500">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            @else
                <div
                    class="focus:shadow-outline-blue relative -ml-px inline-flex items-center rounded-r-md border border-zinc-300 bg-white px-2 py-2 text-sm font-medium leading-5 text-zinc-500 transition duration-150 ease-in-out hover:text-zinc-400 focus:z-10 focus:border-blue-300 focus:outline-none active:bg-zinc-100 active:text-zinc-500">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            @endif
        </span>
    </div>
@endif
