@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pb-2 pt-3">
        <h1 class="h2">Fasilitas Desa</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Fasilitas Desa
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Fasilitas Desa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Fasilitas</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                onchange="loadFile(event)">
                            <img id="preview" class="img-fluid w-100 my-3">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table-striped table-sm table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Fasilitas</th>
                    <th>Gambar Fasilitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fasilitass as $fasilitas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $fasilitas->name }}</td>
                        <td>
                            @if ($fasilitas->image)
                                <img src="{{ asset('storage/' . $fasilitas->image) }}" alt="Fasilitas Image" width="150">
                            @else
                                tidak ada gambar
                            @endif
                        </td>
                        <td class="column-gap-2 d-flex">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#fasilitasData-{{ $fasilitas->id }}">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="fasilitasData-{{ $fasilitas->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Fasilitas ID :
                                                {{ $fasilitas->name }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('fasilitas.update', ['fasilitas' => $fasilitas->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Fasilitas</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="{{ $fasilitas->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="oldImage" class="form-label">Gambar</label>
                                                    @if ($fasilitas->image)
                                                        <div class="text-center">
                                                            <img id="preview-{{ $fasilitas->id }}"
                                                                class="img-fluid w-100 my-3"
                                                                src="{{ $fasilitas->image ? asset('storage/' . $fasilitas->image) : '' }}">
                                                        </div>
                                                    @else
                                                        tidak ada gambar
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Gambar</label>
                                                    <input type="file" class="form-control" id="image" name="image"
                                                        accept="image/*" onchange="loadFile(event, {{ $fasilitas->id }})">
                                                    <img id="preview-{{ $fasilitas->id }}" class="img-fluid w-100 my-3">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('fasilitas.delete', ['fasilitas' => $fasilitas->id]) }}"
                                method="POST">
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
    <script>
        var loadFile = function(event, id = null) {
            var previewId = id ? 'preview-' + id : 'preview';
            var preview = document.getElementById(previewId);
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = function() {
                URL.revokeObjectURL(preview.src); // free memory
            }
        };
    </script>
@endsection
