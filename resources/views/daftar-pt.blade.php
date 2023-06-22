@extends('layouts.default-dashboard')
@section('content')
    

    
        <h1 class="mt-4">{{$title}}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
        
        
        <div class="card mb-4 shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <i class="fas fa-table me-1"></i>
                        Data PT
                    </div>
                    <div class="col d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama PT</th>
                            <th>Tgl Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($daftarPT as $d)
                            
                        <tr>
                            <td>{{$d->name}}</td>
                            <td>{{date('j F, Y', strtotime($d->updated_at)) }}</td>
                            <td>
                                <a href="/ubah/pt/{{$d->id}}" class="btn btn-sm btn-primary">Ubah</a>
                                <form action="/delete/pt/{{$d->id}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return(confirm('apakah anda yakin ingin menghapus data?'))" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h1 class="modal-title fs-5 " id="exampleModalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/tambah-pt" method="POST">
                    @csrf
                        <div class="modal-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama PT</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary form-control">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
