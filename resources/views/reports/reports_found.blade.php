@extends('components.headerFooter_petugas')

@section('title', 'Reports(Found) - FFOUND')

@section('content')
<div class="min-h-screen bg-gray-50 px-4 sm:px-4 lg:px-4">

    <!-- Judul Page di atas dan tengah -->
    <div class="text-center mt-8 mb-8">
        <h1 class="text-3xl font-bold text-black leading-relaxed">
            Report Found
        </h1>
    </div>

    <!-- Konten utama ditaruh di tengah secara horizontal -->
    <div class="flex justify-center">
        <div class="max-w-4xl w-full text-center">
            @include('components.report-content')
            <!-- nanti diubah ketika sudah BE -->
            {{-- @include('components.report-content', ['action' => route('report.found.store')]) --}}

        </div>
    </div>
    
</div>
@endsection