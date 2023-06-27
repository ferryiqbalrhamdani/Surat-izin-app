@extends('layouts.default-dashboard')
@section('content')
    

    
        <h1 class="mt-4">{{$title}}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
        
        
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card bg-primary text-white mb-4 shadow">
                    <div class="card-body">Jumlah Izin ({{$countSuratIzinAll}})</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/data/izin">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                    @foreach ($suratIzin as $s)
                        @if(Auth::user()->role_id == 3)
                            @if($s->status == 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{$countSuratIzin}} 
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            @endif 
                        @elseif(Auth::user()->role_id == 4)
                            @if($s->status_hrd == 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{$countSuratIzinHRD}} 
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            @endif 
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card mb-4 shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <i class="fas fa-table me-1"></i>
                        Data Izin
                    </div>
                    
                </div>
            </div>
            <div class="card-body">
                <div class="overflow-auto">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
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
                                @if(Auth::user()->role_id == 3)
                                    <tr>
                                        <td>{{$s->nama_user }}</td>
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
                                            
                                                @if($s->status == 0)
                                                    <span class="badge rounded-pill text-bg-warning">pending</span>
                                                @elseif($s->status == 1)
                                                    <span class="badge rounded-pill text-bg-success">approved</span>
                                                @elseif($s->status == 2)
                                                    <span class="badge rounded-pill text-bg-danger">rejected</span>
                                            
                                            @endif
                                        </td>
                                        <td>
                                            @if($s->status == 0)
                                                <form action="surat-izin/approved/{{$s->id}}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" title='approved'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                                <form action="surat-izin/reject/{{$s->id}}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title='reject'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                @if($s->role_id != 3)
                                                    <a href="/daftar-surat-izin/ubah/{{$s->id}}" class="btn btn-sm btn-success">Ubah</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @elseif(Auth::user()->role_id == 4)
                                    @if($s->status_hrd == 0)
                                        <tr>
                                            <td>{{$s->nama_user }}</td>
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
                                                
                                                    @if($s->status_hrd == 0)
                                                        <span class="badge rounded-pill text-bg-warning">pending</span>
                                                    @elseif($s->status_hrd == 1)
                                                        <span class="badge rounded-pill text-bg-success">approved</span>
                                                    @elseif($s->status_hrd == 2)
                                                        <span class="badge rounded-pill text-bg-danger">rejected</span>
                                                
                                                @endif
                                            </td>
                                            <td>
                                                @if($s->status_hrd == 0)
                                                    <form action="surat-izin/approved/{{$s->id}}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" title='approved'>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    <form action="surat-izin/reject/{{$s->id}}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title='reject'>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="/daftar-surat-izin/ubah/{{$s->id}}" class="btn btn-sm btn-success">Ubah</a>                                                    
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        

        
        
    @endsection
