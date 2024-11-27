@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        <h2 class="text-center mb-4">Pengumuman</h2>
        <div class="row">
            <!-- Pengumuman 1 -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pengumuman Kegiatan Gotong Royong</h5>
                        <p class="card-text">
                            <small class="text-muted">January 25, 2024</small><br>
                            Pengumuman untuk seluruh warga Desa Gugah Sejahtera, akan diadakan kegiatan gotong royong pada hari
                            Minggu, 28 Januari 2024...
                        </p>
                        <a href="detail_pengumuman.php?id=1" class="btn btn-link">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Pengumuman 2 -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pengumuman Pembagian BLT</h5>
                        <p class="card-text">
                            <small class="text-muted">January 20, 2024</small><br>
                            Pembagian Bantuan Langsung Tunai (BLT) bagi warga yang memenuhi syarat akan dilakukan pada
                            tanggal 30 Januari 2024...
                        </p>
                        <a href="detail_pengumuman.php?id=2" class="btn btn-link">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Tambahkan pengumuman 3 hingga 15 -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pengumuman Lomba Desa Bersih</h5>
                        <p class="card-text">
                            <small class="text-muted">February 5, 2024</small><br>
                            Seluruh warga diundang untuk berpartisipasi dalam Lomba Desa Bersih yang akan diadakan pada
                            tanggal 12 Februari 2024...
                        </p>
                        <a href="detail_pengumuman.php?id=3" class="btn btn-link">Read More</a>
                    </div>
                </div>
            </div>
            <!-- Ulangi pola ini untuk membuat total 15 pengumuman -->

            <!-- Pengumuman 4 sampai 15 -->
            <!-- Pengumuman tambahan dimulai dari sini -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pengumuman Festival Seni Budaya</h5>
                        <p class="card-text">
                            <small class="text-muted">February 10, 2024</small><br>
                            Festival Seni Budaya akan diadakan di Balai Desa pada tanggal 18 Februari 2024...
                        </p>
                        <a href="detail_pengumuman.php?id=4" class="btn btn-link">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Tambahkan pengumuman lain sesuai kebutuhan -->
            <!-- Misalnya pengumuman 5 sampai 15 di bawah ini -->
            <!-- Pengumuman 5 -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pengumuman Musyawarah Desa</h5>
                        <p class="card-text">
                            <small class="text-muted">March 1, 2024</small><br>
                            Musyawarah Desa akan dilaksanakan pada tanggal 10 Maret 2024, membahas pembangunan infrastruktur
                            desa...
                        </p>
                        <a href="detail_pengumuman.php?id=5" class="btn btn-link">Read More</a>
                    </div>
                </div>
            </div>
            <!-- Lanjutkan hingga pengumuman ke-15 -->
        </div>
    </div>
@endsection
