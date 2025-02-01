@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        <h2 class="mb-4 fw-bold text-center">{{ $announcement->title }}</h2>
        <div class="row">
            <img src="{{ asset('storage/' . $announcement->image_url) }}" style="height: 100%; margin-bottom: 20px;">

            <h5 class="fs-6">
                <i class="fas fa-calendar-alt" style="font-size: 1rem;"></i>
                <span style="font-size: 0.9rem;">{{ $announcement->created_at->translatedFormat('d F Y') }}</span>

                <i class="fas fa-user" style="font-size: 1rem; margin-left: 50px;"></i>
                <span style="font-size: 0.9rem;">Admin</span>
            </h5>

            <p style="margin-top: 20px;">{!! $announcement->description !!}</p>
        </div>
    </div>
@endsection
