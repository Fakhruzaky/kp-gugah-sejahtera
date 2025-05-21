@extends('guest.layouts.main')
@section('container')
    <div class="container my-5 text-center">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach ($image as $img)
                    <img src="{{ asset('storage/' . $img->image_url) }}" style="width: 100%" alt="Struktur Organisasi">
                @endforeach

            </div>
        </div>
    </div>
@endsection
