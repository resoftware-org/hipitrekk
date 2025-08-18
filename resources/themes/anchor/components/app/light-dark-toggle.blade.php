<div x-data="{
    theme: 'light',
    toggle() {
        if (this.theme == 'dark') {
            this.theme = 'light';
            localStorage.setItem('theme', 'light');
        } else {
            this.theme = 'dark';
            localStorage.setItem('theme', 'dark');
        }
    }
}" x-init="if (localStorage.getItem('theme')) {
    theme = localStorage.getItem('theme');
}
if (theme == 'system') {
    theme = 'light';
}
if (document.documentElement.classList.contains('dark')) { theme = 'dark'; }
$watch('theme', function(value) {
    if (value == 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
})" x-on:click="toggle()"
    class="flex cursor-pointer select-none items-center rounded-md px-1 py-2 text-xs hover:bg-zinc-100 dark:hover:bg-zinc-800">

    <input type="hidden" name="toggleDarkMode" :value="theme">

    <button x-ref="toggle" type="button" role="switch" :aria-checked="theme == 'dark'"
        :aria-labelledby="$id('toggle-label')" :class="(theme == 'dark') ? 'bg-zinc-700' : 'bg-slate-300'"
        class="relative ml-1 inline-flex w-7 flex-shrink-0 rounded-full py-1 transition focus:ring-0">
        <span :class="(theme == 'dark') ? 'translate-x-[13px]' : 'translate-x-1'"
            class="h-3 w-3 rounded-full bg-white shadow-md transition focus:outline-none" aria-hidden="true"></span>
    </button>

    <label :id="$id('toggle-label')"
        :class="{ 'text-zinc-600': theme == 'light' || theme == null, 'text-zinc-300': theme == 'dark' }"
        class="ml-1.5 flex-shrink-0 cursor-pointer font-medium">
        <span x-show="(theme == 'light' || theme == null)">Dark Mode</span>
        <span x-show="(theme == 'dark')">Light Mode</span>
    </label>

</div>
