<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('theme::partials.head', ['seo' => $seo ?? null])
</head>

<body x-data
    class="@if ($bodyClass ?? false) {{ $bodyClass }} @endif flex min-h-screen flex-col overflow-x-hidden"
    x-cloak>

    <x-marketing.elements.header />

    <main class="flex-grow overflow-x-hidden">
        {{ $slot }}
    </main>

    @livewire('notifications')
    @include('theme::partials.footer')
    @include('theme::partials.footer-scripts')
    {{ $javascript ?? '' }}

</body>

</html>
