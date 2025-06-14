@extends('components.headerFooter')

@section('title', 'Item Details - FFOUND')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4 sm:px-4 lg:px-4">

    <div class="text-center mt-8 mb-8">
        <h1 class="text-3xl font-bold text-black leading-relaxed">
            Item Details
        </h1>
    </div>

    <div class="flex justify-center mt-12">
        <div class="max-w-4xl w-max lg:w-screen p-8">
            <div class="text-left mb-8">
                @include('components.itemDetails', ['item' => $lostItem])
            </div>
        </div>
    </div>
    
</div>
@endsection