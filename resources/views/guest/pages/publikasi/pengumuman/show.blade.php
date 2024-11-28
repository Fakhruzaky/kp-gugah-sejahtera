@extends('guest.layouts.main')
@section('container')
  <div class="container my-5">
    <h2 class="mb-4 text-center">Pengumuman</h2>
    <div class="row">
      <h1>{{ $announcement->title }}</h1>
      <h2>{{ $announcement->created_at->translatedFormat('d F Y') }}</h2>
      <p>{{ $announcement->content }}</p>
    </div>
  </div>
@endsection
