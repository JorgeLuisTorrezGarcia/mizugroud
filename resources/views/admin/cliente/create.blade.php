@extends('admin')
@section('cont')
    <div>
        <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">
            <div class="card-body">
                <h4 class="card-title">Registro de Clientes</h4>             
                {!! Form::open(['route'=>'clientes.store','method'=>'POST']) !!}
                <div class="form-group">
                    <label for="ci">CI</label>
                    <input type="number" name="ci" id="ci" class="form-control"  placeholder="8484031">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"  placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control"  placeholder="ejemplo@hotmail.com">
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="phone" name="telefono" id="telefono" class="form-control"  placeholder="74823892">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a href="{{route('clientes.index')}}"class="btn btn-light">Cancelar</a>

                {!! Form::close() !!}
            </div>
        </div>
@endsection