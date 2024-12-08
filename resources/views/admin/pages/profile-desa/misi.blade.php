@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pb-2 pt-3">
        <h1 class="h2">Misi Desa</h1>
    </div>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMisi">Tambah Misi</button>
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
                @foreach ($mision as $misi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $misi->name }}</td>
                        <td>{{ $misi->description }}</td>
                        <td class="column-gap-2 d-flex">
                            <button x-data class="btn btn-warning btn-sm"
                                x-on:click="$dispatch('update', { id : {{ $misi->id }} })">Edit</button>
                            <form action="{{ route('hapus misi', ['misi' => $misi->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <livewire:modal.profile.misi.create />
        <livewire:modal.profile.misi.edit />
    </div>
    <script>
        window.addEventListener('open-modal', event => {
            if (event.detail.modal === 'update misi') {
                const modal = new bootstrap.Modal(document.getElementById('editMisi'), {
                    keyboard: false
                });

                modal.show();
            }
        });
    </script>
@endsection
