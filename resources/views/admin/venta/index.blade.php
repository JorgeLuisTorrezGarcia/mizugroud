@extends('admin')
@section('title','Gestion de Categorias')
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
                Ventas
            </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Venta</h4>
                        @can('ventas.create')
                            <div class="dropdown">
                                <a class="btn btn-dark btn-icon-text" href="{{route('ventas.create')}}">AGREGAR</a>    
                            </div>
                        @endcan
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FECHA</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ventas as $venta)
                                @if($venta->user_id==Auth::user()->id || Auth::user()->id=='1')
                                    <tr>
                                        <th scope="row">{{$venta->id}}</th>
                                        <td>{{$venta->fecha}}</td>
                                        <td>{{$venta->total}}</td>
                                        <td style="width: 50px;">
                                            {!! Form::open(['route'=>['ventas.destroy',$venta],'method'=>'DELETE']) !!}
                                            
                                                <td width='20'>
                                                <a type="button" href="{{route('ventas.show',$venta)}}"  class="btn btn-warning btn-icon-text">
                                                    Detalle
                                                    <i class="fas fa-eye"></i> 
                                                </a>
                                                </td>
                                                <td width='20'>
                                                <a type="button" href="{{route('ventas.pdf',$venta)}}"  class="btn btn-dark btn-icon-text">
                                                    PDF
                                                    <i class="fas fa-file-pdf"></i> 
                                                </a>
                                                </td>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endif
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


