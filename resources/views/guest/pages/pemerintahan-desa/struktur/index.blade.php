@extends('guest.layouts.main')
@section('container')
    <div class="container my-5 text-center">
        <h2 class="mb-4">Struktur Organisasi Desa Gugah Sejahtera</h2>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <img src="{{ asset('storage/'. $image->first()->image_url) }}" style="width: 100%"
                        alt="Struktur Organisasi">
            </div>
        </div>
    </div>
@endsection
