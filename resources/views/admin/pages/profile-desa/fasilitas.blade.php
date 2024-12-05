@extends('admin.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pb-2 pt-3">
    <h1 class="h2">Fasilitas Desa</h1>
  </div>

  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addFasilitas">Tambah Fasilitas</button>
  <div class="table-responsive">
    <table class="table-striped table-sm table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Fasilitas</th>
          <th>Keterangan Fasilitas</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($fasilitass as $fasilitas)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $fasilitas->name }}</td>
            <td>{{ $fasilitas->description }}</td>
            <td class="column-gap-2 d-flex">
              <button x-data class="btn btn-warning btn-sm" x-on:click="$dispatch('update', { id : {{ $fasilitas->id }} })">Edit</button>
              <form action="" method="POST">
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
    <livewire:modal.profile.fasilitas.create />
    <livewire:modal.profile.fasilitas.edit />
  </div>
  <script>
    window.addEventListener('open-modal', event => {
      if (event.detail.modal === 'update fasilitas') {
        const modal = new bootstrap.Modal(document.getElementById('editFasilitas'), {
          keyboard: false
        });

        modal.show();
      }
    });
  </script>
@endsection
