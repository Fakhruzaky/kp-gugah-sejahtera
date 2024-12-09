<div wire:ignore.self class="modal fade" id="editFasilitas" tabindex="-1" aria-labelledby="editFasilitasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editFasilitasLabel">Edit Fasilitas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit="update">
          <div class="mb-3">
            <label for="visionTitle" class="form-label">Gambar Fasilitas</label>
            <img wire:ignore.self src="{{ asset('storage/' . $image)  }}" alt="Preview" id="preview_edit" class="d-block" style="width: 100%">
            <input type="file" class="form-control mt-3" wire:model="photo" id="photo_edit" required>
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
    const photoEdit = document.getElementById('photo_edit');

    photoEdit.addEventListener('change', (event) => {
      const previewEdit = document.getElementById('preview_edit');

      previewEdit.src = URL.createObjectURL(event.target.files[0]);
    })
  </script>
</div>
