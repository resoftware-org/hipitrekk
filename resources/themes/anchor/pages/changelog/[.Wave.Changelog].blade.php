<?php
use function Laravel\Folio\{name};
name('changelog');

// use a dynamic layout based on whether or not the user is authenticated
$layout = auth()->guest() ? 'layouts.marketing' : 'layouts.app';
?>

<x-dynamic-component :component="$layout" bodyClass="bg-zinc-50">

    <x-app.container>
        <x-card class="lg:p-10">

            <x-elements.back-button text="View Full Changelog" :href="route('changelogs')" />

            <article id="changelog-{{ $changelog->id }}" class="mx-auto mt-5 max-w-4xl">

                <meta property="name" content="{{ $changelog->title }}">
                <meta property="author" typeof="Person" content="admin">
                <meta property="dateModified"
                    content="{{ Carbon\Carbon::parse($changelog->updated_at)->toIso8601String() }}">
                <meta class="uk-margin-remove-adjacent" property="datePublished"
                    content="{{ Carbon\Carbon::parse($changelog->created_at)->toIso8601String() }}">

                <x-app.heading :title="$changelog->title" :description="$changelog->description" />

                <p class="mt-5 text-xs font-medium tracking-wider text-zinc-800">Posted on <time
                        datetime="{{ Carbon\Carbon::parse($changelog->created_at)->toIso8601String() }}"
                        class="ml-1">{{ Carbon\Carbon::parse($changelog->created_at)->toFormattedDateString() }}</time>
                </p>
                <div
                    class="prose prose-base mx-auto mt-5 max-w-full text-zinc-600 dark:prose-invert dark:text-zinc-300">
                    {!! $changelog->body !!}
                </div>

            </article>
        </x-card>
    </x-app.container>

</x-dynamic-component>
