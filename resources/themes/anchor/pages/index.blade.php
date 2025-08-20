<?php
use function Laravel\Folio\{name};
name('home');
?>

<x-layouts.marketing :seo="[
    'title' => setting('site.title', 'Laravel Wave'),
    'description' => setting('site.description', 'Software as a Service Starter Kit'),
    'image' => url('/og_image.png'),
    'type' => 'website',
]">

    <x-marketing.sections.hero />

    <x-container class="border-t border-zinc-200 py-12 sm:py-24">
        <x-marketing.sections.features />
    </x-container>

    <x-container class="border-t border-zinc-200 py-12 sm:py-24">
        <x-marketing.sections.testimonials />
    </x-container>

    <x-container class="border-t border-zinc-200 py-12 sm:py-24">
        <x-marketing.sections.pricing />
    </x-container>

</x-layouts.marketing>
