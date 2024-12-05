@extends('guest.layouts.main')
@section('container')
  <div class="container my-5">
    <h2 class="mb-4 text-center">Visi & Misi Desa Gugah Sejahtera</h2>
    <div class="row">
      <div class="col-md-6">
        <h3 class="text"> <br> Visi</h3>
        @foreach ($visi as $v)
          <p>{{ $v->name }} : {{ $v->description }}</p>
        @endforeach
      </div>
      <div class="col-md-6">
        <h3 class="text"> <br> Misi</h3>
        @foreach ($misi as $m)
          <p>{{ $m->name }} : {{ $m->description }}</p>
        @endforeach
      </div>
    </div>
  </div>
@endsection
