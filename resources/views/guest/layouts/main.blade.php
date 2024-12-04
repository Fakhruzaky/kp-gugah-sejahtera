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
</head>

<body>
    @include('guest.components.navbar')

    <div class="container-fluid banner d-flex align-items-center justify-content-center" style="{{ Request::is('/') ? 'height: 100vh' : 'height: 50vh' }}; position: relative;">
        <div style="position: absolute; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4);"></div>
        <div class="container text-center absolute z-1">
            <h3 class="display-1">{{ Request::is('/') ? 'SELAMAT DATANG DI DESA GUGAH SEJAHTERA' : '' }}</h3>
        </div>
    </div>

    <div class="minvh">
        @yield('container')
    </div>

    @include('guest.components.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
