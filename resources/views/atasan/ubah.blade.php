@extends('layouts.default-dashboard')
@section('content')
    

        <div class="d-flex justify-content-between">
            <h1 class="mt-4">{{$title}}</h1>
            <a href="/daftar-surat-izin" class="btn btn-primary mt-4 mb-4">Kembali</a>

        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
        
        @foreach ($suratIzinUser as $s)
            
        
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-md-6">
                <div class="card  mb-4 shadow">
                    <div class="card-header p-3">
                        <h3 class="text-center">Informasi Detail</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" value="{{$s->nama_user}}" readonly class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nama_pt" class="form-label">Nama PT</label>
                            <input type="text" name="nama_pt" id="nama_pt" value="{{$s->nama_pt}}" readonly class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="divisi_user" class="form-label">Divisi</label>
                            <input type="text" name="divisi_user" id="divisi_user" value="{{$s->divisi_user}}" readonly class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_izin" class="form-label">Tanggal Izin</label>
                            <input type="text" id="tanggal_izin" value="{{date('d/m/Y', strtotime($s->tanggal_izin)) }}" readonly name="tanggal_izin" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="jam_mulai" class="form-label">Jam Masuk</label>
                                    <input type="text" name="jam_mulai" id="jam_mulai" readonly value="{{date('H:i', strtotime($s->jam_mulai)) }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="jam_akhir" class="form-label">Jam Keluar</label>
                                    <input type="text" id="jam_akhir" name="jam_akhir" readonly value="{{date('H:i', strtotime($s->jam_akhir)) }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_izin" class="form-label">Keterangan Izin</label>
                            <textarea name="keterangan_izin" id="keterangan_izin" cols="30" rows="5" readonly class="form-control">{{$s->keterangan_izin}}</textarea>
                            
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <form action="/surat-izin/approved/{{$s->id}}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success form-control" >approved</button>
                        </form>
                        <form action="/surat-izin/pending/{{$s->id}}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-warning form-control" >pending</button>
                        </form>
                        <form action="/surat-izin/reject/{{$s->id}}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger form-control" >rejected</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        
        

        
        
    @endsection
