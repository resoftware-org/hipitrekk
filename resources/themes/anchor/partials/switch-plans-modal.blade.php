<!-- Switch Plans Confirmation -->
<div x-data x-init="$watch('$store.plan_modal.open', value => {
    if (value === true) { document.body.classList.add('overflow-hidden') } else { document.body.classList.remove('overflow-hidden') }
});" id="switchPlansModal" x-show="$store.plan_modal.open" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
    <div class="flex min-h-screen items-end justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
        <div x-show="$store.plan_modal.open" x-on:click="$store.plan_modal.close()" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>

        <span class="hidden sm:inline-block sm:h-screen sm:align-middle"></span>&#8203;
        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left align-bottom shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6 sm:align-middle" role="dialog">
            <div class="mt-2 flex w-full flex-col justify-between">
                <div class="flex flex-col items-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 text-center">
                        <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z">
                            </path>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:ml-4">
                        <h3 class="text-lg font-medium leading-6 text-zinc-900" id="modal-headline">
                            Switch Plans Here
                        </h3>
                        <div class="mt-1">
                            <p class="text-sm leading-5 text-zinc-500">Are you sure you want to switch to the <span x-text="plan_name"></span> plan?</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
                    <div class="flex w-full flex-1 rounded-md shadow-sm sm:ml-3 sm:w-full">
                        <form id="form" action="{{ route('wave.switch-plans') }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit"
                                class="focus:shadow-outline-wave inline-flex w-full cursor-pointer justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium leading-6 text-white shadow-sm transition duration-150 ease-in-out hover:bg-blue-500 focus:border-blue-700 focus:outline-none sm:text-sm sm:leading-5">
                                Yes, Switch My Plan
                            </button>
                            <input type="hidden" name="plan_id" :value="plan_id">
                        </form>
                    </div>
                    <span class="mt-3 flex w-full flex-1 rounded-md shadow-sm sm:mt-0 sm:w-full">
                        <button @click="$store.plan_modal.close();" type="button"
                            class="focus:shadow-outline-blue inline-flex w-full justify-center rounded-md border border-zinc-300 bg-white px-4 py-2 text-base font-medium leading-6 text-zinc-700 shadow-sm transition duration-150 ease-in-out hover:text-zinc-500 focus:border-blue-300 focus:outline-none sm:text-sm sm:leading-5">
                            No Thanks
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Switch Plans Confirmation -->
