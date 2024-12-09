@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard | Beranda</h1>
    </div>

    <!-- First row of three columns -->
    <div class="row mb-3">
        @foreach ($datadesa as $d)
            <div class="col-md-4">
                <div class="bg-white text-dark rounded border p-3">
                    <h5>{{ $d->title }}</h5>
                    <p>{{ $d->description }}</p>
                </div>
            </div>
        @endforeach
    @endsection
