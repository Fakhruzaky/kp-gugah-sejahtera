@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard | Beranda</h1>
    </div>

    <!-- First row of three columns -->
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="bg-primary text-white rounded p-3">
                <h5>Total Warga</h5>
                <p>5598 Orang</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-success text-white rounded p-3">
                <h5>Total KK</h5>
                <p>1672 KK</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-warning text-white rounded p-3">
                <h5>Dusun</h5>
                <p>3 Dusun</p>
            </div>
        </div>
    </div>

    <!-- Second row of three columns -->
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="bg-primary text-white rounded p-3">
                <h5>Jumlah RT</h5>
                <p>3 RT</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-success text-white rounded p-3">
                <h5>Pengumuman Aktif</h5>
                <p>10 Pengumuman</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-warning text-white rounded p-3">
                <h5>Galeri Foto</h5>
                <p>15 Foto</p>
            </div>
        </div>
    </div>

    <!-- Table for announcements -->
    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Aktifitas</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Pengumuman Kegiatan Gotong Royong</td>
                    <td>January 25, 2024</td>
                    <td>
                        <span class="badge text-bg-success">Aktif</span>
                    </td>
                    <td>
                        <!-- Edit button with modal trigger -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editActivityModal1">Edit</button>
                        <!-- Delete button -->
                        <a href="activity.php?id=1" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Pengumuman Pembagian BLT</td>
                    <td>January 20, 2024</td>
                    <td>
                        <span class="badge text-bg-success">Aktif</span>
                    </td>
                    <td>
                        <!-- Edit button with modal trigger -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editActivityModal2">Edit</button>
                        <!-- Delete button -->
                        <a href="activity.php?id=2" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal for Activity 1 -->
    <div class="modal fade" id="editActivityModal1" tabindex="-1" aria-labelledby="editActivityModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editActivityModal1Label">Edit Judul Aktifitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="activity_update.php" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Title Field -->
                        <div class="mb-3">
                            <label for="activityTitle1" class="form-label">Judul Aktifitas</label>
                            <input type="text" class="form-control" id="activityTitle1" name="title" value="Pengumuman Kegiatan Gotong Royong">
                        </div>

                        <!-- Date Field -->
                        <div class="mb-3">
                            <label for="activityDate1" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="activityDate1" name="date" value="2024-01-25">
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Activity 2 -->
    <div class="modal fade" id="editActivityModal2" tabindex="-1" aria-labelledby="editActivityModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editActivityModal2Label">Edit Judul Aktifitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="activity_update.php" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Title Field -->
                        <div class="mb-3">
                            <label for="activityTitle2" class="form-label">Judul Aktifitas</label>
                            <input type="text" class="form-control" id="activityTitle2" name="title" value="Pengumuman Pembagian BLT">
                        </div>

                        <!-- Date Field -->
                        <div class="mb-3">
                            <label for="activityDate2" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="activityDate2" name="date" value="2024-01-20">
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
