@extends('guest.layouts.main')

@section('container')
    <!-- Pengumuman Terbaru -->
    <!-- Konten Pengumuman -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Pengumuman Terbaru</h2>
        <div class="row">
            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
    </div>

    <!-- Google Maps Alamat Kantor Desa dan Kontak -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Alamat Kantor Desa</h2>
        <div class="row">
            <!-- Kolom yang lebih besar untuk Google Maps -->
            <div class="col-md-8">
                <div class="text-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.923586790477!2d108.9797407!3d1.1739275!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e482dcb850fccd%3A0x1a8004554ae57e14!2sKantor%20Desa%20Gugah%20Sejahtera!5e0!3m2!1sid!2sid!4v1732441298850!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Kolom yang lebih kecil untuk Kontak dan Media Sosial -->
            <div class="col-md-4">
                <div class="p-3">
                    <h4>Kontak Kami</h4>
                    <ul class="list-unstyled">
                        <li><strong>Alamat:</strong> 5XFH+HVH, Jl. Anom, Pemangkat Kota, Kec. Pemangkat, Kabupaten Sambas, Kalimantan Barat</li>
                        <li><strong>Email:</strong> info@desagugahsejahtera.go.id</li>
                        <li><strong>Telepon:</strong> (021) 12345678</li>
                        <li><strong>Jam Operasional:</strong> Senin - Jumat, 08:00 - 13:00 WIB</li>
                    </ul>

                    <h4>Ikuti Kami</h4>
                    <div class="d-flex justify-content-start">
                        <a href="#" class="btn btn-outline-secondary me-2"><img src="facebook-icon.png" alt="Facebook" width="24"></a>
                        <a href="#" class="btn btn-outline-secondary me-2"><img src="twitter-icon.png" alt="Twitter" width="24"></a>
                        <a href="#" class="btn btn-outline-secondary me-2"><img src="instagram-icon.png" alt="Instagram" width="24"></a>
                        <a href="#" class="btn btn-outline-secondary"><img src="youtube-icon.png" alt="YouTube" width="24"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
