@extends('admin')
@section('cont')
    <div>
        <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">
            <div class="card-body">
                <h4 class="card-title">Editar Cliente</h4>             
                {!! Form::model($cliente,['route'=>['clientes.update',$cliente],'method'=>'PUT']) !!}

                <div class="form-group">
                    <label for="ci">CI</label>
                    <input type="number" name="ci" id="ci" value="{{$cliente->ci}}"class="form-control"  >
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{$cliente->nombre}}"class="form-control"  >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{$cliente->email}}"class="form-control"  >
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="phone" name="telefono" id="telefono" value="{{$cliente->telefono}}" class="form-control" >
                </div>

                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a href="{{route('clientes.index')}}"class="btn btn-light">Cancelar</a>
                {!! Form::close() !!}
            </div>
        </div>
@endsection