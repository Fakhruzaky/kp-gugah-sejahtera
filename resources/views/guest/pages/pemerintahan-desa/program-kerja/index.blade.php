@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        @foreach ($progjas as $p)
            <p>
                {{ $p->description }}
            </p>
        @endforeach

    </div>
@endsection
