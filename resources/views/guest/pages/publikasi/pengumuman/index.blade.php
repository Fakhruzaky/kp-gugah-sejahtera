@extends('guest.layouts.main')
@section('container')
  <div class="container my-5">
    <h2 class="mb-4 text-center">Pengumuman</h2>
    <div class="row">
      @foreach ($announcements as $announcement)
        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">{{ $announcement->title }}</h5>
              <p class="card-text">
                <small class="text-muted">{{ $announcement->created_at->translatedFormat('d F Y') }}</small><br>
                {{ Str::limit($announcement->content, 200) }}
              </p>
              <a href="{{ route('lihat pengumuman', ['announcement' => $announcement->slug]) }}" class="btn btn-link">Read More</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
