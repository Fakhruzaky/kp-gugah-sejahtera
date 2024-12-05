@extends('guest.layouts.main')
@section('container')
  <div class="container my-5">
    <h2 class="mb-4 text-center">Sejarah Desa Gugah Sejahtera</h2>
    <p>
      {{ $sejarah->description }}
    </p>
  </div>
@endsection
