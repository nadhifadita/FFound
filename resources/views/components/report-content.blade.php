<div class="bg-white rounded-lg border border-gray-300 p-8 shadow-sm mb-12">
    <!-- action sementara -->
    <!-- nanti javascript diganti $action ketika sudah BE -->
    <form action="javascript:void(0)" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Item Field -->
        <div class="mb-6">
            <div class="flex items-center">
                <label class="text-black font-medium text-lg w-32 text-left">Item :</label>
                <input type="text" name="item_name" placeholder="Item Name" 
                       class="flex-1 ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>
        </div>

        <!-- Phone Field -->
        <div class="mb-6">
            <div class="flex items-center">
                <label class="text-black font-medium text-lg w-32 text-left">Phone :</label>
                <input type="tel" name="phone" placeholder="Phone Number" 
                       class="flex-1 ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>
        </div>

        <!-- Location Field -->
        <div class="mb-6">
            <div class="flex items-center">
                <label class="text-black font-medium text-lg w-32 text-left">Location :</label>
                <input type="text" name="location" placeholder="Location Last seen" 
                       class="flex-1 ml-4 px-4 py-3 bg-gray-200 rounded-lg placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>
        </div>

        <!-- Date Field -->
        <div class="mb-6">
            <div class="flex items-center">
                <label class="text-black font-medium text-lg w-32 text-left">Date :</label>
                <div class="flex-1 ml-4 relative">
                    <input type="date" name="date" 
                           class="w-full px-4 py-3 bg-gray-200 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>
            </div>
        </div>

        <!-- Item Description Field -->
        <div class="mb-6">
            <div class="flex items-start">
                <label class="text-black font-medium text-lg w-32 text-left pt-3">Item Description :</label>
                <textarea name="description" placeholder="Item Description" rows="4"
                          class="flex-1 ml-4 px-4 py-3 bg-gray-200 rounded-lg border-0 placeholder-gray-500 resize-none focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
            </div>
        </div>

        <!-- Upload Photo Field -->
        <div class="mb-8">
            <div class="flex items-start">
                <div class="w-32">
                    <label class="text-black font-medium text-lg">Upload Photo :</label>
                    <p class="text-sm text-gray-600 italic mt-1">(Upload if available)</p>
                </div>
                <div class="flex-1 ml-4">
                    <label for="photo" class="cursor-pointer">
                        <div class="bg-gray-200 rounded-lg px-6 py-4 text-center hover:bg-gray-300 transition-colors">
                            <svg class="w-6 h-6 mx-auto text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                        </div>
                    </label>
                    <input type="file" id="photo" name="photo" accept="image/*" class="hidden">
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-center space-x-4">
            <button type="submit" 
                    class="bg-gray-800 text-white px-8 py-3 rounded-lg font-medium hover:bg-gray-700 transition-colors">
                Submit
            </button>
            <button type="reset" 
                    class="bg-white text-gray-700 px-8 py-3 rounded-lg font-medium border border-gray-300 hover:bg-gray-50 transition-colors">
                Reset
            </button>
        </div>
    </form>
</div>