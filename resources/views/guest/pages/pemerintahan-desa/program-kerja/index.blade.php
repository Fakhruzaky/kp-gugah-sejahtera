@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        <h1>Program Kerja</h1>
        @foreach ($progjas as $p)
            <p>
                {{ $loop->iteration }}. {{ $p->name }} : {!! $p->description !!}
            </p>
        @endforeach

    </div>
@endsection
