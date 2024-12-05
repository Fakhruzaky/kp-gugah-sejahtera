<div class="modal fade" id="editVisionModal" tabindex="-1" aria-labelledby="editVisionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editVisionModalLabel">Edit Visi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit="update">
          <div class="mb-3">
            <label for="visionTitle" class="form-label">Nama Visi</label>
            <input type="text" class="form-control" id="visionTitle" wire:model="name" required>
          </div>
          <div class="mb-3">
            <label for="visionDescription" class="form-label">Keterangan Visi</label>
            <textarea class="form-control" id="visionDescription" wire:model="description" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
