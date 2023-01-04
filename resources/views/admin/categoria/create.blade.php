@extends('admin')
@section('cont')
    <div>
        <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">
            <div class="card-body">
                <h4 class="card-title">Registro de Categorias</h4>             
                {!! Form::open(['route'=>'categorias.store','method'=>'POST']) !!}
                <div class="form-group">
                    <label for="nombre">Nombre de Categoria</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"  placeholder="Nombre">
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" name="descripcion"  id="descripcion" placeholder="Descripcion"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a href="{{route('categorias.index')}}"class="btn btn-light">Cancelar</a>

                {!! Form::close() !!}
            </div>
        </div>
@endsection