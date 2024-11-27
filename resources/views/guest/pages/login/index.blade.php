@extends('guest.layouts.main')
@section('container')
    <div class="container my-5">
        <h2 class="text-center mb-4">Login</h2>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card p-4">
                    <form action="/login" method="post"> <!-- Arahkan ke dashboard.html -->
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
