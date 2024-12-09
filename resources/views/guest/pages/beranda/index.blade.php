@extends('guest.layouts.main')

@section('container')
    <!-- Pengumuman Terbaru -->
    <!-- Konten Pengumuman -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Pengumuman Terbaru</h2>
        <div class="row column-gap-3 justify-content-center">
            @foreach ($announcements as $a)
                <div class="card col-3" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $a->image_url) }}"
                        class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $a->title }}</h5>
                        <p class="card-text">{{ $a->created_at->translatedFormat('d F Y') }}</p>
                        <p class="card-text">{{ Str::limit($a->content, 100) }}</p>
                        <a href="{{ route('lihat pengumuman', $a->slug) }}" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Video Profil Desa</h2>
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="ratio ratio-16x9">
                    <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/_h60Hia1II0?si=F1rzRXCetth500jw" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Google Maps Alamat Kantor Desa dan Kontak -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Alamat Kantor Desa</h2>
        <div class="d-flex justify-content-center">
            <!-- Kolom yang lebih besar untuk Google Maps -->
            <div class="col-md-8">
                <div class="text-center">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.923586790477!2d108.9797407!3d1.1739275!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e482dcb850fccd%3A0x1a8004554ae57e14!2sKantor%20Desa%20Gugah%20Sejahtera!5e0!3m2!1sid!2sid!4v1732441298850!5m2!1sid!2sid"
                        width=100% height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Kolom yang lebih kecil untuk Kontak dan Media Sosial -->
        </div>
    @endsection
