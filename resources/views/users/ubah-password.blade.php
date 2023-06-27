@extends('layouts.default-dashboard')
@section('content')
    
    
    
         <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between mt-4">
                    <h1 class="">{{$title}}</h1>
                </div>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
            <div class="col text-end">
                <a href="/profile" class=" btn btn-primary mt-4" ><i class="fa fa-arrow-left"></i> Kembali</a>

            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-5 col-lg-5">
                <div class="card shadow mb-3">
                    <div class="card-header text-center">Form Ubah Password</div>
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body ">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="passwordNow" class="form-label">Password Sekarang</label>
                                    <div class="input-group">
                                        <input name="passwordNow" required type="password" class="form-control shadow-sm @error('passwordNow') is-invalid @enderror" id="passwordNow">
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
                                <div class="mb-3">
                                    <label for="passwordNew" class="form-label">Password Baru</label>
                                    <div class="input-group">
                                        <input name="passwordNew" required type="password" class="form-control shadow-sm @error('passwordNew') is-invalid @enderror" id="passwordNew">
                                        <div class="btn btn-primary" onclick="myFunctionNew()">
                                            <svg id="mataSatuNew" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                            </svg>
                                            <svg id="mataDuaNew" style="display: none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordConfirm" class="form-label">Ulangi Password</label>
                                    <div class="input-group">
                                        <input name="passwordConfirm" required type="password" class="form-control shadow-sm" id="passwordConfirm">
                                        <div class="btn btn-primary" onclick="myFunctionConfirm()">
                                            <svg id="mataSatuConfirm" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                            </svg>
                                            <svg id="mataDuaConfirm" style="display: none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success form-control"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       

        
        

        
    @endsection
    @push('ubahPassword')
        <script>
            function myFunction() {
                var x = document.getElementById("passwordNow");
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
            function myFunctionNew() {
                var x = document.getElementById("passwordNew");
                if (x.type === "password") {
                    x.type = "text";
                    document.getElementById("mataDuaNew").style.display = 'inline-block';
                    document.getElementById("mataSatuNew").style.display = 'none';
                } else {
                    x.type = "password";
                    document.getElementById("mataDuaNew").style.display = 'none';
                    document.getElementById("mataSatuNew").style.display = 'inline-block';
                    
                }
            }
            function myFunctionConfirm() {
                var x = document.getElementById("passwordConfirm");
                if (x.type === "password") {
                    x.type = "text";
                    document.getElementById("mataDuaConfirm").style.display = 'inline-block';
                    document.getElementById("mataSatuConfirm").style.display = 'none';
                } else {
                    x.type = "password";
                    document.getElementById("mataDuaConfirm").style.display = 'none';
                    document.getElementById("mataSatuConfirm").style.display = 'inline-block';
                    
                }
            }
        </script>
    @endpush
