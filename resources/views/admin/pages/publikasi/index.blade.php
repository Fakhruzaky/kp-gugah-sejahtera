@extends('admin.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pb-2 pt-3">
    <h1 class="h2">Dashboard | Publikasi Desa</h1>
  </div>

  <h3>Pengumuman</h3>
  <!-- Button to trigger add announcement modal -->
  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">Tambah Pengumuman</button>

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
            <td>{{ Str::limit($announcement->content, 70) }}</td>
            <td class="d-flex column-gap-2">
              <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPengumumanModal">Edit</button>
              <form action="{{ route('hapus pengumuman', ['announcement' => $announcement->slug]) }}" method="POST">
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
              <img src="{{ asset('storage/' . $gallery->image_url) }}" alt="{{ $gallery->title }}" width="400" height="200">
            </td>
            <td>{{ $gallery->title }}</td>
            <td>
              <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editGalleryImageModal1">Edit</button>
              <a href="delete_gallery.php?id=1" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</a>
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
  <div class="modal fade" id="addAnnouncementModal" tabindex="-1" aria-labelledby="addAnnouncementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addAnnouncementModalLabel">Tambah Pengumuman</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('tambah pengumuman') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="PengumumanTitle" class="form-label">Judul Pengumuman</label>
              <input type="text" class="form-control" id="PengumumanTitle" name="title" required>
            </div>
            <div class="mb-3">
              <label for="PengumumanDescription" class="form-label">Deskripsi Pengumuman</label>
              <textarea class="form-control" id="PengumumanDescription" name="content" rows="3" required></textarea>
            </div>
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
  <div class="modal fade" id="addGalleryImageModal" tabindex="-1" aria-labelledby="addGalleryImageModalLabel" aria-hidden="true">
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
              <input type="file" class="form-control" id="galleryImage" name="image" required>
            </div>
            <div class="mb-3">
              <label for="galleryDescription" class="form-label">Judul Foto</label>
              <input type="text" class="form-control" id="galleryDescription" name="title" placeholder="Caption" required>
            </div>
            <img id="preview" width="100%" height="300" class="mb-3" />
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for Editing Gallery Image -->
  <div class="modal fade" id="editGalleryImageModal1" tabindex="-1" aria-labelledby="editGalleryImageModal1Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editGalleryImageModal1Label">Edit Keterangan Foto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="edit_gallery.php?id=1" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="galleryDescription" class="form-label">Keterangan Foto</label>
              <input type="text" class="form-control" id="galleryDescription" name="description" value="Foto acara desa di balai desa." required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    const inputImage = document.getElementById("galleryImage");

    inputImage.addEventListener("change", (event) => {
      const preview = document.getElementById("preview");

      preview.src = URL.createObjectURL(event.target.files[0])
    })
  </script>
@endsection
