@extends('admin')
@section('title','Categorias ')
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
                Categorias
            </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Categorias</h4>
                        @can('categorias.create')
                            <div class="dropdown">
                                <a class="btn btn-dark btn-icon-text" href="{{route('categorias.create')}}">AGREGAR</a>    
                            </div>                          
                        @endcan
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>DESCRIPCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorias as $categoria)
                                    <tr>
                                        <th scope="row">{{$categoria->id}}</th>
                                        <td>
                                            <a>{{$categoria->nombre}}</a>
                                        </td>
                                        <td>{{$categoria->descripcion}}</td>
                                        <td style="width: 50px;">

                                            {!! Form::open(['route'=>['categorias.destroy',$categoria],'method'=>'DELETE']) !!}
                                            <td width='20'>
                                            @can('categorias.edit')
                                            <a type="button" href="{{route('categorias.edit',$categoria)}}"  class="btn btn-dark btn-icon-text">
                                                Editar
                                                <i class="fas fa-pencil-alt btn-icon-append"></i> 
                                            </a>
                                            @endcan
                                            </td>  
                                            <td width='20'>    
                                            @can('categorias.destroy')
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


