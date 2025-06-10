@extends('components.headerFooter')

@section('title', 'Reports(Mahasiswa) - FFOUND')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4 sm:px-4">

    <!-- Judul Page di atas dan tengah -->
    <div class="text-center mt- mb-8">
        <h1 class="text-3xl font-bold text-black leading-relaxed">
            Report Lost
        </h1>
    </div>

    <!-- Konten utama ditaruh di tengah secara horizontal -->
    <div class="w-full max-w-4xl text-center">
        @include('components.report-content', ['reportType' => 'mahasiswa'])
    </div>

</div>
@endsection
