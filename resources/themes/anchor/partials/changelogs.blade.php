@php $changeLogNotification = Wave\Changelog::orderBy('created_at', 'DESC')->first() @endphp
<div id="changeLogNotification"
    class="pointer-events-none fixed bottom-0 right-0 z-50 flex translate-y-0 transform cursor-pointer items-end justify-center px-4 py-6 opacity-100 transition-all duration-200 ease-out hover:-translate-y-1 sm:items-start sm:justify-end sm:p-6"
    data-href="{{ route('changelog', ['changelog' => $changeLogNotification->id]) }}">
    <div id="changelog_content"
        class="pointer-events-auto relative w-full max-w-sm rounded-lg border border-zinc-200 bg-white shadow-lg dark:border-zinc-800 dark:bg-zinc-700">
        <div class="relative p-5">
            <span id="changelog_close"
                class="absolute right-0 top-0 mr-5 mt-5 inline-flex cursor-pointer text-zinc-400 transition duration-150 ease-in-out focus:text-zinc-500 focus:outline-none">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <h4
                class="w-full overflow-hidden text-ellipsis whitespace-nowrap pr-7 text-sm font-medium leading-5 text-zinc-900 dark:text-white">
                {{ $changeLogNotification->title }}</h4>
            <p class="mt-2 text-sm leading-5 tracking-wide text-zinc-500">{{ $changeLogNotification->description }}</p>
            <div id="changelog_footer" class="mt-1"><a
                    href="{{ route('changelog', ['changelog' => $changeLogNotification->id]) }}"
                    class="text-sm font-medium leading-5 opacity-90 transition duration-150 ease-in-out hover:opacity-100 focus:underline focus:outline-none"
                    style="color:{{ config('wave.primary_color') }}">Learn More</a></div>
        </div>
    </div>
</div>

<script>
    var changeLogEl = document.getElementById('changeLogNotification');

    document.getElementById('changelog_close').addEventListener('click', function(evt) {
        changeLogEl.classList.remove('opacity-100');
        changeLogEl.classList.add('opacity-0');
        markNotificationsRead();
        evt.stopPropagation();
        setTimeout(function() {
            changeLogEl.remove();
        }, 300);
    });

    changeLogEl.addEventListener('click', function(e) {
        if (e.target.parentElement.id != "changelog_close" && e.target.id != "changelog_close") {
            markNotificationsRead();
            window.location = changeLogEl.dataset.href;
        }
    });

    function markNotificationsRead(endpoint, splitPopReadyState) {
        var HttpRequest = new XMLHttpRequest();
        HttpRequest.open("POST", "{{ route('changelog.read') }}", true);
        HttpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        HttpRequest.send("_token={{ csrf_token() }}");
    }
</script>
