@php $notifications_count = auth()->user()->unreadNotifications->count(); @endphp

@php
    $unreadNotifications = auth()->user()->unreadNotifications->all();
@endphp

<div class="relative w-full">
    @forelse ($unreadNotifications as $index => $notification)
        @php $notification_data = (object)$notification->data; @endphp
        <div id="notification-li-{{ $index + 1 }}"
            class="@if (!$loop->last) {{ 'border-b' }} @endif flex flex-col border-zinc-200 pb-5">

            <a href="{{ @$notification_data->link }}" class="flex items-start p-5 pb-2">
                <div class="flex-shrink-0 pt-1">
                    <img class="h-10 w-10 rounded-full" src="{{ @$notification_data->icon }}" alt="">
                </div>
                <div class="ml-3 flex w-0 flex-1 flex-col items-start">
                    <p class="text-sm leading-5 text-zinc-600">
                        <strong>{{ @$notification_data->user['username'] }} @if (isset($notification_data->type) && @$notification_data->type == 'message')
                                {{ 'left a message' }}@else{{ 'said' }}
                            @endif
                        </strong>
                        {{ @$notification_data->body }} in <span
                            class="notification-highlight">{{ @$notification_data->title }}</span>
                    </p>
                    <p class="mt-2 text-sm font-medium leading-5 text-zinc-500">
                        <span
                            class="notification-datetime">{{ \Carbon\Carbon::parse(@$notification->created_at)->format('F, jS h:i A') }}</span>
                    </p>
                </div>
            </a>
            <span wire:click="delete('{{ $notification->id }}')"
                class="k mark-as-read ml-1 flex w-full cursor-pointer justify-start py-1 pl-16 text-xs text-zinc-500 hover:text-zinc-700 hover:underline">
                <svg class="absolute mr-1 mt-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Mark as Read
            </span>

        </div>

    @empty
        <div id="notifications-none"
            class="@if ($notifications_count > 0) {{ 'hidden' }} @endif flex h-24 w-full items-center justify-center font-medium text-zinc-600">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                </path>
            </svg>
            All Caught Up!
        </div>
    @endforelse

</div>
