@extends('layouts.default-dashboard')
@section('content')
    

    
        <h1 class="mt-4">{{$title}}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                Tambah Data
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <form action="/tambah-pt" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama PT</label>
                                                <input type="text" id="name" name="name" class="form-control shadow-sm" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary form-control">Simpan</button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mb-4 shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <i class="fas fa-table me-1"></i>
                        Data PT
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
                                <a href="/ubah/pt/{{$d->id}}" class="btn btn-success btn-sm" data-toggle="tooltip" title='Edit'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                <form action="/delete/pt/{{$d->id}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" onclick="return(confirm('apakah anda yakin ingin menghapus data?'))" class="btn  btn-danger btn-sm btn-flat " data-toggle="tooltip" title='Delete'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>

        
    @endsection
