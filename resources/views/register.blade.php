@extends('layouts.default')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="col-lg-5 col-md-7">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="text-center p-3">Register</h3>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="card-body">
                    <div class="container">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" value="{{old('username')}}" class="form-control">
                            @if($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{old('nama')}}"  class="form-control">
                            @if($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="nama_pt" class="form-label">Nama PT</label>
                            <select class="form-select nama_pt" id="nama_pt" name="nama_pt"  >
                                <option ></option>
                                @foreach ($daftarPT as $dp)
                                    <option >{{$dp->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nama_pt'))
                                <span class="text-danger">{{ $errors->first('nama_pt') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="divisi" class="form-label">Divisi</label>
                            <select class="form-select divisi" id="divisi" name="divisi" >
                                <option ></option>
                                @foreach ($daftarDivisi as $dd)
                                    <option >{{$dd->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('divisi'))
                                <span class="text-danger">{{ $errors->first('divisi') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jenis Kelamin</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="L" name="jk" id="jk1" checked>
                                        <label class="form-check-label" for="jk1">
                                        Laki-laki
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" value="P" name="jk" id="jk2" >
                                    <label class="form-check-label" for="jk2">
                                        Perempuan
                                    </label>
                                    </div>
                                </div>
                            </div>
                            @if($errors->has('jk'))
                                <span class="text-danger">{{ $errors->first('jk') }}</span>
                            @endif
                        </div>
                        <hr>
                        <div class="mt-5 mb-3">
                            <button type="submit" class="form-control btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-footer p-4 text-center">
                <a href="/login" class="">Sudah punya akun? Login</a>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.divisi').select2({
                placeholder: "Pilih divisi",
                allowClear: true
            });
        });
        $(document).ready(function() {
            $('.nama_pt').select2({
                placeholder: "Pilih nama PT",
                allowClear: true
            });
        });
    </script>
@endsection