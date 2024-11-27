<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse min-vh-100">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard.beranda') }}">
                    <span class="me-2">&#128200;</span> Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard.profile-desa') }}">
                    <span class="me-2">&#128240;</span> Profil Desa
                </a>
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
                    <span class="me-2">&#128233;</span> Publikasi
                </a>
            </li>
        </ul>
    </div>
</nav>
