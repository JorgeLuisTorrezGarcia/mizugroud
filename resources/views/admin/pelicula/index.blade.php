@extends('admin')
@section('title','Peliculas ')
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
            Peliculas
        </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Peliculas</h4>
                        @can('peliculas.create')
                            <div class="dropdown">
                                <a class="btn btn-dark btn-icon-text" href="{{route('peliculas.create')}}">AGREGAR</a>    
                            </div>
                        @endcan
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>TITULO</th>
                                    <th>DESCRIPCION</th>
                                    <th>IDIOMA</th>
                                    <th>TICKETS</th> 
                                    <th>PRECIO</th> 
                                    <th>IMAGEN</th> 
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peliculas as $pelicula)
                                    <tr>
                                        <div>
                                        <th scope="row">{{$pelicula->id}}</th>
                                        <td>
                                            <a>{{$pelicula->titulo}}</a>
                                        </td>
                                            <td>{{$pelicula->descripcion}}</td>
                                            <td>{{$pelicula->idioma}}</td>
                                            <td>{{$pelicula->cantidad_t}}</td>
                                            <td>{{$pelicula->precio}}</td>
                                            <th><img src="{{asset('image/'.$pelicula->image)}}" width="130" height="150"></th>
                                        </div>
                                        <td style="width: 50px;">
                                            {!! Form::open(['route'=>['peliculas.destroy',$pelicula],'method'=>'DELETE']) !!}
                                            <td width='20'>    
                                            @can('peliculas.edit')
                                            <a type="button" href="{{route('peliculas.edit',$pelicula)}}"  class="btn btn-dark btn-icon-text">
                                                Editar
                                                <i class="fas fa-pencil-alt btn-icon-append"></i> 
                                            </a>
                                            @endcan
                                            </td>
                                            <td width='20'>    
                                            @can('peliculas.destroy')
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


