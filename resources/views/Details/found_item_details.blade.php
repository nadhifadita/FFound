@extends('components.headerFooter_petugas')

@section('title', 'item_details - FFOUND')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4 sm:px-4 lg:px-4">

    <!-- Judul Page di atas dan tengah -->
    <div class="text-center mt-8 mb-8">
        <h1 class="text-3xl font-bold text-black leading-relaxed">
            Item Details
        </h1>
    </div>

    <!-- Konten utama ditaruh di tengah secara horizontal -->
    <div class="flex justify-center mt-12">
        <div class="max-w-4xl w-max lg:w-screen p-8">
            <div class="text-left mb-8">
                @include('components.itemDetails', ['item' => $foundItem, 'showCompareButton' => true])
            </div>
        </div>
    </div>
    
</div>
@endsection