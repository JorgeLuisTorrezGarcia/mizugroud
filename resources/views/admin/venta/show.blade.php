@extends('admin')
@section('title','Detalle de venta')
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
                Detalle de venta
            </h3>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if($venta->user_id==Auth::user()->id || Auth::user()->id=='1')
                        <div class="form-group row">
                            <div class="col-md-6 text-center">
                                <label class="form-control-label">Cliente</label>
                                <p><a href="{{route('clientes.show', $venta->cliente)}}"></a>{{$venta->user->name}}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="form-control-label">Numero de Venta</label>
                                <p>{{$venta->id}}</p>
                            </div>
                        </div>
                        <br /><br />
                        <div class="form-group">
                            <h4 class="card-title">Detalle de venta</h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalle__ventas" class="table">
                                    <thead>
                                        <tr>
                                            <th>Pelicula</th>
                                            <th>Precio(BOB)</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2">
                                                <p align="right">TOTAL: </p>
                                            </th>
                                            <th>
                                                <p> {{number_format($venta->total,2)}}</p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($detalle__ventas as $detalle__venta)
                                            <tr>
                                                <td>{{$detalle__venta->pelicula->titulo}}</td>
                                                <td>{{$detalle__venta->precio}}</td>
                                                <td>{{$detalle__venta->cantidad}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('ventas.index')}}" class="btn btn-primary float-right"></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
