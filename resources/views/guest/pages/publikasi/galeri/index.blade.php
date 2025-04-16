@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        <div class="row h-100">
            @foreach ($galleries as $gallery)
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 300px; height: 300px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $gallery->image_url) }}" class="card-img-top"
                            alt="{{ $gallery->title }}" data-bs-toggle="modal"
                            data-bs-target="#{{ Str::slug($gallery->title) }}" style="height: 200px; object-fit: cover;">

                        <div class="card-body" style="height: 100px; overflow: hidden;">
                            <h5 class="card-title text-truncate" title="{{ $gallery->title }}">
                                {{ $gallery->title }}
                            </h5>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk setiap foto -->
                <div class="modal fade" id="{{ Str::slug($gallery->title) }}" tabindex="-1"
                    aria-labelledby="{{ $gallery->title }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="foto-{{ $gallery->title }}">Foto {{ $gallery->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/' . $gallery->image_url) }}" class="img-fluid"
                                    alt="{{ $gallery->title }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
