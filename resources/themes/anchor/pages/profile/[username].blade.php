<?php

use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;
use Livewire\Attributes\Computed;
name('wave.profile');

new class extends Component {
    public $username;

    #[Computed]
    public function user()
    {
        return config('wave.user_model')::where('username', '=', $this->username)->with('roles')->firstOrFail();
    }
};
?>

<x-dynamic-component :component="auth()->guest() ? 'layouts.marketing' : 'layouts.app'" bodyClass="bg-zinc-50">
    @volt('wave.profile')
        <x-dynamic-component :component="auth()->guest() ? 'container' : 'app.container'">

            @guest
                <x-marketing.elements.heading level="h2" class="mt-5" :title="$this->user->name" :description="'Currently viewing ' . $this->user->username . '\'s profile'" align="left" />
            @endguest

            <div class="@guest pb-20 pt-10 @endguest flex h-full flex-col space-x-5 lg:flex-row">
                <x-card class="flex w-full flex-col items-center justify-center p-10 lg:w-1/3">
                    <img src="{{ $this->user->avatar() }}" class="h-24 w-24 rounded-full border-4 border-zinc-200">
                    <h2 class="mt-8 text-2xl font-bold dark:text-zinc-100">{{ $this->user->name }}</h2>
                    <p class="text-blue-blue my-1 font-medium">{{ '@' . $this->user->username }}</p>

                    @if (auth()->check() && auth()->user()->isAdmin())
                        <a href="{{ route('impersonate', $this->user->id) }}" class="my-2 rounded bg-zinc-200 px-3 py-1 text-xs font-medium text-white text-zinc-600">Impersonate</a>
                    @endif
                    <p class="mx-auto max-w-lg text-center text-base text-zinc-500">{{ $this->user->profile('about') }}</p>
                </x-card>

                <x-card class="lg:flex-2 text-center lg:w-2/3 lg:p-10 lg:text-left">
                    <p class="text-sm text-zinc-600">This is the application user profile page.</p>
                    <p class="mt-2 text-sm text-zinc-600">You can modify this file from your template
                        <strong>resources/themes/anchor</strong> at:
                    </p>
                    <code class="mt-2 inline-block rounded-md bg-gray-100 px-2 py-1 font-mono text-sm font-medium text-zinc-600">{{ 'pages/profile/[username].blade.php' }}</code>
                </x-card>
            </div>

        </x-dynamic-component>
    @endvolt

</x-dynamic-component>
