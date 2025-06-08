@extends('components.headerFooter')

@section('title', 'Reports(Lost) - FFOUND')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4 sm:px-4 lg:px-4">

    <!-- Judul Page di atas dan tengah -->
    <div class="text-center mt-8 mb-8">
        <h1 class="text-3xl font-bold text-black leading-relaxed">
            Report Lost
        </h1>
    </div>

    <!-- Konten utama ditaruh di tengah secara horizontal -->
    <div class="w-full max-w-4xl text-center">
        <div class="bg-white rounded-lg border border-gray-300 p-6 sm:p-8 shadow-sm mb-12">
            <form action="javascript:void(0)" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Item Field -->
                <div class="mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <label class="text-black font-medium text-lg sm:w-32 mb-2 sm:mb-0 text-left">Item :</label>
                        <input 
                        id = "item_name"
                        type="text"
                        name="item_name" 
                        placeholder="Item Name"
                        value="{{ old('item_name') }}"
                        class="w-full sm:flex-1 sm:ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('item_name') border-red-500 @enderror">
                    </div>
                    @error('item_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Field -->
                <div class="mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <label class="text-black font-medium text-lg sm:w-32 mb-2 sm:mb-0 text-left">Phone :</label>
                        <input 
                        id="phone"
                        type="tel" 
                        name="phone" 
                        placeholder="Phone Number"
                        value="{{ old('phone') }}"
                        class="w-full sm:flex-1 sm:ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('phone') border-red-500 @enderror">
                    </div>
                    @error('phone')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location Field -->
                <div class="mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <label class="text-black font-medium text-lg sm:w-32 mb-2 sm:mb-0 text-left">Location :</label>
                        <input 
                        id = "location"
                        type="text" 
                        name="location" 
                        placeholder="Location Last seen"
                        value="{{ old('location') }}"
                        class="w-full sm:flex-1 sm:ml-4 px-4 py-3 bg-gray-200 rounded-lg placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('location') border-red-500 @enderror">
                    </div>
                    @error('location')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date Field -->
                <div class="mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <label class="text-black font-medium text-lg sm:w-32 mb-2 sm:mb-0 text-left">Date :</label>
                        <input 
                        id="date"
                        type="date" 
                        name="date"
                        value="{{ old('date') }}"
                        class="w-full sm:flex-1 sm:ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('date') border-red-500 @enderror">
                    </div>
                    @error('date')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Item Description -->
                <div class="mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-start">
                        <label class="text-black font-medium text-lg sm:w-32 mb-2 sm:mb-0 text-left">Item Description :</label>
                        <textarea 
                        id="description"
                        name="description" 
                        placeholder="Item Description" 
                        rows="4"
                        class="w-full sm:flex-1 sm:ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 placeholder-gray-500 resize-none focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Upload Photo -->
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
                            class="hidden">
                        </div>
                    </div>
                    @error('photo')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
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

    </div>

</div>
@endsection
