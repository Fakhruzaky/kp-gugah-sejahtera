@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="border p-4 rounded" style="background-color: #f8f9fa;">
                    <h3 class="text-center">Visi</h3>
                    @foreach ($visi as $v)
                        {!! $v->description !!}</p>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <div class="border p-4 rounded" style="background-color: #f8f9fa;">
                    <h3 class="text-center">Misi</h3>
                    @foreach ($misi as $m)
                        <p>{!! $m->description !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
