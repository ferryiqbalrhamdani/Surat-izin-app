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
                <a href="/surat-izin" class=" btn btn-primary mt-4" ><i class="fa fa-arrow-left"></i> Kembali</a>

            </div>
        </div>


        
        
        <div class="row d-flex justify-content-center">
            <div class="col-xl-5 col-md-7">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="text-center">Input Form Izin</h3>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <input type="text" hidden name="username_user" value="{{Auth::user()->username}}">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="nama_user" class="form-label">Nama</label>
                                    <input type="text" name="nama_user" id="nama_user" value="{{Auth::user()->name}}" readonly class="form-control">
                                    @if($errors->has('nama_user'))
                                        <span class="text-danger">{{ $errors->first('nama_user') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pt" class="form-label">Nama PT</label>
                                    <input type="text" name="nama_pt" id="nama_pt" value="{{Auth::user()->nama_pt}}" readonly class="form-control">
                                    @if($errors->has('nama_pt'))
                                        <span class="text-danger">{{ $errors->first('nama_pt') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="divisi_user" class="form-label">Divisi</label>
                                    <input type="text" name="divisi_user" id="divisi_user" value="{{Auth::user()->divisi}}" readonly class="form-control">
                                    @if($errors->has('divisi_user'))
                                        <span class="text-danger">{{ $errors->first('divisi_user') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_izin" class="form-label">Tanggal Izin</label>
                                    <input type="date" id="tanggal_izin" value="{{old('tanggal_izin')}}" name="tanggal_izin" class="form-control">
                                    @if($errors->has('tanggal_izin'))
                                        <span class="text-danger">{{ $errors->first('tanggal_izin') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="check" value="p telat" id="perempuanhijab">
                                        <label class="form-check-label" for="perempuanhijab">
                                            Izin Telat
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="check" id="perempuan" value="p" checked>
                                        <label class="form-check-label" for="perempuan">
                                            Meninggalkan Kantor
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="jam_mulai" class="form-label">Jam Masuk</label>
                                            <input type="time" name="jam_mulai" id="jam_mulai" value="{{old('jam_mulai')}}" class="form-control">
                                            @if($errors->has('jam_mulai'))
                                                <span class="text-danger">{{ $errors->first('jam_mulai') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="desc col-lg-6" id="Pilihp">
                                        <div class="mb-3">
                                            <label for="jam_akhir" class="form-label">Jam Keluar</label>
                                            <input type="time" id="jam_akhir" name="jam_akhir" value="{{old('jam_akhir')}}" class="form-control">
                                            @if($errors->has('jam_akhir'))
                                                <span class="text-danger">{{ $errors->first('jam_akhir') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan_izin" class="form-label">Keterangan Izin</label>
                                    <textarea name="keterangan_izin" id="keterangan_izin" cols="30" rows="5" class="form-control">{{old('keterangan_izin')}}</textarea>
                                    @if($errors->has('keterangan_izin'))
                                        <span class="text-danger">{{ $errors->first('keterangan_izin') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary form-control"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        
    @endsection
    @push('suratIzinRadio')
        <script>
            $(document).ready(function() {
                $("input[name$='check']").click(function() {
                    var test = $(this).val();

                    // console.log(test);

                    $("div.desc").hide();
                    $("#Pilih" + test).show();
                });
            });

    </script>
    @endpush
