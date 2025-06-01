<div x-data="{ open: false, selected: 'Filter' }" class="relative inline-block text-left mb-6">
    <button
        @click="open = !open"
        class="inline-flex justify-between w-40 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
    >
        <span x-text="selected"></span>
        <svg class="w-5 h-5 ml-2 -mr-1 transform transition-transform duration-200" :class="{'rotate-180': open}" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.086l3.71-3.856a.75.75 0 111.08 1.04l-4.25 4.417a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>
    </button>

    <div
        x-show="open"
        @click.away="open = false"
        x-transition
        class="absolute z-10 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
        style="display: none;"
    >
        <div class="py-1 text-sm text-gray-700">
            <button @click="selected = 'All'; open = false" class="block w-full text-left px-4 py-2 hover:bg-gray-100">All</button>
            <button @click="selected = 'Resolved'; open = false" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Resolved</button>
            <button @click="selected = 'Unresolved'; open = false" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Unresolved</button>
        </div>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</div>