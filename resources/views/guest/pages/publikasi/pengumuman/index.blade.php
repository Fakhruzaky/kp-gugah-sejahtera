@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        <div class="row column-gap-3 row-gap-3 justify-content-center">
            @foreach ($announcements as $a)
                <div class="card col-3" style="width: 18rem;">
                    <img src="{{ $a->image_url ? asset('storage/' . $a->image_url) : asset('') }}" class="card-img-top"
                        alt="">


                    <div class="card-body">
                        <h5 class="card-title">{{ $a->title }}</h5>
                        <p class="card-text">{{ $a->created_at->translatedFormat('d F Y') }}</p>
                        <p class="card-text">{{ Str::limit($a->content, 80) }}</p>
                        <a href="{{ route('lihat pengumuman', $a->slug) }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
