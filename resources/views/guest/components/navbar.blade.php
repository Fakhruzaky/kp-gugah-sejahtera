<nav id="navbar" class="navbar navbar-expand-lg bg-tertiary-light fixed-top z-3" style="transition: all; transition-duration: 300ms; transition-timing-function: ease-in-out">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center text-white fw-bold fs-4" href="{{ route('beranda') }}">
            <img src="{{ asset('img/static-img/logo.png') }}" alt="Logo" width="60"
                class="d-inline-block align-text-top">Desa Gugah Sejahtera
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav-underline">
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold fs-6 {{ request()->routeIs('beranda') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('beranda') }}">Beranda</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link text-light fw-bold fs-6 dropdown-toggle {{ request()->routeIs('guest.profile.*') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->routeIs('guest.profile.sejarah') ? 'active' : '' }}"
                                href="{{ route('guest.profile.sejarah') }}">Sejarah Desa</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('guest.profile.visi-misi') ? 'active' : '' }}"
                                href="{{ route('guest.profile.visi-misi') }}">Visi & Misi</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('guest.profile.fasilitas') ? 'active' : '' }}"
                                href="{{ route('guest.profile.fasilitas') }}">Fasilitas Desa</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link text-light fw-bold fs-6 dropdown-toggle {{ request()->routeIs('guest.pemerintahan-desa.*') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pemerintahan Desa
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->routeIs('guest.pemerintahan-desa.struktur') ? 'active' : '' }}"
                                href="{{ route('guest.pemerintahan-desa.struktur') }}">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('guest.pemerintahan-desa.program-kerja') ? 'active' : '' }}"
                                href="{{ route('guest.pemerintahan-desa.program-kerja') }}">Program Kerja</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light fw-bold fs-6 {{ request()->routeIs('guest.data-desa') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('guest.data-desa') }}">Data Desa</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link text-light fw-bold fs-6 dropdown-toggle {{ request()->routeIs('guest.publikasi.*') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Publikasi
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item {{ request()->routeIs('guest.publikasi.pengumuman') ? 'active' : '' }}"
                                href="{{ route('guest.publikasi.pengumuman') }}">Pengumuman</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('guest.publikasi.galeri') ? 'active' : '' }}"
                                href="{{ route('guest.publikasi.galeri') }}">Galeri</a></li>
                    </ul>
                </li>

                
            </ul>

        </div>
    </div>
</nav>
<script>
    window.addEventListener("scroll", () => {
        const navbar = document.getElementById("navbar");

        if(window.scrollY >= 50) {
            navbar.classList.remove("bg-tertiary-light");
            navbar.classList.add("bg-success");
        } else {
            navbar.classList.remove("bg-success");
            navbar.classList.add("bg-tertiary-light");
        }
    })
</script>
