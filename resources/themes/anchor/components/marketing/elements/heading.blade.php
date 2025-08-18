@props([
    'level' => 'h1',
    'title' => 'No Heading Title Entered',
    'description' => 'Be sure to include the description attribute',
    'align' => 'center',
])

<div {{ $attributes->class(['relative w-full', 'text-left' => $align == 'left', 'text-right' => $align == 'right', 'text-center' => $align != 'left' && $align != 'right']) }}>
    <{{ $level }} class="text-left text-3xl font-medium tracking-tighter sm:text-4xl md:text-center lg:text-5xl">
        {!! $title !!}</{{ $level }}>
        <p class="@if ($align == 'left') {{ 'ml-auto' }}@elseif($align == 'right'){{ 'mr-auto' }}@else{{ 'mx-auto max-w-2xl' }} @endif mt-4 text-left text-sm font-medium text-zinc-500 sm:text-base md:text-balance md:text-center">
            {!! $description !!}</p>
</div>
