    @extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard | Profil Desa</h1>
    </div>

    <!-- Visi Section -->
    <h2>Visi</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addVisionModal">Tambah Visi</button>
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
                @foreach ($visi as $v)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $v->title }}</td>
                        <td>{{ $v->description }}</td>
                        <td class="column-gap-2 d-flex">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editVisionModal">Edit</button>
                            <form action="{{ route("hapus visi", ['id' => $v->id]) }}" method="POST">
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

    <!-- Misi Section -->
    <h2>Misi</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMissionModal">Tambah Misi</button>
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
                @foreach ($misi as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->title }}</td>
                        <td>{{ $m->description }}</td>
                        <td class="column-gap-2 d-flex">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMissionModal">Edit</button>
                            <form action="{{ route("hapus misi", ['id' => $m->id]) }}" method="POST">
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

    <!-- Modal for Adding Vision -->
    <div class="modal fade" id="addVisionModal" tabindex="-1" aria-labelledby="addVisionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVisionModalLabel">Tambah Visi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('savevisi') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="visionTitle" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="visionTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="visionDescription" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="visionDescription" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding Mission -->
    <div class="modal fade" id="addMissionModal" tabindex="-1" aria-labelledby="addMissionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMissionModalLabel">Tambah Misi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('savemisi') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="missionTitle" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="missionTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="missionDescription" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="missionDescription" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Vision -->
    <div class="modal fade" id="editVisionModal" tabindex="-1" aria-labelledby="editVisionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editVisionModalLabel">Edit Visi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route("update visi") }}" method="POST">
                        @csrf
                        @method("PUT")
                        <select name="id">
                            @foreach ($visi as $v)
                            <option value="{{ $v->id }}">{{ $v->title }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="editVisionDescription" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="editVisionDescription" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="editVisionRemarks" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="editVisionRemarks" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Mission -->
    <div class="modal fade" id="editMissionModal" tabindex="-1" aria-labelledby="editMissionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMissionModalLabel">Edit Misi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route("update misi") }}" method="POST">
                        @csrf
                        @method("PUT")
                        <select name="id">
                            @foreach ($misi as $m)
                            <option value="{{ $m->id }}">{{ $m->title }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="editMissionDescription" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="editMissionDescription" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="editMissionRemarks" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="editMissionRemarks" name="content" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Fasilitas Section -->
    <h2>Fasilitas</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahfasilitas">Tambah Fasilitas</button>
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
                <!-- Sample Data (Replace this with dynamic data from the database) -->
                @foreach ($fasilitas as $f)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $f->title }}</td>
                        <td>{{ $f->description }}</td>
                        <td class="column-gap-2 d-flex">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editFacilityModal">Edit</button>
                            <form action="{{ route("hapus fasilitas", ['id' => $f->id]) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <!-- Add more entries as needed -->
            </tbody>
        </table>
    </div>

    <!-- Modal for Adding Fasilitas -->
    <div class="modal fade" id="tambahfasilitas" tabindex="-1" aria-labelledby="editFacilityModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFacilityModal1Label">Fasilitas Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route("savefasilitas") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="editFacilityName" class="form-label">Nama Fasilitas</label>
                            <input type="text" class="form-control" id="editFacilityName" name="title" placeholder="puskesmas angker" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFacilityPhoto" class="form-label">Pilih Foto</label>
                            <input type="file" class="form-control" id="editFacilityPhoto" name="photo">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @if ($fasilitas->isEmpty())
    
    @else
    <div class="modal fade" id="editFacilityModal1" tabindex="-1" aria-labelledby="editFacilityModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFacilityModal1Label">Edit Fasilitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/editfasilitas" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editFacilityName" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="editFacilityName" name="name" value="Foto fasilitas" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFacilityPhoto" class="form-label">Pilih Foto</label>
                            <input type="file" class="form-control" id="editFacilityPhoto" name="photo" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif --}}

@endsection
