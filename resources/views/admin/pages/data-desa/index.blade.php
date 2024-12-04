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
                        <td>{{ $d->description }}</td>
                        <td class="column-gap-2 d-flex">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editDataModal">Edit</button>
                            <form action="{{ route("hapus data", ['id' => $d->id]) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');" class="btn btn-danger btn-sm">Hapus</button>
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
                            <label for="dataDescription" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="dataDescription" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing -->
<div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route("update data") }}" method="POST">
                        @csrf
                        @method("PUT")
                        <select name="id">
                            @foreach ($datadesa as $d)
                            <option value="{{ $d->id }}">{{ $d->title }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="editDataDescription" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="editDataDescription" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDataRemarks" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="editDataRemarks" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
            </div>
        </div>
    </div>
</div>

{{-- <!-- Modal for Editing Total Datadesa -->
<div class="modal fade" id="editDataModal2" tabindex="-1" aria-labelledby="editDataModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModal2Label">Edit Total KK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="edit_data.php?id=2" method="POST">
                    <div class="mb-3">
                        <label for="editTotalKK" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="editTotalKK" name="nilai" value="1,672" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Editing Dusun -->
<div class="modal fade" id="editDataModal3" tabindex="-1" aria-labelledby="editDataModal3Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModal3Label">Edit Dusun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="edit_data.php?id=3" method="POST">
                    <div class="mb-3">
                        <label for="editDusun" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="editDusun" name="nilai" value="3" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Editing Jumlah RT -->
<div class="modal fade" id="editDataModal4" tabindex="-1" aria-labelledby="editDataModal4Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModal4Label">Edit Jumlah RT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="edit_data.php?id=4" method="POST">
                    <div class="mb-3">
                        <label for="editRT" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="editRT" name="nilai" value="3" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection
