<section>
    <x-marketing.elements.heading level="h2" title="Chart Your Course" description="Set sail and discover the riches of our value-packed plans, meticulously designed to offer you the very best features for less on your SaaS expedition. " />

    <div x-data="{
        on: false,
        billing: '{{ get_default_billing_cycle() }}',
        toggleRepositionMarker(toggleButton) {
            this.$refs.marker.style.width = toggleButton.offsetWidth + 'px';
            this.$refs.marker.style.height = toggleButton.offsetHeight + 'px';
            this.$refs.marker.style.left = toggleButton.offsetLeft + 'px';
        }
    }" x-init="setTimeout(function() {
        toggleRepositionMarker($refs.monthly);
        $refs.marker.classList.remove('opacity-0');
        setTimeout(function() {
            $refs.marker.classList.add('duration-300', 'ease-out');
        }, 10);
    }, 1);" class="mx-auto mb-2 mt-12 w-full max-w-6xl md:my-12" x-cloak>

        @if (has_monthly_yearly_toggle())
            <div class="relative flex -translate-y-2 items-center justify-start pb-5 md:justify-center">
                <div class="relative inline-flex w-auto -translate-y-3 items-center justify-center rounded-full border-2 border-zinc-900 p-1 text-center md:mx-auto">
                    <div x-ref="monthly" x-on:click="billing='Monthly'; toggleRepositionMarker($el)" :class="{ 'text-white': billing == 'Monthly', 'text-zinc-900': billing != 'Monthly' }" class="relative z-20 cursor-pointer rounded-full px-3.5 py-1 text-sm font-medium leading-6 duration-300 ease-out">
                        Monthly
                    </div>
                    <div x-ref="yearly" x-on:click="billing='Yearly'; toggleRepositionMarker($el)" :class="{ 'text-white': billing == 'Yearly', 'text-zinc-900': billing != 'Yearly' }" class="relative z-20 cursor-pointer rounded-full px-3.5 py-1 text-sm font-medium leading-6 duration-300 ease-out">
                        Yearly
                    </div>
                    <div x-ref="marker" class="absolute left-0 z-10 h-full w-1/2 opacity-0" x-cloak>
                        <div class="h-full w-full rounded-full bg-zinc-900 shadow-sm"></div>
                    </div>
                </div>
            </div>
        @endif

        <div class="flex flex-col flex-wrap lg:flex-row lg:space-x-5">

            @foreach (Wave\Plan::where('active', 1)->get() as $plan)
                @php $features = explode(',', $plan->features); @endphp
                <div {{--  Say that you have a monthly plan that doesn't have a yearly plan, in that case we will hide the place that doesn't have a price_id --}} x-show="(billing == 'Monthly' && '{{ $plan->monthly_price_id }}' != '') || (billing == 'Yearly' && '{{ $plan->yearly_price_id }}' != '')" class="mx-auto mb-6 w-full flex-1 px-0 md:max-w-lg lg:mb-0" x-cloak>
                    <div class="@if ($plan->default) {{ 'border-zinc-900 lg:scale-105' }}@else{{ 'border-zinc-200' }} @endif flex h-full flex-col rounded-xl border-2 bg-white shadow-sm sm:mb-0 lg:mb-10">
                        <div class="px-8 pt-8">
                            <span class="text-uppercase rounded-full bg-zinc-900 px-4 py-1 text-base font-medium text-white" data-primary="indigo-700">
                                {{ $plan->name }}
                            </span>
                        </div>

                        <div class="mt-5 px-8">
                            <span class="text-5xl font-bold">$<span x-text="billing == 'Monthly' ? '{{ $plan->monthly_price }}' : '{{ $plan->yearly_price }}'"></span></span>
                            <span class="text-xl font-bold text-zinc-500"><span x-text="billing == 'Monthly' ? '/mo' : '/yr'"></span></span>
                        </div>

                        <div class="mt-3 px-8 pb-10">
                            <p class="text-base leading-7 text-zinc-500">{{ $plan->description }}</p>
                        </div>

                        <div class="mt-auto rounded-b-lg bg-zinc-50 p-8">
                            <ul class="flex flex-col">
                                @foreach ($features as $feature)
                                    <li class="mt-1">
                                        <span class="flex items-center text-green-500">
                                            <svg class="mr-3 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"></path>
                                            </svg>
                                            <span class="text-zinc-700">
                                                {{ $feature }}
                                            </span>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="mt-8">
                                <x-button class="w-full" tag="a" href="/settings/subscription">
                                    Get Started
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <p class="mb-8 mt-0 w-full text-center text-zinc-500 sm:my-10">All plans are fully configurable in the Admin Area.
    </p>
</section>
