@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pb-2 pt-3">
        <h1 class="h2">Dashboard | Publikasi Desa</h1>
    </div>

    <h3>Pengumuman</h3>
    <!-- Button to trigger add announcement modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">Tambah
        Pengumuman</button>
    <!-- Modal for Adding Announcement -->
    <div class="modal fade" id="addAnnouncementModal" tabindex="-1" aria-labelledby="addAnnouncementModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAnnouncementModalLabel">Tambah Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah pengumuman') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="announcementDescription" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="announcementDescription" name="title"
                                placeholder="Caption" required>
                        </div>
                        <div class="mb-3">
                            <label for="addAnnoucementDesc" class="form-label">Keterangan</label>
                            <input id="addAnnoucementDesc" type="hidden" name="description" required>
                            <trix-editor input="addAnnoucementDesc"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="announcementImage" class="form-label">Pilih Foto</label>
                            <input type="file" class="form-control" id="announcementImageAdd" name="image_url" required
                                onchange="loadFile(event)">
                        </div>
                        <img id="preview" class="img-fluid w-100 my-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table-striped table-sm table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>Keterangan</th>
                    <td>Gambar</td>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($announcements as $announcement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td>{{ $announcement->id }}</td> --}}
                        <td>{{ $announcement->title }}</td>
                        <td>{!! Str::limit($announcement->description, 70) !!}</td>
                        <td>
                            @if ($announcement->image_url)
                                <div class="text-center">
                                    <img id="preview-{{ $announcement->id }}" width="200"
                                        src="{{ $announcement->image_url ? asset('storage/' . $announcement->image_url) : '' }}">
                                </div>
                            @else
                                tidak ada gambar
                            @endif
                        </td>
                        <td class="d-flex column-gap-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#pengumumanData-{{ $announcement->id }}">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="pengumumanData-{{ $announcement->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengumuman ID :
                                                {{ $announcement->title }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('pengumuman.update', ['pengumuman' => $announcement->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Pengumuman</label>
                                                    <input type="text" class="form-control" id="name" name="title"
                                                        value="{{ $announcement->title }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editPengumuman-{{ $announcement->id }}"
                                                        class="form-label">Keterangan</label>
                                                    <input id="editPengumuman-{{ $announcement->id }}" type="hidden"
                                                        name="description" required
                                                        value="{{ $announcement->description }}">
                                                    <trix-editor input="editPengumuman-{{ $announcement->id }}">
                                                    </trix-editor>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="oldImage" class="form-label">Gambar Lama</label>
                                                    @if ($announcement->image_url)
                                                        <div class="text-center">
                                                            <img id="preview-{{ $announcement->id }}"
                                                                class="img-fluid w-100 my-3"
                                                                src="{{ $announcement->image_url ? asset('storage/' . $announcement->image_url) : '' }}">
                                                        </div>
                                                    @else
                                                        tidak ada gambar
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Gambar</label>
                                                    <input type="file" class="form-control" id="image"
                                                        name="image_url" accept="image/*"
                                                        onchange="loadFile(event, {{ $announcement->id }})">
                                                    <img id="preview-{{ $announcement->id }}"
                                                        class="img-fluid w-100 my-3">
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

                            <form action="{{ route('hapus pengumuman', ['announcement' => $announcement->slug]) }}"
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

    <!-- Gallery Section -->
    <h3>Galeri</h3>
    <!-- Button to trigger add gallery image modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addGalleryImageModal">Tambah
        Foto</button>
    <!-- Modal for Adding Gallery Image -->
    <div class="modal fade" id="addGalleryImageModal" tabindex="-1" aria-labelledby="addGalleryImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGalleryImageModalLabel">Tambah Foto Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah gallery') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="galleryImage" class="form-label">Pilih Foto</label>
                            <input type="file" class="form-control" id="galleryImageAdd" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="galleryDescription" class="form-label">Judul Foto</label>
                            <input type="text" class="form-control" id="galleryDescription" name="title"
                                placeholder="Caption" required>
                        </div>
                        <div class="mb-3">
                            <label for="AnnouncementDescription" class="form-label">Deskripsi Pengumuman</label>
                            <textarea class="form-control" id="AnnouncementDescription" name="description" rows="3" required></textarea>
                        </div>
                        <img id="preview_add" width="100%" height="300" class="mb-3" />
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table-striped table-sm table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $gallery)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $gallery->image_url) }}" alt="{{ $gallery->title }}"
                                width="400" height="200">
                        </td>
                        <td>{{ $gallery->title }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editGalleryImageModal">Edit</button>
                                <form action="{{ route('hapus gallery', ['gallery' => $gallery->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');"
                                        class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
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
