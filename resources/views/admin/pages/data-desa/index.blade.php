@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard | Data Desa</h1>
    </div>

    <h2>Data Desa</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addDataModal">Tambah Data Desa</button>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datadesa as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->title }}</td>
                        <td>{!! $d->description !!}</td>
                        <td class="column-gap-2 d-flex">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editDataModal-{{ $d->id }}">Edit</button>
                            <!-- Modal for Editing -->
                            <div class="modal fade" id="editDataModal-{{ $d->id }}" tabindex="-1"
                                aria-labelledby="editDataModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDataModalLabel">Edit Data ID :
                                                {{ $d->id }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('update data', ['dataDesa' => $d->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="editDataDescription" class="form-label">Deskripsi</label>
                                                    <input type="text" class="form-control" id="editDataDescription"
                                                        name="title" value="{{ $d->title }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editDataDescription-{{ $d->description }}"
                                                        class="form-label">Keterangan</label>
                                                    <input id="editDataDescription-{{ $d->description }}" type="hidden"
                                                        name="description" value="{!! $d->description !!}" required>
                                                    <trix-editor
                                                        input="editDataDescription-{{ $d->description }}"></trix-editor>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('hapus data', ['id' => $d->id]) }}" method="POST">
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
    </main>
    </div>
    </div>


    <!-- Modal for Adding -->
    <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Desa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('savedata') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="dataTitle" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="dataTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="addDataDesaDescriptiob" class="form-label">Keterangan</label>
                            <input id="addDataDesaDescriptiob" type="hidden" name="description" required>
                            <trix-editor input="addDataDesaDescriptiob"></trix-editor>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
