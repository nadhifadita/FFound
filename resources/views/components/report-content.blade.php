{{-- resources/views/components/report-content.blade.php --}}

@php
    $formActionRoute = '';
    $locationLabel = 'Location'; // Default
    $dateLabel = 'Date';         // Default
    $isLostReport = false;       // Default

    // Determine form action route and labels based on 'reportType'
    if (isset($reportType)) {
        if ($reportType === 'mahasiswa' || $reportType === 'lost') {
            $formActionRoute = route('report.store_lost');
            $isLostReport = true;
            $locationLabel = 'Last Seen Location';
            $dateLabel = 'Date of Loss';
        } elseif ($reportType === 'found') {
            $formActionRoute = route('report.store_found');
            $isLostReport = false;
            $locationLabel = 'Found Location';
            $dateLabel = 'Date Found';
        }
    }
    // If $reportType is not set, $formActionRoute remains empty, which will cause a form error.
    // Make sure $reportType is always set when calling this component from the parent view.
@endphp

<div class="bg-white rounded-lg border border-gray-300 p-6 sm:p-8 shadow-sm mb-12">
    <form action="{{ $formActionRoute }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Hidden redirect input --}}
        <input type="hidden" name="redirect_to"
            value="{{ $reportType === 'found' ? route('list_found') : route('list_lost') }}">

        {{-- Owner Name (only for 'mahasiswa' or 'lost') --}}
        @if ($isLostReport)
            <div class="mb-6">
                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="lost_by" class="text-black font-medium text-lg sm:w-32 mb-2 sm:mb-0 text-left">Owner Name :</label>
                    <input
                        id="lost_by"
                        type="text"
                        name="lost_by"
                        placeholder="Name of the person who lost the item"
                        value="{{ old('lost_by') }}"
                        class="w-full sm:flex-1 sm:ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('lost_by') border-red-500 @enderror"
                    >
                </div>
                @error('lost_by')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
        @endif

        {{-- Item Name (always shown) --}}
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center">
                <label for="item_name" class="text-black font-medium text-lg sm:w-32 mb-2 sm:mb-0 text-left">Item :</label>
                <input
                    id="item_name"
                    type="text"
                    name="item_name"
                    placeholder="Item Name"
                    value="{{ old('item_name') }}"
                    class="w-full sm:flex-1 sm:ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('item_name') border-red-500 @enderror"
                >
            </div>
            @error('item_name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Phone (except when 'found') --}}
        @if ($reportType !== 'found')
            <div class="mb-6">
                <div class="flex flex-col sm:flex-row sm:items-center">
                    <label for="phone" class="text-black font-medium text-lg sm:w-32 mb-2 sm:mb-0 text-left">Phone :</label>
                    <input
                        id="phone"
                        type="tel"
                        name="phone"
                        placeholder="Reporter’s Contact Number"
                        value="{{ old('phone') }}"
                        class="w-full sm:flex-1 sm:ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('phone') border-red-500 @enderror"
                    >
                </div>
                @error('phone')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
        @endif

        {{-- Location --}}
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center">
                <label for="location" class="text-black font-medium text-lg sm:w-32 mb-2 sm:mb-0 text-left">Location :</label>
                <input
                    id="location"
                    type="text"
                    name="location"
                    placeholder="{{ $locationLabel }}"
                    value="{{ old('location') }}"
                    class="w-full sm:flex-1 sm:ml-4 px-4 py-3 bg-gray-200 rounded-lg placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('location') border-red-500 @enderror"
                >
            </div>
            @error('location')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Date --}}
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center">
                <label for="date" class="text-black font-medium text-lg sm:w-32 mb-2 sm:mb-0 text-left">Date :</label>
                <input
                    id="date"
                    type="date"
                    name="date"
                    value="{{ old('date') }}"
                    placeholder="{{ $dateLabel }}"
                    class="w-full sm:flex-1 sm:ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('date') border-red-500 @enderror"
                >
            </div>
            @error('date')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Item Description --}}
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row sm:items-start">
                <label for="description" class="text-black font-medium text-lg sm:w-32 mb-2 sm:mb-0 text-left">Item Description :</label>
                <textarea
                    id="description"
                    name="description"
                    placeholder="Description of the item"
                    rows="4"
                    class="w-full sm:flex-1 sm:ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 placeholder-gray-500 resize-none focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('description') border-red-500 @enderror"
                >{{ old('description') }}</textarea>
            </div>
            @error('description')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Upload Photo --}}
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-start">
                <div class="sm:w-32 mb-2 sm:mb-0">
                    <label class="text-black font-medium text-lg">Upload Photo :</label>
                    <p class="text-sm text-gray-600 italic mt-1">(Upload if available)</p>
                </div>
                <div class="w-full sm:flex-1 sm:ml-4">
                    <label for="photo" class="cursor-pointer block">
                        <div class="bg-gray-200 rounded-lg px-6 py-4 text-center hover:bg-gray-300 transition-colors">
                            <svg class="w-6 h-6 mx-auto text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                        </div>
                    </label>
                    <input
                        type="file"
                        id="photo"
                        name="photo"
                        accept="image/*"
                        class="hidden"
                    >
                    <span id="photo-name" class="block mt-2 text-sm text-gray-600"></span>
                </div>
            </div>
            @error('photo')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <button type="submit"
                class="w-full bg-gray-800 text-white px-8 py-3 rounded-lg font-medium hover:bg-gray-700 transition-colors">
                Submit
            </button>
            <button type="reset"
                class="w-full bg-white text-gray-700 px-8 py-3 rounded-lg font-medium border border-gray-300 hover:bg-gray-50 transition-colors">
                Reset
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('photo').addEventListener('change', function (event) {
        const fileInput = event.target;
        const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'No file selected';
        document.getElementById('photo-name').textContent = fileName;
    });
</script>

