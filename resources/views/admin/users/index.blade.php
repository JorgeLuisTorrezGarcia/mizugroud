@extends('admin')
@section('title','Usuarios ')
@section('style')
<link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/all.min.css">
<link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
@endsection
@section('options')

@endsection
@section('preference')

@endsection

@section('cont')
<div class="content-wrapper">
    <div class="page-header">
            <h3 class="page-title">
                Lista de Usuarios 
            </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Usuarios</h4>
                        @can('peliculas.create')
                            <div class="dropdown">
                                <a class="btn btn-dark btn-icon-text" href="{{route('users.index')}}">AGREGAR</a>    
                            </div>
                        @endcan
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>CORREO ELECTRONICO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>
                                            <a>{{$user->name}}</a>
                                        </td>
                                        <td>
                                            <a>{{$user->email}}</a>
                                        </td>
                                        <td style="width: 50px;">                             
                                            <a type="button" href="{{route('users.edit',$user)}}"  class="btn btn-dark btn-icon-text">
                                                Editar
                                                <i class="fas fa-pencil-alt btn-icon-append"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection