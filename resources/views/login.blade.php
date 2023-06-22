@extends('layouts.default')
@section('content')
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow" style="border-radius: 1rem;">
            <div class="card-body p-5 ">
                <h3 class="mb-5 text-center">Login Surat Izin</h3>
                <hr>
                <form action="" method="POST">
                    @csrf
                    <div class="container">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control shadow-sm">
                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control shadow-sm">
                        </div>
                        <hr>
                        <div class="mb-3 mt-3">
                            <button type="submit" class="btn btn-primary rounded form-control shadow-sm">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="card-footer p-4 text-center">
                <a href="/register" class="">Belum punya akun?</a>
            </div>
        </div>
    </div>
@endsection