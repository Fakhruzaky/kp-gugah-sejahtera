@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        <h2 class="text-center mb-4">Visi & Misi Desa Gugah Sejahtera</h2>
        <div class="row">
            <div class="col-md-6">
                <h3 class="text"> <br> Visi</h3>
                @foreach ($visi as $v)
                <p>{{ $v->title }} : {{ $v->description }}</p>
                @endforeach
            </div>
            <div class="col-md-6">
                <h3 class="text"> <br> Misi</h3>
                @foreach ($misi as $m)
                <p>{{ $m->title }} : {{ $m->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
