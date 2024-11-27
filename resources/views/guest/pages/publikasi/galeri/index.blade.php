@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        <h2 class="text-center mb-4">Galeri Foto</h2>
        <div class="row">
            <?php for($i = 1; $i <= 15; $i++): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="images/foto<?= $i ?>.jpg" class="card-img-top" alt="Foto <?= $i ?>" data-bs-toggle="modal"
                        data-bs-target="#fotoModal<?= $i ?>">
                    <div class="card-body">
                        <h5 class="card-title">Foto <?= $i ?></h5>
                    </div>
                </div>
            </div>

            <!-- Modal untuk setiap foto -->
            <div class="modal fade" id="fotoModal<?= $i ?>" tabindex="-1" aria-labelledby="fotoModalLabel<?= $i ?>"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fotoModalLabel<?= $i ?>">Foto <?= $i ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="images/foto<?= $i ?>.jpg" class="img-fluid" alt="Foto <?= $i ?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
@endsection
