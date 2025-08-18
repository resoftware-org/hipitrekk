<x-card class="mx-auto flex w-full max-w-4xl flex-col lg:my-10">
    <div
        class="sm:flex-no-wrap mt-5 flex flex-wrap items-center justify-between border-b border-zinc-200 pb-3 dark:border-zinc-800 sm:mt-8 lg:mt-0">
        <div class="relative p-2">
            <div class="space-y-0.5">
                <h2 class="text-xl font-semibold tracking-tight dark:text-zinc-100">{{ $title ?? '' }}</h2>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $description ?? '' }}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col pt-5 lg:flex-row lg:space-x-8">
        <aside class="flex-shrink-0 pb-8 lg:w-48 lg:pb-0 lg:pt-4">
            <nav class="flex items-start justify-start lg:flex-col lg:space-y-1">
                <div class="hidden px-2.5 pb-1.5 text-xs font-semibold leading-6 text-zinc-500 lg:block">Settings</div>
                <div
                    class="flex w-auto items-center space-x-2 lg:w-full lg:flex-col lg:items-stretch lg:space-x-0 lg:space-y-1">
                    <x-settings-sidebar-link :href="route('settings.profile')"
                        icon="phosphor-user-circle-duotone">Profile</x-settings-sidebar-link>
                    <x-settings-sidebar-link :href="route('settings.security')"
                        icon="phosphor-lock-duotone">Security</x-settings-sidebar-link>
                    <x-settings-sidebar-link :href="route('settings.api')" icon="phosphor-code-duotone">API
                        Keys</x-settings-sidebar-link>
                </div>
                <div class="hidden px-2.5 pb-1.5 pt-3.5 text-xs font-semibold leading-6 text-zinc-500 lg:block">Billing
                </div>
                <div
                    class="ml-2 flex w-full items-center space-x-2 lg:ml-0 lg:flex-col lg:items-stretch lg:space-x-0 lg:space-y-1">
                    <x-settings-sidebar-link :href="route('settings.subscription')"
                        icon="phosphor-credit-card-duotone">Subscription</x-settings-sidebar-link>
                    <x-settings-sidebar-link :href="route('settings.invoices')"
                        icon="phosphor-invoice-duotone">Invoices</x-settings-sidebar-link>
                </div>
            </nav>
        </aside>

        <div class="py-3 lg:w-full lg:px-6">
            {{ $slot }}
        </div>
    </div>
</x-card>
