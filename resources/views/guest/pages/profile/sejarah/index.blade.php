@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        <h2 class="text-center mb-4">Sejarah Desa Gugah Sejahtera</h2>
        @foreach ($sejarah as $s)
        <p>
            {{ $s->description }}
        </p>
        @endforeach
        
    
    </div>
@endsection
