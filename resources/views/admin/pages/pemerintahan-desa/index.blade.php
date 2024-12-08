@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard | Pemerintahan Desa</h1>
    </div>

    <!-- Struktur Organisasi Section -->
    <h2>Struktur Organisasi</h2>
    @if ($struktur->isEmpty())
        <button data-bs-toggle="modal" data-bs-target="#tambahstruktur">Tambahkan Struktur</button>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample Data (Replace this with dynamic data from the database) -->
                    <tr>
                        <td>1</td>
                        <td>Foto Struktur Organisasi</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editOrganizationModal1">Edit</button>
                        </td>
                    </tr>
                    <!-- Add more entries as needed -->
                </tbody>
            </table>
        </div>
    @endif


    <!-- Program Kerja Section -->
    <h2 class="mt-5">Program Kerja</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProgramModal">Tambah Program
        Kerja</button>

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
                @foreach ($programkerja as $pk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pk->name }}</td>
                        <td>{{ $pk->description }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editProgramModal">Edit</button>
                            <form action="{{ route('hapus program', ['id' => $pk->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <!-- Add more entries as needed -->
            </tbody>
        </table>
    </div>

    <!-- Modal for Adding Program Kerja -->
    <div class="modal fade" id="addProgramModal" tabindex="-1" aria-labelledby="addProgramModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProgramModalLabel">Tambah Program Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('saveprogram') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="programTitle" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="programTitle" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="programDescription" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="programDescription" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Organizational Structure -->
    @if ($struktur->isEmpty())
        <div class="modal fade" id="tambahstruktur" tabindex="-1" aria-labelledby="editOrganizationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editOrganizationModalLabel">Edit Struktur Organisasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/tambahstruktur" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="editOrganizationName" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="editOrganizationName" name="name"
                                    value="Foto Struktur Organisasi" required>
                            </div>
                            <div class="mb-3">
                                <label for="editOrganizationPhoto" class="form-label">Pilih Foto</label>
                                <input type="file" class="form-control" id="editOrganizationPhoto" name="photo"
                                    accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="editOrganizationModal" tabindex="-1" aria-labelledby="editOrganizationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editOrganizationModalLabel">Edit Struktur Organisasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/editstruktur" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="editOrganizationName" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="editOrganizationName" name="name"
                                    value="Foto Struktur Organisasi" required>
                            </div>
                            <div class="mb-3">
                                <label for="editOrganizationPhoto" class="form-label">Pilih Foto</label>
                                <input type="file" class="form-control" id="editOrganizationPhoto" name="photo"
                                    accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <!-- Modal for Editing Program Kerja  -->
    <div class="modal fade" id="editProgramModal" tabindex="-1" aria-labelledby="editProgramModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProgramModalLabel">Edit Program Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update programkerja') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="id">
                            @foreach ($programkerja as $pk)
                                <option value="{{ $pk->id }}">{{ $pk->title }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="editProgramDescription" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="editProgramDescription" name="title"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="editProgramRemarks" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="editProgramRemarks" name="content" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
