@extends('admin')
@section('title','Roles ')
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

@if ( session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif

<div class="content-wrapper">
    <div class="page-header">
            <h3 class="page-title">
                Lista de Roles 
            </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Roles</h4>
                        @can('peliculas.create')
                            <div class="dropdown">
                                <a class="btn btn-dark btn-icon-text" href="{{route('roles.create')}}">AGREGAR</a>    
                            </div>
                        @endcan
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ROL</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <th scope="row">{{$role->id}}</th>
                                        <td>
                                            <a>{{$role->name}}</a>
                                        </td>
                                        <td style="width: 50px;">                             
                                            {!! Form::open(['route'=>['roles.destroy',$role],'method'=>'DELETE']) !!}
                                            @can('users.edit')
                                            <td width='20'>
                                            <a type="button" href="{{route('roles.edit',$role)}}"  class="btn btn-dark btn-icon-text">
                                                Editar
                                                <i class="fas fa-pencil-alt btn-icon-append"></i> 
                                            </a>
                                            </td>
                                            @endcan
                                            @can('users.edit')
                                            <td width='20'>
                                            <button type="submit" class="btn btn-danger btn-icon-text" title="Eliminar">
                                                <i class="far fa-trash-alt"></i>                                                    
                                                Eliminar
                                            </button>
                                            </td>
                                            @endcan
                                            {!! Form::close() !!}
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