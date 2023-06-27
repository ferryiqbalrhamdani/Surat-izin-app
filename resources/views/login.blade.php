@extends('layouts.default')
@section('content')
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow" style="border-radius: 1rem;">
            <div class="card-body p-5 ">
                <h3 class="mb-5 text-center">Login Surat Izin</h3>
                <hr>
                <form action="" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" value="{{old('username')}}" class="form-control shadow-sm">
                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input name="password" required type="password" class="form-control shadow-sm" id="password">
                                <div class="btn btn-primary" onclick="myFunction()">
                                    <svg id="mataSatu" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                    </svg>
                                    <svg id="mataDua" style="display: none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3 mt-3">
                            <button type="submit" class="btn btn-primary rounded form-control shadow-sm">Login</button>
                        </div>
                </form>
            </div>
            
            <div class="card-footer p-4 text-center">
                <a href="/register" class="">Belum punya akun?</a>
            </div>
        </div>
    </div>

    @push('mataPassword')
        <script>
            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                    document.getElementById("mataDua").style.display = 'inline-block';
                    document.getElementById("mataSatu").style.display = 'none';
                } else {
                    x.type = "password";
                    document.getElementById("mataDua").style.display = 'none';
                    document.getElementById("mataSatu").style.display = 'inline-block';
                    
                }
            }
        </script>
    @endpush
@endsection