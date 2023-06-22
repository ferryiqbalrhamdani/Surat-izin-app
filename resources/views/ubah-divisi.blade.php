@extends('layouts.default-dashboard')
@section('content')
    
        <h1 class="mt-4">{{$title}}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
        
        
        <div class="row d-flex justify-content-center">
            <div class="col-xl-5 col-md-7">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="text-center">Input Form Izin</h3>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    @foreach ($pt as $item)
                                        
                                        <label for="name" class="form-label">Nama PT</label>
                                        <input type="text" name="name" id="name" value="{{$item->name}}" class="form-control">
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="mb-3">
                                <button class="btn btn-primary form-control">Simpan</button>
                            </div>
                            <div class="text-center">
                                <a href="/daftar-pt" class="text-center">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
    @endsection
