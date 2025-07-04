@extends('components.headerFooter')

@section('title', 'Reports(Found) - FFOUND')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4 sm:px-4 lg:px-4">

    <div class="text-center mt-8 mb-8">
        <h1 class="text-3xl font-bold text-black leading-relaxed">
            Report Found
        </h1>
    </div>

    <div class="w-full max-w-4xl text-center">
        @include('components.report-content', ['reportType' => 'found'])
    </div>

</div>
@endsection
