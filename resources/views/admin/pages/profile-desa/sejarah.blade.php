@extends('admin.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pb-2 pt-3">
    <h1 class="h2">Sejarah Desa</h1>
  </div>

  @if (!$sejarah)
    <form action="{{ route('store sejarah') }}" method="POST">
      @csrf
      <div>
        <label for="description" class="form-label">Sejarah</label>
        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
      </div>
      <div class="d-flex" style="width: 100%; justify-content: flex-end">
        <button type="submit" class="btn btn-primary" style="margin-top: 16px">Perbarui Sejarah Desa</button>
      </div>
    </form>
  @else
    <form action="{{ route('update sejarah', ['sejarah' => $sejarah->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div>
        <label for="description" class="form-label">Sejarah</label>
        <textarea class="form-control" id="description" rows="3" name="description">{{ $sejarah->description }}</textarea>
      </div>
      <div class="d-flex" style="width: 100%; justify-content: flex-end">
        <button type="submit" class="btn btn-primary" style="margin-top: 16px">Perbarui Sejarah Desa</button>
      </div>
    </form>
  @endif
@endsection
