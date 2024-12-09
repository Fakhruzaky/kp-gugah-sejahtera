@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pb-2 pt-3">
        <h1 class="h2">Dashboard | Publikasi Desa</h1>
    </div>

    <h3>Pengumuman</h3>
    <!-- Button to trigger add announcement modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">Tambah
        Pengumuman</button>

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
                @foreach ($announcements as $announcement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $announcement->title }}</td>
                        <td>{{ Str::limit($announcement->description, 70) }}</td>
                        <td class="d-flex column-gap-2">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editAnnouncementModal">Edit</button>
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
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addGalleryImageModal">Tambah Foto</button>
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
    </main>
    </div>
    </div>

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
                            <label for="announcementImage" class="form-label">Pilih Foto</label>
                            <input type="file" class="form-control" id="announcementImageAdd" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="announcementDescription" class="form-label">Judul Foto</label>
                            <input type="text" class="form-control" id="announcementDescription" name="title"
                                placeholder="Caption" required>
                        </div>
                        <div class="mb-3">
                            <label for="AnnouncementDescription" class="form-label">Deskripsi Pengumuman</label>
                            <textarea class="form-control" id="AnnouncementDescription" name="description" rows="3" required></textarea>
                        </div>
                        <img id="preview_announcement" width="100%" height="300" class="mb-3" />
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Announcement -->
    <div class="modal fade" id="editAnnouncementModal" tabindex="-1" aria-labelledby="editAnnouncementModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAnnouncementModalLabel">Tambah Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah pengumuman') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <select name="id">
                            @foreach ($announcements as $a)
                                <option value="{{ $a->id }}">{{ $a->title }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="announcementImage" class="form-label">Pilih Foto</label>
                            <input type="file" class="form-control" id="announcementImageAdd" name="image"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="announcementDescription" class="form-label">Judul Foto</label>
                            <input type="text" class="form-control" id="announcementDescription" name="title"
                                placeholder="Caption" required>
                        </div>
                        <div class="mb-3">
                            <label for="AnnouncementDescription" class="form-label">Deskripsi Pengumuman</label>
                            <textarea class="form-control" id="AnnouncementDescription" name="description" rows="3" required></textarea>
                        </div>
                        <img id="preview_announcement" width="100%" height="300" class="mb-3" />
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Announcement -->
    {{-- <div class="modal fade" id="editAnnouncementModal1" tabindex="-1" aria-labelledby="editAnnouncementModal1Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editAnnouncementModal1Label">Edit Pengumuman</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('update pengumuman') }}" method="POST">
            @csrf
            @method('PUT')
            <select name="id">
              @foreach ($pengumuman as $p)
                <option value="{{ $p->id }}">{{ $p->title }}</option>
              @endforeach
            </select>
            <div class="mb-3">
              <label for="editPengumumanDescription" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" id="editPengumumanDescription" name="title" required>
            </div>
            <div class="mb-3">
              <label for="editPengumumanRemarks" class="form-label">Keterangan</label>
              <textarea class="form-control" id="editPengumumanRemarks" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div> --}}

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

    <!-- Modal for Editing Gallery Image -->
    <div class="modal fade" id="editGalleryImageModal" tabindex="-1" aria-labelledby="editGalleryImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGalleryImageModalLabel">Edit Foto Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit gallery') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <select name="id">
                            @foreach ($galleries as $g)
                                <option value="{{ $g->id }}">{{ $g->title }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="galleryImage" class="form-label">Pilih Foto</label>
                            <input type="file" class="form-control" id="galleryImage" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="galleryDescription" class="form-label">Judul Foto</label>
                            <input type="text" class="form-control" id="galleryDescription" name="title"
                                placeholder="Caption" required>
                        </div>
                        <div class="mb-3">
                            <label for="galleryDescription" class="form-label">Deskripsi Foto</label>
                            <textarea class="form-control" id="galleryDescription" name="description" rows="3" required></textarea>
                        </div>
                        <img id="preview" width="100%" height="300" class="mb-3" />
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const inputImage = document.getElementById("announcementImageAdd");

        inputImage.addEventListener("change", (event) => {
            const preview = document.getElementById("preview_announcement");

            preview.src = URL.createObjectURL(event.target.files[0])
        })
    </script>
@endsection
