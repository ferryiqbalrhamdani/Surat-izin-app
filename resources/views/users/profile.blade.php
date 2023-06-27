@extends('layouts.default-dashboard')
@section('content')
    
    
    
        <h1 class="mt-4">{{$title}}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
        
        <div class="row">
            <div class="col">
                <div class="card shadow mb-3" style="max-width: 600px;">
                    <div class="card-header">Personal Info</div>
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img  src="{{asset('img/profile.png')}}" class="img-fluid rounded-start my-3" style="height: 150px; margin-left: 20px;">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body ">
                            <h5 class="card-title" style="text-transform: capitalize"><b>{{Auth::user()->name}}</b></h5>
                             <table class="mb-3" style="width: 100%">
                                <tbody>
                                    <tr>
                                        <td style="width: 32%;">Username</td>
                                        <td>: {{Auth::user()->username}}</td>
                                    </tr>
                                    <tr>
                                        <td >PT</td>
                                        <td>: {{Auth::user()->nama_pt}}</td>
                                    </tr>
                                    <tr>
                                        <td >Divisi</td>
                                        <td>: {{Auth::user()->divisi}}</td>
                                    </tr>
                                    <tr>
                                        <td >Jenis Kelamin</td>
                                        <td style="text-transform: uppercase">: {{Auth::user()->jk}}</td>
                                    </tr>
                                    <tr>
                                        <td >Pasword</td>
                                        <td>: <a href="/ubah/password" class="btn btn-success btn-sm">Ubah Password</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <p class="card-text"><small class="text-body-secondary">Last updated {{Auth::user()->updated_at->format('j F, Y')}}</small></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

        
        

        
    @endsection
