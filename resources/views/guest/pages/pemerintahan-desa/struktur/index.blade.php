@extends('guest.layouts.main')
@section('container')
    <div class="container my-5 text-center">
        <h2 class="mb-4">Struktur Organisasi Desa Gugah Sejahtera</h2>
        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/'. $image->first()->image_url) }}" class="card-img-top"
                        alt="Struktur Organisasi">
                </div>
            </div>
        </div>
    </div>
@endsection
