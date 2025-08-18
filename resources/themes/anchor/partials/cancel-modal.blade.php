<!-- Cancel Confirmation -->
<div x-data x-init="$watch('$store.confirmCancel.open', value => {
    if (value === true) { document.body.classList.add('overflow-hidden') } else { document.body.classList.remove('overflow-hidden') }
});" id="confirmCancel" x-show="$store.confirmCancel.open" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
    <div class="flex min-h-screen items-end justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
        <div x-show="$store.confirmCancel.open" x-on:click="$store.confirmCancel.open = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>

        <span class="hidden sm:inline-block sm:h-screen sm:align-middle"></span>&#8203;
        <div x-show="$store.confirmCancel.open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left align-bottom shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6 sm:align-middle" role="dialog">
            <div class="mt-2 flex w-full flex-col justify-between">
                <div class="flex flex-col items-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-100 text-center">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:ml-4">
                        <h3 class="text-lg font-medium leading-6 text-zinc-900" id="modal-headline">
                            Cancel Subscription
                        </h3>
                        <div class="mt-1">
                            <p class="text-sm leading-5 text-zinc-500">Are you sure you want to cancel?</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full flex-1 rounded-md shadow-sm sm:ml-3 sm:w-full">
                        <div data-url="{{ auth()->user()->subscription->cancel_url }}" @click="$store.confirmCancel.open=false"
                            class="checkout-cancel focus:shadow-outline-red inline-flex w-full cursor-pointer justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium leading-6 text-white shadow-sm transition duration-150 ease-in-out hover:bg-red-500 focus:border-red-700 focus:outline-none sm:text-sm sm:leading-5">
                            Cancel Subscription
                        </div>

                    </span>
                    <span class="mt-3 flex w-full flex-1 rounded-md shadow-sm sm:mt-0 sm:w-full">
                        <button onclick="closeCancelModal()" type="button"
                            class="focus:shadow-outline-blue inline-flex w-full justify-center rounded-md border border-zinc-300 bg-white px-4 py-2 text-base font-medium leading-6 text-zinc-700 shadow-sm transition duration-150 ease-in-out hover:text-zinc-500 focus:border-blue-300 focus:outline-none sm:text-sm sm:leading-5">
                            Close
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Cancel Confirmation -->
<!-- Javascript to close the modal -->
<script>
    window.closeCancelModal = function() {
        Alpine.store('confirmCancel').close();
    }
</script>
