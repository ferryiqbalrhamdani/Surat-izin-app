@extends('layouts.default-dashboard')
@section('content')
    

    
        <h1 class="mt-4">{{$title}}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
        
        
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card bg-primary text-white mb-4 shadow">
                    <div class="card-body">Form Izin</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="form-izin">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Form Lembur</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4 shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <i class="fas fa-table me-1"></i>
                        Data Surat Izin
                    </div>
                    <div class="col d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <a href="/cetak-pdf" target="_blank" class="btn btn-success btn-sm">
                            Download data bulan ini
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Tgl Izin</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($suratIzin as $s)
                            @if ($s->username_user == Auth::user()->username)
                                <tr>
                                    <td>{{date('d/m/Y', strtotime($s->tanggal_izin)) }}</td>
                                    <td>{{date('H:i', strtotime($s->jam_mulai)) }}</td>
                                    <td>{{date('H:i', strtotime($s->jam_akhir)) }}</td>
                                    <td>{{$s->keterangan_izin}}</td>
                                    <td>
                                        @if($s->status == 0)
                                            <span class="badge rounded-pill text-bg-warning">proccess</span>
                                        @elseif($s->status == 1)
                                            <span class="badge rounded-pill text-bg-success">success</span>
                                        @elseif($s->status == 2)
                                            <span class="badge rounded-pill text-bg-danger">failed</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($s->status == 0)
                                            <a href="/surat-izin/ubah/{{$s->id}}" class="btn btn-sm btn-primary">Ubah</a>
                                            <a href="" class="btn btn-sm btn-danger">Hapus</a>
                                        @endif
                                        @if($s->status == 1)
                                            <a href="/cetak-pdf" @if($s->status == 0 || $s->status == 2) style="pointer-events: none" @endif target="_blank" class="btn btn-sm btn-success">Download</a>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>

        
        
    @endsection
