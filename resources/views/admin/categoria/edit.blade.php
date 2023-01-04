@extends('admin')
@section('cont')
    <div>
        <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">
            <div class="card-body">
                <h4 class="card-title">Editar Categoria</h4>             
                {!! Form::model($categoria,['route'=>['categorias.update',$categoria],'method'=>'PUT']) !!}
                <div class="form-group">
                    <label for="nombre">Nombre de Categoria</label>
                    <input type="text" name="nombre" id="nombre" value="{{$categoria->nombre}}"class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" name="descripcion"  id="descripcion" placeholder="Descripcion">{{$categoria->descripcion}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a href="{{route('categorias.index')}}"class="btn btn-light">Cancelar</a>

                {!! Form::close() !!}
            </div>
        </div>
@endsection