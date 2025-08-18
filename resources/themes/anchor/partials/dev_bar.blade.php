<script>
    window.escapeKeyCloseDevBar = function(event) {
        if (event.key === 'Escape') {
            document.getElementById('wave_dev_bar').__x.$data.open = false;
            document.getElementById('wave_dev_bar').__x.$data.url = '';
            document.getElementById('wave_dev_bar').__x.$data.active = '';
        }
    }
</script>
<div x-init="$watch('open', value => {
    if (value) {
        document.body.classList.add('overflow-hidden');
        let thisElement = $el;
        escapeKeyListener = document.addEventListener('keydown', escapeKeyCloseDevBar);
    } else {
        document.body.classList.remove('overflow-hidden');
        document.removeEventListener('keydown', escapeKeyCloseDevBar);
    }
})" id="wave_dev_bar"
    class="fixed bottom-0 left-0 z-[999] h-screen w-full transform transition-all duration-150 ease-out"
    x-data="{ open: false, url: '', active: '' }" :class="{ 'translate-y-full': !open, 'translate-y-0': open }"
    x-on:keydown.escape="open = false" x-cloak>
    <div class="fixed inset-0 z-20 bg-black bg-opacity-25" x-show="open" @click="open=false"></div>

    <div class="absolute inset-0 z-30 hidden sm:block" :class="{ 'bottom-0': !open }">

        <div class="inset-0 z-40 h-10 transition duration-200 ease-out"
            :class="{ 'absolute': open, 'relative -mt-10': !open }">
            <div class="h-full w-full border-t border-blue-500 bg-gradient-to-r from-blue-500 via-blue-500 to-purple-600"
                :class="{ 'overflow-hidden': open }">
                <div class="flex h-full w-full justify-between">

                    <div class="flex h-full items-center">

                        <div class="relative flex h-full items-center justify-center border-r border-white/10 px-2">
                            <svg class="mx-0.5 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 151 146" fill="none">
                                <path fill="currentColor"
                                    d="M4.062 145.905h36.147a4 4 0 0 0 4-4v-36.146a4 4 0 0 0-4-4H4.062a4 4 0 0 0-4 4v36.146a4 4 0 0 0 4 4ZM57.037 145.908h36.147a4 4 0 0 0 4-4v-36.147a4 4 0 0 0-4-4H57.037a4 4 0 0 0-4 4v36.147a4 4 0 0 0 4 4Z" />
                                <path fill="currentColor"
                                    d="M57.038 95.138h36.147a4 4 0 0 0 4-4V54.99a4 4 0 0 0-4-4H57.038a4 4 0 0 0-4 4v36.147a4 4 0 0 0 4 4Z" />
                                <path fill="currentColor"
                                    d="M110.013 95.138h36.147a4 4 0 0 0 4-4V54.99a4 4 0 0 0-4-4h-36.147a4 4 0 0 0-4 4v36.147a4 4 0 0 0 4 4ZM110.014 44.367h36.147a4 4 0 0 0 4-4V4.221a4 4 0 0 0-4-4h-36.147a4 4 0 0 0-4 4v36.146a4 4 0 0 0 4 4Z" />
                            </svg>
                        </div>
                        <div @click="open=true; url='/docs'; active='docs';"
                            class="flex h-full cursor-pointer items-center justify-center px-3 text-xs leading-none text-zinc-100 hover:bg-blue-600"
                            :class="{ 'bg-blue-600': active == 'docs' && open, 'bg-transparent': active != 'docs' }">
                            Documentation
                        </div>
                        @if (!auth()->guest() && auth()->user()->can('browse_admin'))
                            <div @click="open=true; url='/admin'; active='admin';"
                                class="flex h-full cursor-pointer items-center justify-center text-xs leading-none text-blue-100 hover:bg-blue-600"
                                :class="{
                                    'px-3': !open,
                                    'px-5': open,
                                    'bg-blue-600': active == 'admin' &&
                                        open,
                                    'bg-blue-500': active != 'admin'
                                }">
                                Admin
                            </div>
                        @endif
                    </div>
                    <div x-show="open" @click="open=false"
                        class="flex h-full w-auto cursor-pointer items-center justify-center border-l border-white/10 px-2 text-white opacity-75 hover:bg-blue-600 hover:bg-opacity-10 hover:opacity-100">
                        <span
                            class="flex items-center rounded-full bg-zinc-600 px-2 py-1 pt-0.5 text-xs leading-none opacity-50">esc</span>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>

                    </div>
                </div>
            </div>
        </div>

        <div class="relative h-full w-full overflow-hidden bg-white">
            <iframe class="h-full w-full pt-10" :src="url"></iframe>
        </div>
    </div>
</div>
