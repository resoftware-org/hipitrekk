<?php
use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;
name('notifications');
middleware('auth');

new class extends Component {
    public $notifications_count;
    public $unreadNotifications;

    public function mount()
    {
        $this->updateNotifications();
    }

    public function delete($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->delete();
        }
        $this->updateNotifications();
    }

    public function updateNotifications()
    {
        $this->setUnreadNotifications = $this->unreadNotifications = auth()->user()->unreadNotifications->all();
        $this->notifications_count = auth()->user()->unreadNotifications->count();
    }
};
?>

<x-layouts.app>
    @volt('notifications')
        <x-app.container>
            <x-card class="lg:p-10">

                <x-elements.back-button text="Back to Dashboard" :href="route('dashboard')" />

                <x-app.heading title="Notifications" description="View your current notifications" />

                <div class="w-full">
                    @forelse ($unreadNotifications as $index => $notification)
                        @php $notification_data = (object)$notification->data; @endphp
                        <div id="notification-li-{{ $index + 1 }}"
                            class="@if (!$loop->last) {{ 'border-b' }} @endif flex flex-col border-zinc-200 pb-5">

                            <a href="{{ @$notification_data->link }}" class="flex items-start p-5 pb-2">
                                <div class="flex-shrink-0 pt-1">
                                    <img class="h-10 w-10 rounded-full" src="{{ @$notification_data->icon }}"
                                        alt="">
                                </div>
                                <div class="ml-3 flex w-0 flex-1 flex-col items-start space-y-1">
                                    <div class="relative flex items-center space-x-2">
                                        <p class="text-sm font-bold leading-5 text-zinc-600">
                                            {{ @$notification_data->user['name'] }}</p>
                                        <time
                                            class="text-xs font-medium leading-5 text-zinc-500">{{ \Carbon\Carbon::parse(@$notification->created_at)->format('F, jS h:i A') }}</span></time>
                                    </div>
                                    <p class="text-sm leading-5 text-zinc-600">{{ @$notification_data->body }} in <span
                                            class="notification-highlight">{{ @$notification_data->title }}</span>

                                </div>
                            </a>
                            <span wire:click="delete('{{ $notification->id }}')"
                                class="k mark-as-read ml-1 flex w-full cursor-pointer justify-start py-1 pl-16 text-xs text-zinc-500 hover:text-zinc-700 hover:underline">
                                <svg class="absolute mr-1 mt-1 h-4 w-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Mark as Read
                            </span>

                        </div>
                    @empty
                        <div
                            class="@if ($notifications_count > 0) {{ 'hidden' }} @endif mt-5 flex h-24 w-full items-center justify-center rounded-lg bg-gray-100 text-gray-400">
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                </path>
                            </svg>
                            No Notifications
                        </div>
                    @endforelse
                </div>

            </x-card>
        </x-app.container>
    @endvolt

</x-layouts.app>
