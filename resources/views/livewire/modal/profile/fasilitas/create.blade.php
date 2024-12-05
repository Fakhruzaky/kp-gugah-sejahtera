<div wire:ignore.self class="modal fade" id="addFasilitas" tabindex="-1" aria-labelledby="addFasilitasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addFasilitasLabel">Tambah Fasilitas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit="create">
          <div class="mb-3">
            <label for="visionTitle" class="form-label">Gambar Fasilitas</label>
            <img wire:ignore.self alt="Preview" id="preview" class="d-block" style="width: 100%">
            <input type="file" class="form-control mt-3" id="photo" wire:model="photo" required>
          </div>
          <div class="mb-3">
            <label for="visionTitle" class="form-label">Nama Fasilitas</label>
            <input type="text" class="form-control" id="visionTitle" wire:model="name" required>
          </div>
          <div class="mb-3">
            <label for="visionDescription" class="form-label">Deskripsi Fasilitas</label>
            <textarea class="form-control" id="visionDescription" wire:model="description" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
  <script>
    const photo = document.getElementById('photo');

    photo.addEventListener('change', (event) => {
      const preview = document.getElementById('preview');

      preview.src = URL.createObjectURL(event.target.files[0]);
    })
  </script>
</div>
