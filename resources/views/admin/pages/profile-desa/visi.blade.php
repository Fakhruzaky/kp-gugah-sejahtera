@extends('admin.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pb-2 pt-3">
    <h1 class="h2">Visi Desa</h1>
  </div>

  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addVisionModal">Tambah Visi</button>
  <div class="table-responsive">
    <table class="table-striped table-sm table">
      <thead>
        <tr>
          <th>No</th>
          <th>Deskripsi</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($vision as $visi)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $visi->name }}</td>
            <td>{{ $visi->description }}</td>
            <td class="column-gap-2 d-flex">
              <button x-data class="btn btn-warning btn-sm" x-on:click="$dispatch('update', { id : {{ $visi->id }} })">Edit</button>
              <form action="{{ route('hapus visi', ['visi' => $visi->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');" class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div>
    <livewire:modal.profile.visi.create />
    <livewire:modal.profile.visi.edit />
  </div>
  <script>
    window.addEventListener('open-modal', event => {
      if (event.detail.modal === 'update visi') {
        const modal = new bootstrap.Modal(document.getElementById('editVisionModal'), {
          keyboard: false
        });

        modal.show();
      }
    });
  </script>
@endsection
