@extends('components.headerFooter_petugas')

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
        @include('components.report-content')
        {{-- @include('components.report-content', ['action' => route('report.lost.store')]) --}}
    </div>

</div>
@endsection
