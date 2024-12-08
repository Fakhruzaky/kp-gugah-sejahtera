@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard | Beranda</h1>
    </div>

    <!-- First row of three columns -->
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="bg-white text-dark rounded border p-3">
                <h5>Total Warga</h5>
                <p>4056 Jiwa</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-white text-dark rounded border p-3">
                <h5>Jumlah RT</h5>
                <p>23 RT</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-white text-dark rounded border p-3">
                <h5>Jumlah RW</h5>
                <p>6 RW</p>
            </div>
        </div>
    </div>

    <!-- Second row of three columns -->
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="bg-white text-dark rounded border p-3">
                <h5>Jumlah KK</h5>
                <p>1088 KK</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-white text-dark rounded border p-3">
                <h5>Jumlah Dusun</h5>
                <p>3 Dusun (Gunung Gajah, Sejahtera, Pagong)</p>
            </div>
        </div>
    </div>
@endsection
