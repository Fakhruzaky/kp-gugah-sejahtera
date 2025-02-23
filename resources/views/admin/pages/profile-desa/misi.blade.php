@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pb-2 pt-3">
        <h1 class="h2">Misi Desa</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Misi Desa
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Misi Desa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('misi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="addDescriptionMisi" class="form-label">Keterangan</label>
                            <input id="addDescriptionMisi" type="hidden" name="description" required>
                            <trix-editor input="addDescriptionMisi"></trix-editor>
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
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mision as $misi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{!! $misi->description !!}</td>
                        <td class="column-gap-2 d-flex">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#misiData-{{ $misi->id }}">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="misiData-{{ $misi->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Misi ID :
                                                {{ $misi->name }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('misi.update', ['misi' => $misi->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="editMisiDesc{{ $misi->id }}"
                                                        class="form-label">Keterangan</label>
                                                    <input id="editMisiDesc{{ $misi->id }}" type="hidden"
                                                        name="description" required value="{{ $misi->description }}">
                                                    <trix-editor input="editMisiDesc{{ $misi->id }}">

                                                    </trix-editor>
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
@endsection
