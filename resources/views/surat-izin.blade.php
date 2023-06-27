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
                            <i class="fa-solid fa-download"></i> Download data bulan ini
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
                                    <td>
                                        @if($s->jam_akhir != null)
                                            {{date('H:i', strtotime($s->jam_akhir)) }}
                                        @else 
                                            -
                                        @endif
                                    </td>
                                    <td>{{$s->keterangan_izin}}</td>
                                    <td>
                                        @if(Auth::user()->role_id == 2)
                                            @if($s->status == 0)
                                                <span class="badge rounded-pill text-bg-warning">proccess</span>
                                            @elseif($s->status == 1)
                                                <span class="badge rounded-pill text-bg-success">success</span>
                                            @elseif($s->status == 2)
                                                <span class="badge rounded-pill text-bg-danger">failed</span>
                                            @endif
                                        @elseif(Auth::user()->role_id == 3)
                                            @if($s->status_hrd == 0)
                                                <span class="badge rounded-pill text-bg-warning">proccess</span>
                                            @elseif($s->status_hrd == 1)
                                                <span class="badge rounded-pill text-bg-success">success</span>
                                            @elseif($s->status_hrd == 2)
                                                <span class="badge rounded-pill text-bg-danger">failed</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::user()->role_id == 2)
                                            @if($s->status == 0)
                                                <a href="/ubah/pt/{{$s->id}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title='View'>
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <form action="/delete/surat-izin/{{$s->id}}" method="POST" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" onclick="return(confirm('apakah anda yakin ingin unsend surat izin ini?'))" class="btn  btn-danger btn-sm btn-flat " data-toggle="tooltip" title='Unsend'>
                                                        <i class="fa-solid fa-arrow-rotate-left"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            @if($s->status == 1)
                                                <a href="/cetak-pdf/{{$s->id}}" @if($s->status == 0 || $s->status == 2) style="pointer-events: none" @endif target="_blank" class="btn btn-sm btn-success">Download</a>
                                            @endif
                                        @elseif(Auth::user()->role_id == 3)
                                            @if($s->status_hrd == 0)
                                                <a href="/ubah/pt/{{$s->id}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title='View'>
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <form action="/delete/surat-izin/{{$s->id}}" method="POST" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" onclick="return(confirm('apakah anda yakin ingin unsend surat izin ini?'))" class="btn  btn-danger btn-sm btn-flat " data-toggle="tooltip" title='Unsend'>
                                                        <i class="fa-solid fa-arrow-rotate-left"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            @if($s->status_hrd == 1)
                                                <a href="/cetak-pdf/{{$s->id}}" @if($s->status_hrd == 0 || $s->status_hrd == 2) style="pointer-events: none" @endif target="_blank" class="btn btn-sm btn-success" data-toggle="tooltip" title='Download PDF'><i class="fa-solid fa-download"></i></a>
                                            @endif
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
