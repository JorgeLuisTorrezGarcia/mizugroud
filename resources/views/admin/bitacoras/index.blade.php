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
                Bitacora de movimientos 
            </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Bitacora</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>ID DE USUARIO</th>
                                    <th>NOMBRE DE USUARIO</th>
                                    <th>EVENTO</th>
                                    <th>FECHA DE MOVIMIENTO</th>
                                    <th>IP</th>
                                    <th>DETALLES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bitacoras as $bitacora)
                                    <tr>
                                        <th scope="row">{{$bitacora->user_id}}</th>     
                                        @foreach($users as $user)
                                        @if($user->id == $bitacora->user_id)
                                        <td>
                                                <a>{{$user->name}}</a>
                                        </td>
                                        @endif
                                        @endforeach
                                        <td>
                                            <a>{{$bitacora->evento}}</a>
                                        </td>
                                        <td>
                                            <a>{{$bitacora->fecha}}</a>
                                        </td>
                                        <td>
                                            <a>{{$bitacora->ip}}</a>
                                        </td>
                                        <td>
                                            <a>{{$bitacora->detalles}}</a>
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
