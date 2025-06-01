@extends('components.headerFooter')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-center mb-6">Found</h1>

    <x-lost-item-card
        name="Rudi"
        role="student"
        date="22/12/2022"
        image="images/laptop1.png"
        title="Laptop"
        location="Kehilangan di Gedung F2.3"
        description="Laptop Axioo warna merah dengan nama rudi di bagian bawah laptop, background naruto"
    />

    <x-lost-item-card
        name="Qih"
        role="student"
        date="22/12/2022"
        image="images/kunci1.png"
        title="Kunci Motor Honda"
        location="Parkiran Gedung A"
        description="Kunci Motor dengan logo honda"
    />

    <x-lost-item-card
        name="Dhif"
        role="student"
        date="22/12/2022"
        image="images/kunci2.png"
        title="Kunci Motor Honda"
        location="Gedung G1.2"
        description="Kunci Motor dengan logo honda"
    />

</div>
@endsection
