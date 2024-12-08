<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Desa Gugah Sejahtera</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('/img/static-img/Sambas Logo compress 300x300.png') }}">
</head>

<body>
    @include('guest.components.navbar')

    <div class="container-fluid banner d-flex align-items-center justify-content-center"
        style="{{ Request::is('/') ? 'height: 100vh' : 'height: 50vh' }}; position: relative;">
        <div style="position: absolute; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="container text-center absolute z-1">
            @if (Request::is('/'))
            <h1 class="display-4 fw-normal">Selamat Datang di</h1>
            <h1 class="display-3 fw-bold">Website Desa Gugah Sejahtera</h1>
            @endif

            @if (Request::is('profile/sejarah'))
                <h1 class="fs-1 fw-bold">Sejarah Desa</h1>
            @endif

            @if (Request::is('profile/visi-misi'))
                <h1 class="fs-1 fw-bold">Visi Misi Desa</h1>
            @endif

            @if (Request::is('profile/fasilitas'))
                <h1 class="fs-1 fw-bold">Fasilitas Desa</h1>
            @endif

            @if (Request::is('pemerintahan-desa/struktur'))
                <h1 class="fs-1 fw-bold">Struktur Organisasi Desa Gugah Sejahtera</h1>
            @endif

            @if (Request::is('pemerintahan-desa/program-kerja'))
                <h1 class="fs-1 fw-bold">Program Kerja Desa Gugah Sejahtera</h1>
            @endif

            @if (Request::is('data-desa'))
                <h1 class="fs-1 fw-bold">Data Desa</h1>
            @endif

            @if (Request::is('publikasi/pengumuman'))
                <h1 class="fs-1 fw-bold">Pengumuman</h1>
            @endif

            @if (Request::is('publikasi/galeri'))
                <h1 class="fs-1 fw-bold">Galeri Foto</h1>
            @endif
        </div>
    </div>

    <div class="minvh">
        @yield('container')
    </div>

    <!-- Floating Chatbot Button -->
    <a href="https://pemangkat-chatbot.streamlit.app/" target="_blank" id="chatbotBtn" class="btn btn-primary">
        <i class="fas fa-comments"></i> <!-- Chat icon (can be replaced with your own icon) -->
    </a>

    @include('guest.components.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
