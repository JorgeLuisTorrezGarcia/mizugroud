@extends('admin')
@section('title','Horarios ')
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
@section('cont')
@if ( session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="content-wrapper">
    <div class="page-header">
            <h3 class="page-title">
                Horarios
            </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Horarios</h4>
                        @can('horarios.create')
                            <div class="dropdown">
                                <a class="btn btn-dark btn-icon-text" href="{{route('horarios.create')}}">AGREGAR</a>    
                            </div>                          
                        @endcan
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>HORA DE INICIO</th>
                                    <th>HORA DE FIN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($horarios as $horario)
                                    <tr>
                                        <th scope="row">{{$horario->id}}</th>
                                        <td>
                                            <a>{{$horario->hr_inicio}}</a>
                                        </td>
                                        <td>{{$horario->hr_fin}}</td>
                                        <td style="width: 50px;">
                                            {!! Form::open(['route'=>['horarios.destroy',$horario],'method'=>'DELETE']) !!}
                                            <td width='20'>    
                                            @can('horarios.edit')
                                            <a type="button" href="{{route('horarios.edit',$horario)}}"  class="btn btn-dark btn-icon-text">
                                                Editar
                                                <i class="fas fa-pencil-alt btn-icon-append"></i> 
                                            </a>
                                            @endcan
                                            </td>
                                            <td width='20'>
                                            @can('horarios.destroy')
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


