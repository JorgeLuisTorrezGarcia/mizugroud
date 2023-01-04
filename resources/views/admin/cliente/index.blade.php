@extends('admin')
@section('title','Clientes ')
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
                Clientes
            </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Cliente</h4>
                        @can('clientes.create')
                            <div class="dropdown">
                                <a class="btn btn-dark btn-icon-text" href="{{route('clientes.create')}}">AGREGAR</a>    
                            </div>                          
                        @endcan
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>CI</th>
                                    <th>NOMBRE</th>
                                    <th>CORREO ELECTRONICO</th>
                                    <th>TELEFONO</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <th scope="row">{{$cliente->ci}}</th>
                                        <td>
                                            <a>{{$cliente->nombre}}</a>
                                        </td>
                                        <td>
                                            <a>{{$cliente->email}}</a>
                                        </td>
                                        <td>{{$cliente->telefono}}</td>
                                        <td style="width: 50px;">
                                            {!! Form::open(['route'=>['clientes.destroy',$cliente],'method'=>'DELETE']) !!}
                                            <td width='20'>    
                                            @can('clientes.edit')
                                            <a type="button" href="{{route('clientes.edit',$cliente)}}"  class="btn btn-dark btn-icon-text">
                                                Editar
                                                <i class="fas fa-pencil-alt btn-icon-append"></i> 
                                            </a>
                                            @endcan
                                            </td>
                                            <td width='20'>    
                                            @can('clientes.destroy')
                                            <button type="submit" class="btn btn-danger btn-icon-text" title="Eliminar">
                                                <i class="far fa-trash-alt"></i>                                                    
                                                Eliminar
                                            </button>
                                            @endcan
                                            </td>
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
