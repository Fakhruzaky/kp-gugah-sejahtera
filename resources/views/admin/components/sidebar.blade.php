<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar min-vh-100 collapse">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard.beranda') }}">
                    <span class="me-2">&#128200;</span> Beranda
                </a>
            </li>
            <li class="nav-item">
                <button class="nav-link text-start" style="width: 100%;" type="button" data-bs-toggle="collapse"
                    data-bs-target="#profile-desa" aria-expanded="false" aria-controls="profile-desa">
                    <span class="me-2">&#128240;</span> Profil Desa
                </button>
                <div class="{{ Request::is('admin/profile-desa/*') ? 'show' : '' }} collapse" id="profile-desa"
                    style="padding-left: 50px;" class="d-flex flex-column">
                    <a href="{{ route('sejarah') }}" class="d-block text-decoration-none">Sejarah</a>
                    <a href="{{ route('visi') }}" class="d-block text-decoration-none">Visi</a>
                    <a href="{{ route('misi') }}" class="d-block text-decoration-none">Misi</a>
                    <a href="{{ route('fasilitas') }}" class="d-block text-decoration-none">Fasilitas</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard.pemerintahan-desa') }}">
                    <span class="me-2">&#128247;</span> Pemerintahan Desa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard.data-desa') }}">
                    <span class="me-2">&#128196;</span> Data Desa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard.publikasi') }}">
                    <span class="me-2">&#128233;</span> Pengumuman & Galeri
                </a>
            </li>
        </ul>
    </div>
</nav>
