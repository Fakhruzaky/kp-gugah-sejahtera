@extends('guest.layouts.main')
@section('container')
    <div class="container my-5 text-center">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if ($image && $image->isNotEmpty())
                    <img src="{{ asset('storage/' . $image->first()->image_url) }}" style="width: 100%"
                        alt="Struktur Organisasi">
                @endif

            </div>
        </div>
    </div>
@endsection
