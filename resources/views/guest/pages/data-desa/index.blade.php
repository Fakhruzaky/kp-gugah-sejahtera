@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        <div class="row text-center">
            @foreach ($datadesa as $d)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $d->title }}</h5>
                            <p class="card-text">{!! $d->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
