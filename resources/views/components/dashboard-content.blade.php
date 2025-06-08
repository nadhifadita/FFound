<div class="max-w-4xl w-full text-center">
    <!-- Main Logo -->
    <div class="mb-8 mt-8">
        <div class="flex justify-center items-center space-x-4 mb-4">
            <img src="{{ asset('images/FFound.png') }}" alt="FFound Logo" class="w-30 h-auto">
        </div>
    </div>

    <!-- Tagline -->
    <div class="mb-12 sm:mb-16">
        <p class="text-base sm:text-lg text-gray-600 max-w-md mx-auto leading-relaxed">
            As hope dims, FFOUND lights the<br>
            path to your lost belongings.
        </p>
    </div>

    <!-- Main Heading -->
    <div class="mb-12 sm:mb-16">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 leading-tight">
            Find &<br>
            Recover<br>
            <span class="text-yellow-600">With Ease</span>
        </h2>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col gap-4 justify-center items-center max-w-md mx-auto">
        {{ $slot ?? '' }}
    </div>

    <div class="mb-10"></div>
</div>
